<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tag;
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
use Maatwebsite\Excel\Facades\Excel;
use App\Services\Vendor\Tauhid\Pagination\Pagination;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class ContactController extends Controller
{
    public function index()
    {
        // $contacts = Contact::filter(request(['organization']))->paginate()->withQueryString();
        $contacts = Contact::filter(request(['organization']))->get();
        $organizations = Organization::all();
        // $pagination = Pagination::default($contacts);

        // return view('contacts.index', compact('contacts', 'organizations', 'pagination'));
        return view('contacts.index', compact('contacts', 'organizations'));
    }

    public function create(Request $request)
    {
        $organizations = Organization::orderBy('name')->get();
        $countries = Country::orderBy('name')->get();
        $sources = ContactSource::orderBy('name')->get();
        $staffs = Staff::orderBy('name')->get();
        $contact_tags = Tag::where('type', 1)->get(); // 1 = Contact & 2 = Task
        $encryptedOrganizationId = $request->input('organization');
        $organizationId = Organization::decrypted_id($encryptedOrganizationId);
        $readOnly = !empty($organizationId);
        $organization = Organization::find($organizationId);
        return view('contacts.create', compact('countries', 'organizations', 'sources', 'staffs', 'contact_tags'), [
            'readOnly' => $readOnly,
            'selectedOrganizationId' => $organizationId,
        ]);
    }

    public function store(Request $request)
    {
        $validation_rules = [
            'name' => ['nullable', 'string', 'max:255'],
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
            'state_id' => ['required', 'string'],
            'city_id' => ['required', 'string'],
            'postal_code' => ['nullable', 'string'],
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
        }

        $contact = new Contact;
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

        $contactId = $contact->id;

        // dd($contactId);

        if ($request->has('contact_tags')) {
            $tagIds = $request->input('contact_tags');
            $contact->tags()->attach($tagIds);
            // $contact->tags()->attach($tagIds, ['created_at' => Carbon::now(), 'updated_at' => Carbon::now()]);
        }

        $address = new ContactAddress;
        $address->contact_id = $contactId;
        $address->title = $request->title;
        $address->holder_name = $request->holder_name;
        $address->phone_code = $request->get('address_phone_code');
        $address->phone = $request->get('address_phone');
        $address->email = $request->address_email;
        $address->address_line_1 = $request->address_line_1;
        $address->address_line_2 = $request->address_line_2;
        $address->country_id = $request->country_id;
        $address->state_id = $request->state_id;
        $address->city_id = $request->city_id;
        $address->postal_code = $request->postal_code; // postal_code to postal_code = change
        $address->save();

        // dd($address->id);

        $contact->primary_address_id = $address->id;
        $contact->save();

        return redirect()->route('contacts.index')->with(['success_message' => 'Contact has been inserted successfully']);
    }

    public function show(string $id)
    {
        $decryptedId = Contact::decrypted_id($id);
        $contact = Contact::with('organization')->find($decryptedId);
        // dd($contact);
        $tags = $contact->tags;
        // dd($tags);;
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
        $country_id = $address->country_id;
        $state_id = $address->state_id;
        $sources = ContactSource::all();
        $organizations = Organization::all();
        $staffs = Staff::all();
        $countries = Country::all();
        $country = null;
        $states = null;
        $cities = null;
        if ($country_id) {
            $country = Country::find($country_id);
            $states = $country->states;
            if ($state_id) {
                $state = State::where("country_id", $country_id)->where('id', $state_id)->first();
                $cities = $state->cities;
            }
        }
        $contact_tags = Tag::where('type', 1)->get();
        $tags = $contact->tags;
        return view('contacts.edit', compact('contact', 'address', 'sources', 'organizations', 'staffs', 'countries', 'states', 'cities', 'contact_tags', 'tags'));
    }

    public function update(Request $request, $id)
    {

        $validation_rules = [
            'name' => ['nullable', 'string', 'max:255'],
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
            'primary_address_id' => ['nullable', 'string'],
            'billing_address_id' => ['nullable', 'string'],
            'shipping_address_id' => ['nullable', 'string'],
            'title' => ['required', 'string'],
            'holder_name' => ['nullable', 'string'],
            'address_phone_code' => ['string'],
            'address_phone' => ['nullable', 'string'],
            'address_email' => ['nullable', 'string'],
            'address_line_1' => ['required', 'string'],
            'address_line_2' => ['nullable', 'string'],
            'country_id' => ['required', 'string'],
            'state_id' => ['required', 'string'],
            'city_id' => ['required', 'string'],
            'postal_code' => ['nullable', 'string'],
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
        }

        $id = Contact::decrypted_id($id);
        $contact = Contact::find($id);
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
        // $contact->tags = $request->contact_tags ? json_encode($request->contact_tags) : '';
        $contact->save();

        if ($request->has('contact_tags')) {
            $tagIds = $request->input('contact_tags');
            $contact->tags()->sync($tagIds);
        } else {
            $contact->tags()->detach();
        }

        $address = $contact->address;
        // dd($address);
        $address->title = $request->title;
        $address->holder_name = $request->holder_name;
        $address->phone_code = $request->get('address_phone_code');
        $address->phone = $request->get('address_phone');
        $address->email = $request->address_email;
        $address->address_line_1 = $request->address_line_1;
        $address->address_line_2 = $request->address_line_2;
        $address->country_id = $request->country_id;
        $address->state_id = $request->state_id;
        $address->city_id = $request->city_id;
        $address->postal_code = $request->postal_code;
        $address->save();

        return redirect()->route('contacts.index')->with(['success_message' => 'Contact has been updatedd successfully']);
    }

    public function destroy($id)
    {
        $decryptedId = Contact::decrypted_id($id);
        Contact::find($decryptedId)->delete();
        return response()->json(['response_type' => 1]);
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
