<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Staff;
use App\Models\User;
use App\Models\Country;
use App\Models\Organization;
use App\Models\ProjectType;
use App\Models\ServiceType;
use App\Models\Pricelist;
use App\Models\ReferrerInfo;
use App\Models\Task;
use App\Models\SiteContact;
use App\Models\Communication;
use Illuminate\Support\Facades\DB;
use App\Models\LinkedService;
use App\Models\LinkedServiceType;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $projects = Project::where('tenant_id',  Auth::user()->tenant_id )->get();
        return view('projects.project_index',[
            'projects'=>$projects
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
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
        $priceLists = Pricelist::where("tenant_id", $tenant_id)->get();
        $raferrerInfos = ReferrerInfo::where("tenant_id", $tenant_id)->get();

        return view('projects.project_create',[
            'contacts' =>$contacts,
            'staffs' =>$staffs,
            'countries' =>$countries,
            'organizations' =>$organizations,
            'projectTypes' =>$projectTypes,
            'priceLists' =>$priceLists,
            'raferrerInfos' =>$raferrerInfos,
            'statuses' =>$statuses,
            // 'assigned_staffs' =>$assigned_staffs,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

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
        } catch (\Exception $e) {
            DB::rollBack();

            
            return redirect()->route('projects.index')->with(['error_message' => 'Permission Denied']);
        }

        return redirect()->route('projects.index')->with(['success_message' => 'Project has been added successfully!!!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $statuses = [
            1 => 'Active',
            2 => 'Archived'
        ];
        
        $tenant_id = Auth::user()->tenant_id;
        $projects = Project::where('tenant_id',  $tenant_id )->where('id',$project->id)->with('contact','insuranceInfo', 'referrerInfo', 'serviceType')->first();
        
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
                        ->paginate()                      
                        ;

        $siteContacts   =   SiteContact::where('tenant_id', $tenant_id)->where('project_id', $projects->id)->paginate();
        
        $communications =   Communication::where('tenant_id', $tenant_id)->where('project_id', $projects->id)->paginate();
        $types = [
            1 => 'Email',
            2 => 'Phone'
        ];


        $linkedServices =LinkedService::with('linkedServiceSubType','linkedServiceType')->where('tenant_id', $tenant_id)->where('project_id', $projects->id)->paginate();



        return view('projects.project_show',[
            'project'=>$projects,
            'statuses'=>$statuses,
            'projectTypes' =>$projectTypes,
            'priceLists' =>$priceLists,
            'raferrerInfos' =>$raferrerInfos,
            'serviceTypes' =>$serviceTypes,
            'staffs'       =>$staffs,
            'tasks'        =>   $tasks,
            'siteContacts' =>   $siteContacts,
            'communications' => $communications,
            'types' => $types,
            'linkedServices' => $linkedServices,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
