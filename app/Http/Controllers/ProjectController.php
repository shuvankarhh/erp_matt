<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Task;
use App\Models\User;
use App\Models\Staff;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Project;
use App\Models\Pricelist;
use App\Models\ProjectType;
use App\Models\ServiceType;
use App\Models\SiteContact;
use App\Models\Organization;
use App\Models\ReferrerInfo;
use Illuminate\Http\Request;
use App\Models\Communication;
use App\Models\LinkedService;
use App\Models\ProjectMaterial;
use App\Models\LinkedServiceType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\MaterialsandEquipment;
use Illuminate\Validation\ValidationException;


class ProjectController extends Controller
{
    public function index()
    {

        $projects = Project::where('tenant_id',  Auth::user()->tenant_id)->get();
        return view('projects.project_index', [
            'projects' => $projects
        ]);
    }

    public function create()
    {
        $user = User::select('*')
            ->find(auth()->user()->id);
        $tenant_id =   $user->tenant_id;
        $statuses = [
            1 => 'Active',
            2 => 'Archived'
        ];


        // $assigned_staffs = [
        //     1 => 'All Stuff',
        //     2 => 'Admin',
        //     3 => 'Field Technicians'
        // ];
        $contacts = Contact::where("tenant_id", $tenant_id)->where("stage", 4)->get();
        $staffs = Staff::where("tenant_id", $tenant_id)->get();
        $countries = Country::orderBy('name')->get();
        $organizations = Organization::where("tenant_id", $tenant_id)->orderBy('name')->get();
        $projectTypes = ProjectType::where("tenant_id", $tenant_id)->orderBy('name')->get();
        $ServiceTypes = ServiceType::pluck('name', 'id');
        $priceLists = Pricelist::where("tenant_id", $tenant_id)->get();
        $raferrerInfos = ReferrerInfo::where("tenant_id", $tenant_id)->get();

        return view('projects.project_create', [
            'contacts' => $contacts,
            'staffs' => $staffs,
            'countries' => $countries,
            'organizations' => $organizations,
            'projectTypes' => $projectTypes,
            'ServiceTypes' => $ServiceTypes,
            'priceLists' => $priceLists,
            'raferrerInfos' => $raferrerInfos,
            'statuses' => $statuses,
            // 'assigned_staffs' =>$assigned_staffs,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'contact_organisation_name' => 'required|string|max:255',
                'contact_first_name' => 'required|string|max:255',
                'contact_last_name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:15',
                'email' => 'required|email|max:255',
                'status' => 'required|integer|in:0,1',
                'organization_id' => 'required|integer|exists:crm_organizations,id',
                'parent_organization_id' => 'nullable|integer|exists:crm_organizations,id',
                'sales_person_id' => 'nullable|integer|exists:users,id',
                'order_number' => 'required|string|max:20',
                'country_id' => 'required|integer|exists:crm_countries,id',
                'state_id' => 'required|integer|exists:crm_states,id',
                'city_id' => 'nullable|integer|exists:crm_cities,id',
                'postal_code' => 'required|string|max:10',
                'project_type_id' => 'required|integer|exists:project_types,id',
                'service_type_id' => 'required|integer|exists:service_types,id',
                'property_type' => 'required|integer|in:1,2,3',
                'year_built' => 'required|integer|min:1900|max:' . date('Y'),
                'insurance_information' => 'required|boolean',
                'insurance_company' => 'nullable|string|max:255',
                'insurance_policy' => 'nullable|string|max:255',
                'insurance_claim_number' => 'nullable|string|max:255',
                'price_list_id' => 'nullable|integer|exists:price_lists,id',
                'referralSource' => 'required|string|in:addNewReferralSource,existingReferralSource',
                'referral_source_id' => 'nullable|integer|exists:referral_sources,id',
                'referrer_organisation_name' => 'nullable|string|max:255',
                'referrer_phone_number' => 'nullable|string|max:15',
                'referrer_email' => 'nullable|email|max:255',
                'referrer_organization_id' => 'nullable|integer|exists:crm_organizations,id',
                'referrer_parent_organization_id' => 'nullable|integer|exists:crm_organizations,id',
                'referrer_source' => 'required|string|in:Yes,No',
                'referrer_sales_person_id' => 'nullable|integer|exists:users,id',
                'assigned_staff' => 'required|string|in:all_staff,specific_staff',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        DB::beginTransaction();

        try {
            $tenant_id = Auth::user()->tenant_id;

            $project = new Project();
            $project->tenant_id = $tenant_id;
            $project->inTheCustomer = $request->inTheCustomer;

            if ($request->inTheCustomer == 'createNew') {

                $contact = new Contact();
                $contact->tenant_id = $tenant_id;
                $contact->name = trim($request->contact_first_name . ' ' . $request->contact_last_name);
                $contact->phone = $request->phone_number;
                $contact->email = $request->email;
                $contact->acting_status = 1;
                $contact->stage = 4;
                $contact->organization_id = $request->organization_id;

                $contact->save();
                $project->contact_id = $contact->id;
            } else {
                $project->contact_id = $request->contact_id;
            }
            $project->contact_organisation_name = $request->contact_organisation_name;
            $project->parent_organisation_id = $request->parent_organisation_id;
            $project->sales_person_id = $request->sales_person_id;
            $project->order_number = $request->order_number;
            $project->project_type_id = $request->project_type_id;
            $project->service_type_id = $request->service_type_id;
            $project->property_type = $request->property_type;
            $project->year_built = $request->year_built;
            $project->insurance_information = $request->insurance_information;
            $project->insurance_information_id = $request->insurance_information_id;
            $project->price_list_id = $request->price_list_id;
            $project->referralSource = $request->referralSource;
            $project->referral_source_id = $request->referral_source_id;
            $project->assigned_staff = $request->assigned_staff;

            $project->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();


            return redirect()->route('projects.index')->with(['error_message' => 'Permission Denied']);
        }

        return response()->json([
            'success' => true,
            'message' => 'Project has been added successfully!!!',
            'redirect' => route('projects.index')
        ]);

        // return redirect()->route('projects.index')->with(['success_message' => 'Project has been added successfully!!!']);
    }

    public function show(Project $project)
    {
        $statuses = [
            1 => 'Active',
            2 => 'Archived'
        ];

        $completion_statuses = [
            1 => 'Not Started',
            2 => 'In Progress',
            3 => 'On Hold',
            4 => 'Canceled',
            5 => 'Finished'
        ];


        $tenant_id = Auth::user()->tenant_id;
        $projects = Project::where('tenant_id',  $tenant_id)->where('id', $project->id)->with('contact', 'insuranceInfo', 'referrerInfo', 'serviceType')->first();

        $staffs = Staff::where("tenant_id", $tenant_id)->get();
        $projectTypes = ProjectType::where("tenant_id", $tenant_id)->orderBy('name')->get();
        $priceLists = Pricelist::where("tenant_id", $tenant_id)->get();
        $raferrerInfos = ReferrerInfo::where("tenant_id", $tenant_id)->get();
        $serviceTypes = ServiceType::where("tenant_id", $tenant_id)->get();

        $tasks = Task::with('project')
            ->where('tenant_id', $tenant_id)
            ->whereHas('project', function ($query) use ($projects) {
                $query->where('project_id', $projects->id);
            })
            ->with('user')
            ->paginate();

        $siteContacts   =   SiteContact::where('tenant_id', $tenant_id)->where('project_id', $projects->id)->paginate();

        $communications =   Communication::where('tenant_id', $tenant_id)->where('project_id', $projects->id)->paginate();
        $types = [
            1 => 'Email',
            2 => 'Phone'
        ];


        $linkedServices = LinkedService::with('linkedServiceSubType', 'linkedServiceType')->where('tenant_id', $tenant_id)->where('project_id', $projects->id)->paginate();

        $projectMaterials = ProjectMaterial::where('tenant_id', $tenant_id)->where('project_id', $projects->id)->paginate();

        return view('projects.project_show', [
            'project' => $projects,
            'statuses' => $statuses,
            'projectTypes' => $projectTypes,
            'priceLists' => $priceLists,
            'raferrerInfos' => $raferrerInfos,
            'serviceTypes' => $serviceTypes,
            'staffs'       => $staffs,
            'tasks'        =>   $tasks,
            'siteContacts' =>   $siteContacts,
            'communications' => $communications,
            'types' => $types,
            'completion_statuses' => $completion_statuses,
            'linkedServices' => $linkedServices,
            'projectMaterials' => $projectMaterials,
        ]);
    }

    public function edit(Project $project)
    {
        abort(404);
    }

    public function update(Request $request, Project $project)
    {
        abort(404);
    }

    public function destroy(Project $project)
    {
        abort(404);
    }

    public function markComplete(Request $request, $id)
    {
        $task = Task::findOrFail($id);

        if ($task->is_compleate == 0) {
            $task->is_compleate = 1;
        } else if ($task->is_compleate == 1) {
            $task->is_compleate = 0;
        }

        // $task->is_compleate = $request->input('completed');
        $task->save();

        return response()->json(['message' => 'Task status updated successfully']);
    }
}
