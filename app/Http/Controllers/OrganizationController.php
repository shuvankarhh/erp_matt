<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\State;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Industry;
use App\Models\Timezone;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\OrganizationAddress;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\OrganizationRequest;
use App\Services\Vendor\Tauhid\Pagination\Pagination;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::all();
        return view('organizations.index', compact('organizations'));
    }

    public function create()
    {
        $industries = Industry::pluck('name', 'id');
        $timezones = Timezone::pluck('name', 'id');
        $countries = Country::pluck('name', 'id');

        $stakeholderTypes = [
            1 => 'Prospect',
            2 => 'Partner',
            3 => 'Reseller',
            4 => 'Vendor',
            5 => 'Other',
        ];

        return view('organizations.create', compact('industries', 'timezones', 'countries', 'stakeholderTypes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'domain_name' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:255',
            'phone_code' => 'nullable|string|max:10',
            'phone' => 'nullable|string|max:30',
            'owner_id' => 'nullable|string',
            'industry_id' => 'nullable|integer|exists:crm_industries,id',
            'stakeholder_type' => 'nullable|string',
            'number_of_employees' => 'nullable|integer|min:0',
            'annual_revenue' => 'nullable|integer|min:0',
            'time_zone' => 'nullable|integer|exists:crm_timezones,id',
            'description' => 'nullable|string',
            'primary_address_id' => 'nullable|integer|exists:crm_organization_addresses,id',
            'billing_address_id' => 'nullable|string',
            'shipping_address_id' => 'nullable|string',
            'title' => 'required|string',
            'holder_name' => 'nullable|string',
            'primary_address_email' => 'nullable|string',
            'primary_address_phone_code' => 'nullable|string',
            'primary_address_phone' => 'nullable|string',
            'address_line_1' => 'nullable|string',
            'address_line_2' => 'nullable|string',
            'country_id' => 'nullable|string',
            'state_id' => 'nullable|string',
            'city_id' => 'nullable|string',
            'zip_code' => 'nullable|string',
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $decryptedOwnerId = Staff::decrypted_id($request->input('owner_id'));

        // dd($decryptedOwnerId);

        $organization = new Organization;
        $organization->tenant_id = $tenant_id;
        $organization->name = $request->name;
        $organization->domain_name = $request->domain_name;
        $organization->email = $request->email;
        $organization->phone_code = $request->get('phone_code');
        $organization->phone = $request->phone;
        $organization->owner_id = $decryptedOwnerId;
        $organization->industry_id = $request->get('industry_id');
        $organization->stakeholder_type = $request->stakeholder_type;
        $organization->number_of_employees = $request->number_of_employees;
        $organization->annual_revenue = $request->annual_revenue;
        $organization->timezone_id = $request->input('timezone_id');
        $organization->description = $request->description;
        $organization->save();

        $organizationId = $organization->id;

        $address = new OrganizationAddress();
        $address->tenant_id = $tenant_id;
        $address->organization_id = $organizationId;
        $address->title = $request->title;
        $address->holder_name = $request->holder_name;
        $address->email = $request->primary_address_email;
        $address->phone_code = $request->get('primary_address_phone_code');
        $address->phone = $request->get('primary_address_phone');
        $address->address_line_1 = $request->address_line_1;
        $address->address_line_2 = $request->address_line_2;
        $address->country_id = $request->country_id;
        $address->state_id = $request->state_id;
        $address->city_id = $request->city_id;
        $address->zip_code = $request->zip_code;
        $address->save();

        $OrganizationAddressId  = $address->id;

        $organization->primary_address_id =  $OrganizationAddressId;
        $organization->save();

        session(['success_message' => 'Organization has been added successfully!!!']);

        return redirect()->route('organizations.index', ['organization' => $organization->encrypted_id()]);

        // return redirect()->route('organizations.show', ['organization' => $organization->encrypted_id()]);
    }

    public function show(string $id)
    {
        $decryptedOrganizationId = Organization::decrypted_id($id);
        $organization = Organization::with('contacts')->find($decryptedOrganizationId);
        $contacts = Contact::where('organization_id', $decryptedOrganizationId)->take(5)->get();
        return view('organizations.show', compact('organization', 'contacts'));
    }

    public function edit(string $id)
    {
        $decryptedOrganizationId = Organization::decrypted_id($id);
        $organization = Organization::with('address')->find($decryptedOrganizationId);
        $industries = Industry::pluck('name', 'id');
        $timezones = Timezone::pluck('name', 'id');
        $countries = Country::pluck('name', 'id');
        $address = null;
        $address = $organization->address;
        $country = null;
        $states = null;
        $cities = null;
        if ($address) {
            $country_id = $address->country_id ?? null;
            $state_id = $address->state_id ?? null;
            $city_id = $address->city_id;
            if ($country_id) {
                $country = Country::find($country_id) ?? null;
                $states = $country->states->pluck('name', 'id') ?? null;

                if ($state_id) {
                    $state = State::where("country_id", $country_id)->where('id', $state_id)->first();
                    $cities = $state->cities->pluck('name', 'id') ?? null;
                }
            }
        }

        return view('organizations.edit', compact('organization', 'address', 'industries', 'timezones', 'countries', 'states', 'cities'));
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'domain_name' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:255',
            'phone_code' => 'nullable|string|max:10',
            'phone' => 'nullable|string|max:30',
            'owner_id' => 'nullable|string',
            'industry_id' => 'nullable|integer|exists:crm_industries,id',
            'stakeholder_type' => 'nullable|string',
            'number_of_employees' => 'nullable|integer|min:0',
            'annual_revenue' => 'nullable|integer|min:0',
            'time_zone' => 'nullable|integer|exists:crm_timezones,id',
            'description' => 'nullable|string',
            'primary_address_id' => 'nullable|integer|exists:crm_organization_addresses,id',
            'billing_address_id' => 'nullable|string',
            'shipping_address_id' => 'nullable|string',
            'title' => 'required|string',
            'holder_name' => 'nullable|string',
            'primary_address_email' => 'nullable|string',
            'primary_address_phone_code' => 'nullable|string',
            'primary_address_phone' => 'nullable|string',
            'address_line_1' => 'nullable|string',
            'address_line_2' => 'nullable|string',
            'country_id' => 'nullable|string',
            'state_id' => 'nullable|string',
            'city_id' => 'nullable|string',
            'zip_code' => 'nullable|string',
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $decryptedStaffId = Staff::decrypted_id($request->input('owner_id'));

        $decryptedOrganizationId = Organization::decrypted_id($id);

        $organization = Organization::find($decryptedOrganizationId);
        $organization->tenant_id = $tenant_id;
        $organization->name = $request->name;
        $organization->domain_name = $request->domain_name;
        $organization->email = $request->email;
        $organization->phone_code = $request->get('phone_code');
        $organization->phone = $request->phone;
        $organization->owner_id = $decryptedStaffId;
        $organization->industry_id = $request->get('industry_id');
        $organization->stakeholder_type = $request->stakeholder_type;
        $organization->number_of_employees = $request->number_of_employees;
        $organization->annual_revenue = $request->annual_revenue;
        $organization->timezone_id = $request->input('timezone_id');
        $organization->description = $request->description;
        $organization->save();

        $address = $organization->address;
        if (!$address) {
            $address = new OrganizationAddress();
            $address->organization_id = $organization->id;
        }
        $address->tenant_id = $tenant_id;
        $address->title = $request->title;
        $address->holder_name = $request->holder_name;
        $address->email = $request->primary_address_email;
        $address->phone_code = $request->get('primary_address_phone_code');
        $address->phone = $request->get('primary_address_phone');
        $address->address_line_1 = $request->address_line_1;
        $address->address_line_2 = $request->address_line_2;
        $address->country_id = $request->country_id;
        $address->state_id = $request->state_id;
        $address->city_id = $request->city_id;
        $address->zip_code = $request->zip_code;
        $address->save();

        if (!$address) {
            $organization->primary_address_id = $address->id;
            $organization->save();
        }

        return redirect()->route('organizations.index', ['organization' => $organization->encrypted_id()])->with('success_message', 'Organization has been updated successfully!!!');
    }

    public function destroy(string $id)
    {
        $decryptedOrganizationId = Organization::decrypted_id($id);
        $organization = Organization::find($decryptedOrganizationId);
        if ($organization) {
            if ($organization->address) {
                $organization->address->delete();
            }
            $organization->delete();

            session(['success_message' => 'Organization has been deleted successfully!!!']);

            return response()->json(['response_type' => 1]);
        }
        return response()->json(['response_type' => 0]);
    }

    public function searchOrganization(Request $request)
    {
        $input = $request->input('term');

        if ($input != null) {
            $results = [];

            $queries = Organization::where('name', 'LIKE', '%' . $input . '%')
                ->limit(5)
                ->select('id', 'name')
                ->get();

            foreach ($queries as $query) {
                $results[] = ['id' => $query->id, 'value' => $query->name];
            }

            return response()->json($results);
        }
    }
}
