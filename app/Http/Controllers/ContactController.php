<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\CustomForm;
use App\Models\City;
use App\Models\Staff;
use App\Models\State;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\ContactSource;
use App\Exports\ContactExport;
use App\Models\ContactAddress;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::filter(request(['organization']))->paginate();
        $organizations = Organization::all();

        return view('contacts.index', compact('contacts', 'organizations'));
    }

    public function create(Request $request)
    {
        $stages = [
            1 => 'Subscriber',
            2 => 'Lead',
            3 => 'Opportunity',
            4 => 'Customer',
            5 => 'Evangelist',
            6 => 'Other'
        ];

        $engagements = [
            1 => 'Hot',
            2 => 'Warm',
            3 => 'Cold'
        ];

        $leads = [
            1 => 'New',
            2 => 'Contacted',
            3 => 'In Progress',
            4 => 'Qualified',
            5 => 'Unqualified',
            6 => 'Attempted To Contact'
        ];

        $statuses = [
            1 => 'Active',
            2 => 'Archived'
        ];

        $sources = ContactSource::pluck('name', 'id');
        $organizations = Organization::pluck('name', 'id');
        $contact_tags = Tag::where('type', 1)->pluck('name', 'id'); // 1 = Contact & 2 = Task
        $staffs = Staff::pluck('name', 'id');
        $countries = Country::pluck('name', 'id');
        $encryptedOrganizationId = $request->input('organization');
        $organizationId = Organization::decrypted_id($encryptedOrganizationId);
        $readOnly = !empty($organizationId);
        $organization = Organization::find($organizationId);
        //customFrom
        $slug = request()->segment(1);
        $customForm = CustomForm::whereJsonContains('display_at', $slug)->get();
        
        return view('contacts.create', compact('stages', 'engagements', 'leads', 'sources', 'organizations', 'statuses', 'countries',  'staffs', 'contact_tags','customForm'), [
            'readOnly' => $readOnly,
            'selectedOrganizationId' => $organizationId,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'job_title' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone_code' => ['string', 'max:10'],
            'phone' => ['nullable', 'string', 'max:30'],
            'stage' => ['nullable', 'integer'],
            'engagement' => ['nullable', 'integer'],
            'lead_status' => ['nullable', 'integer'],
            'source_id' => ['nullable', 'integer', 'exists:crm_contact_sources,id'],
            'organization_id' => ['nullable', 'integer', 'exists:crm_organizations,id'],
            'contact_tags.*' => ['nullable', 'exists:crm_tags,id'],
            'owner_id' => ['nullable', 'integer', 'exists:crm_staffs,id'],
            'acting_status' => ['required', 'integer'],
            'primary_address_id' => ['nullable', 'integer'],
            'billing_address_id' => ['nullable', 'integer'],
            'shipping_address_id' => ['nullable', 'integer'],
            'title' => ['required', 'string'],
            'holder_name' => ['nullable', 'string'],
            'address_phone_code' => ['nullable', 'string'],
            'address_phone' => ['nullable', 'string'],
            'address_email' => ['nullable', 'string'],
            'address_line_1' => ['required', 'string'],
            'address_line_2' => ['nullable', 'string'],
            'country_id' => ['required', 'string'],
            'state_id' => ['nullable', 'string'],
            'city_id' => ['nullable', 'string'],
            'postal_code' => ['nullable', 'string'],
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $contact = new Contact;
        $contact->tenant_id = $tenant_id;
        $contact->name = $request->name;
        $contact->job_title = $request->job_title;
        $contact->email = $request->email;
        $contact->phone = $request->get('phone');
        $contact->stage = $request->stage;
        $contact->engagement = $request->engagement;
        $contact->lead_status = $request->lead_status;
        $contact->source_id = $request->source_id;
        $contact->organization_id = $request->organization_id;
        $contact->owner_id = $request->owner_id;
        $contact->acting_status = $request->acting_status;
        $contact->save();

        $contactId = $contact->id;

        if ($request->has('contact_tags')) {
            $tagIds = $request->input('contact_tags');

            foreach ($tagIds as $tagId) {
                DB::table('crm_contact_tags')->insert([
                    'tenant_id' => $tenant_id,
                    'contact_id' => $contactId,
                    'tag_id' => $tagId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $address = new ContactAddress;
        $address->tenant_id = $tenant_id;
        $address->contact_id = $contactId;
        $address->title = $request->title;
        $address->holder_name = $request->holder_name;
        $address->email = $request->primary_address_email;
        $address->phone = $request->get('primary_address_phone');
        $address->address_line_1 = $request->address_line_1;
        $address->address_line_2 = $request->address_line_2;
        $address->country_id = $request->country_id;
        $address->state_id = $request->state_id;
        $address->city_id = $request->city_id;
        $address->postal_code = $request->postal_code;
        $address->save();

        $contact->primary_address_id = $address->id;
        $contact->save();

        return redirect()->route('contacts.index')->with(['success_message' => 'Contact has been added successfully!!!']);
    }

    public function show(string $id)
    {
        $decryptedId = Contact::decrypted_id($id);
        $contact = Contact::with('organization')->find($decryptedId);
        $tags = $contact->tags;
        $address = null;
        $address = $contact->address;
        $country = null;
        $state = null;
        $city = null;
        if ($address) {
            $country_id = $address->country_id;
            $state_id = $address->state_id;
            $city_id = $address->city_id;
            if ($country_id) {
                $country = Country::find($country_id);
            }
            if ($state_id) {
                $state = State::where("country_id", $country_id)->where('id', $state_id)->first();
            }
            if ($city_id) {
                $city = City::where("country_id", $country_id)->where('state_id', $state_id)->where('id', $city_id)->first();
            }
        }
        return view('contacts.show', compact('contact', 'address', 'tags', 'country', 'state', 'city'));
    }

    public function edit(string $id)
    {
        $decryptedContactId = Contact::decrypted_id($id);
        $contact = Contact::find($decryptedContactId);

        $address = $contact->address;

        $stages = [
            1 => 'Subscriber',
            2 => 'Lead',
            3 => 'Opportunity',
            4 => 'Customer',
            5 => 'Evangelist',
            6 => 'Other'
        ];

        $engagements = [
            1 => 'Hot',
            2 => 'Warm',
            3 => 'Cold'
        ];

        $leads = [
            1 => 'New',
            2 => 'Contacted',
            3 => 'In Progress',
            4 => 'Qualified',
            5 => 'Unqualified',
            6 => 'Attempted To Contact'
        ];

        $statuses = [
            1 => 'Active',
            2 => 'Archived'
        ];

        $sources = ContactSource::pluck('name', 'id');
        $organizations = Organization::pluck('name', 'id');
        $contact_tags = Tag::where('type', 1)->pluck('name', 'id'); // 1 = Contact & 2 = Task
        $staffs = Staff::pluck('name', 'id');
        $countries = Country::pluck('name', 'id');

        $country_id = $address->country_id;
        $state_id = $address->state_id;
        $country = null;
        $states = null;
        $cities = null;
        if ($country_id) {
            $country = Country::find($country_id);
            $states = $country->states->pluck('name', 'id') ?? null;
            if ($state_id) {
                $state = State::where("country_id", $country_id)->where('id', $state_id)->first();
                $cities = $state->cities->pluck('name', 'id') ?? null;
            }
        }

        $tags = $contact->tags;

                //customFrom
                $slug = request()->segment(1);
                $customForm = CustomForm::whereJsonContains('display_at', $slug)->get();

        return view('contacts.edit', compact('customForm','contact', 'address', 'stages', 'engagements', 'leads', 'sources', 'organizations', 'staffs', 'statuses', 'countries', 'states', 'cities', 'contact_tags', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'job_title' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone_code' => ['string', 'max:10'],
            'phone' => ['nullable', 'string', 'max:30'],
            'stage' => ['nullable', 'integer'],
            'engagement' => ['nullable', 'integer'],
            'lead_status' => ['nullable', 'integer'],
            'source_id' => ['nullable', 'integer', 'exists:crm_contact_sources,id'],
            'organization_id' => ['nullable', 'integer', 'exists:crm_organizations,id'],
            'contact_tags.*' => ['nullable', 'exists:crm_tags,id'],
            'owner_id' => ['nullable', 'integer', 'exists:crm_staffs,id'],
            'acting_status' => ['required', 'integer'],
            'primary_address_id' => ['nullable', 'integer'],
            'billing_address_id' => ['nullable', 'integer'],
            'shipping_address_id' => ['nullable', 'integer'],
            'title' => ['required', 'string'],
            'holder_name' => ['nullable', 'string'],
            'address_phone_code' => ['nullable', 'string'],
            'primary_address_email' => ['nullable', 'string'],
            'primary_address_phone' => ['nullable', 'string'],
            'address_line_1' => ['required', 'string'],
            'address_line_2' => ['nullable', 'string'],
            'country_id' => ['required', 'string'],
            'state_id' => ['nullable', 'string'],
            'city_id' => ['nullable', 'string'],
            'postal_code' => ['nullable', 'string'],
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $id = Contact::decrypted_id($id);
        $contact = Contact::find($id);
        $contact->tenant_id = $tenant_id;
        $contact->name = $request->name;
        $contact->job_title = $request->job_title;
        $contact->email = $request->email;
        $contact->phone_code = $request->get('phone_code');
        $contact->phone = $request->get('phone');
        $contact->stage = $request->stage;
        $contact->engagement = $request->engagement;
        $contact->lead_status = $request->lead_status;
        $contact->source_id = $request->source_id;
        $contact->organization_id = $request->organization_id;
        $contact->owner_id = $request->owner_id;
        $contact->acting_status = $request->acting_status;
        $contact->save();

        if ($request->has('contact_tags')) {
            $tagIds = $request->input('contact_tags');
            $contactId = $contact->id;

            DB::table('crm_contact_tags')->where('contact_id', $contactId)->delete();

            $dataToInsert = [];
            foreach ($tagIds as $tagId) {
                $dataToInsert[] = [
                    'contact_id' => $contactId,
                    'tag_id' => $tagId,
                    'tenant_id' => $tenant_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            DB::table('crm_contact_tags')->insert($dataToInsert);
        }

        $address = $contact->address;
        $address->tenant_id = $tenant_id;
        $address->title = $request->title;
        $address->holder_name = $request->holder_name;
        $address->phone_code = $request->get('address_phone_code');
        $address->email = $request->primary_address_email;
        $address->phone = $request->get('primary_address_phone');
        $address->address_line_1 = $request->address_line_1;
        $address->address_line_2 = $request->address_line_2;
        $address->country_id = $request->country_id;
        $address->state_id = $request->state_id;
        $address->city_id = $request->city_id;
        $address->postal_code = $request->postal_code;
        $address->save();

        return redirect()->route('contacts.index')->with(['success_message' => 'Contact has been updated successfully!!!']);
    }

    public function destroy($id)
    {
        $decryptedId = Contact::decrypted_id($id);
        $contact = Contact::find($decryptedId);

        if ($contact) {
            if ($contact->address) {
                $contact->address->delete();
            }

            if ($contact->customerAccount) {
                $contact->customerAccount->delete();
            }

            $contact->delete();

            session(['success_message' => 'Contact has been deleted successfully!!!']);

            return response()->json(['response_type' => 1]);
        }
        return response()->json(['response_type' => 0]);
    }

    public function searchContact(Request $request)
    {
        $input = $request->input('term');

        if ($input != null) {
            $results = [];

            $queries = Contact::where('name', 'LIKE', '%' . $input . '%')
                ->limit(2)
                ->get();

            foreach ($queries as $query) {
                $results[] = ['id' => $query->id, 'value' => $query->name];
            }

            return response()->json($results);
        }
    }

    public function export()
    {
        return Excel::download(new ContactExport, 'contacts.xlsx');
    }
}
