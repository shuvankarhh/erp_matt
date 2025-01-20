<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Contact;
use App\Models\SentEmail;
use App\Models\UserEmail;
use App\Models\UserPhone;
use App\Models\SaleContact;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\TicketContact;
use App\Models\CustomerAccount;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\StorageHandlers\DynamicStorageHandler;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;


class CustomerAccountController extends Controller
{
    public function index()
    {
        $customer_accounts = CustomerAccount::with('user', 'contact')->paginate();

        return view('customer_accounts.index', compact('customer_accounts'));
    }

    public function create()
    {
        $statuses = [
            1 => 'Active',
            2 => 'Archived'
        ];

        $contacts = Contact::where("stage", 4)->get()->pluck('name_email', 'id');

        $html = view('customer_accounts.create', [
            'contacts' => $contacts,
            'statuses' => $statuses
        ])->render();

        return response()->json(
            [
                'html' => $html
            ]
        );
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $contact = Contact::where('id', $request->contact_id)->first();

        // $oldUser = User::withTrashed()->where('email', $contact->email)->first();
        // $oldContactAccount = CustomerAccount::withTrashed()->where('contact_id', $request->contact_id)->first();
        // if ($oldUser) {
        //     $oldUser->forceDelete();
        // }
        // if ($oldContactAccount) {
        //     $oldContactAccount->forceDelete();
        // }

        try {
            $rules = [
                'password' => 'required|min:4',
                'confirm_password' => 'required|same:password',
                'acting_status' => 'required',
                'contact_id' => [
                    'required',
                    Rule::unique('crm_customer_accounts', 'contact_id'),
                ],
            ];

            $messages = [
                'contact_id.required' => 'Please select a contact.',
                'password.required' => 'A password is required to continue.',
                'password.min' => 'Your password must be at least 4 characters long.',
                'confirm_password.required' => 'Please confirm your password.',
                'confirm_password.same' => 'Ensure your passwords match for confirmation.',
                'contact_id.unique' => 'This contact is already associated with a customer account.',
                'acting_status.required' => 'Please select a status.',
            ];


            $attributes = [
                'acting_status' => 'status',
            ];

            $request->validate($rules, $messages, $attributes);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        // $email = $contact->email;
        // $phone = $contact->phone;

        // if ($email != $request->email) {
        //     $contact->email = $request->email;
        //     $contact->save();
        // }
        // if ($phone != $request->phone) {
        //     $contact->phone = $request->phone;
        //     $contact->save();
        // }

        if ($request->password == $request->confirm_password) {
            $customer_account = new CustomerAccount;
            $user = new User;
            $user_email = new UserEmail;
            $user_phone = new UserPhone;
            $user->tenant_id = $tenant_id;
            $user->password = Hash::make($request->password);
            $user->user_role_id = 2;
            $user->acting_status = $request->get('acting_status');
            $user->name = $contact->name;
            $user->email = $contact->email;
            $user_email->tenant_id = $tenant_id;
            $user_email->email = $contact->email;
            $random_number = rand(1000, 9999);
            $user_email->verification_token = $random_number;
            $user_phone->tenant_id = $tenant_id;
            $user_phone->phone = $contact->phone;
            $random_number = rand(1000, 9999);
            $user_phone->verification_token = $random_number;

            DB::transaction(function () use ($user, $customer_account, $tenant_id, $contact, $user_phone, $user_email) {
                $user->save();
                $customer_account->tenant_id = $tenant_id;
                $customer_account->user_id = $user->id;
                $customer_account->contact_id  = $contact->id;
                $user_email->user_id = $user->id;
                $customer_account->save();
                if ($user_phone->phone != null) {
                    $user_phone->user_id = $user->id;
                    $user_phone->save();
                }
                $user_email->save();
            });
        } else {
            return response()->json(array('response_type' => 0, '_old_input' => $request->all()));
        }

        // session(['success_message' => 'Customer account has been added successfully!!!']);

        // return redirect()->back();

        return response()->json([
            'success' => true,
            'message' => 'Customer account has been added successfully!!!',
            'redirect' => route('customer-accounts.index')
        ]);
    }

    public function show(string $id)
    {
        $decryptedCustomerAccountId = CustomerAccount::decrypted_id($id);
        $customer_account = CustomerAccount::find($decryptedCustomerAccountId);

        $userAccount = User::select('*')
            ->with('user_role:id,name')
            ->find($customer_account->user_id);

        $sentEmails = SentEmail::where('contact_id', $id)->get();
        $does_profile_photo_exist = false;

        if (isset($userAccount->profile_photo->storage_provider_id)) {
            $dynamic = new DynamicStorageHandler;
            $does_profile_photo_exist = $dynamic->exists($userAccount->profile_photo->photo_path, $userAccount->profile_photo->storage_provider->alias);
        }

        if ($does_profile_photo_exist) {
            $user_profile_photo_url = $userAccount->profile_photo->photo_url;
        } else {
            $user_profile_photo_url = '/images/user.png';
        }

        // My Code Start From Here
        $customer = CustomerAccount::with('user', 'contact', 'contact.address', 'contact.address.country', 'contact.address.state', 'contact.address.city', 'contact.organization', 'contact.source')
            ->where("id", $decryptedCustomerAccountId)
            ->first();
        $user = $customer->user;

        $contact = $customer->contact;

        $organization_id = $customer->contact->organization->id;


        // dd($customer, $user, $contact, $organization_id);

        $address = $customer->contact->address;

        $country = $address->country->name;

        $state = $address->state->name;

        $city = $address->city->name;

        $sales = SaleContact::with('sale')->where('contact_id', $customer->contact_id)->get();
        $sales_count = SaleContact::where('contact_id', $customer->contact_id)->count();
        $tickets = TicketContact::with('ticket')->where('contact_id', $customer->contact_id)->get();
        $tickets_count = TicketContact::where('contact_id', $customer->contact_id)->count();

        // $combined =  CustomerAccount::with('user', 'TicketContact', 'TicketContact.ticket', 'TicketContact.ticket.trashed_support_pipeline_stage', 'TicketContact.ticket.trashed_support_pipeline', 'SaleContact', 'SaleContact.sale')
        //     ->where("id", $decryptedCustomerAccountId)
        //     ->get();

        $combined =  CustomerAccount::with('user', 'contact',)
            ->where("id", $decryptedCustomerAccountId)
            ->get();

        $groupedData = collect($combined)->flatMap(function ($item) {

            $sales = collect($item->SaleContact)->map(function ($sale) {
                return [
                    'type' => 'sale',
                    'name' => $sale->sale->name,
                    'priority' => $sale->sale->priority,
                    'close_date' => $sale->sale->close_date,
                    'final_price' => $sale->sale->final_price,
                    'description' => $sale->sale->description,
                    'created_at' => $sale->created_at,
                ];
            });

            $tickets = collect($item->TicketContact)->map(function ($ticket) {
                return [
                    'type' => 'ticket',
                    'name' => $ticket->ticket->name,
                    'priority' => $ticket->ticket->priority,
                    'pipeline_id' => $ticket->ticket->trashed_support_pipeline->name,
                    'pipeline_stage_id' => $ticket->ticket->trashed_support_pipeline_stage->name,
                    'final_price' => "",
                    'description' => $ticket->ticket->description,
                    'created_at' => $ticket->created_at,
                ];
            });

            return $sales->merge($tickets);
        })->groupBy(function ($item) {
            return $item['created_at']->format('Y-m-d');
        })
            ->sortKeysDesc();

        return view('customer_accounts.show', [
            'user' => $user,
            'contact' => $contact,
            'customer' => $customer,
            'organization_id' => $organization_id,
            'address' => $address,
            'country' => $country,
            'state' => $state,
            'city' => $city,
            'sales' => $sales,
            'sales_count' => $sales_count,
            'tickets' => $tickets,
            'tickets_count' => $tickets_count,
            'groupedData' => $groupedData,
            'user_profile_photo_url' => $user_profile_photo_url,
            'sentEmails' => $sentEmails,
        ]);
    }

    public function edit(string $id)
    {
        $statuses = [
            1 => 'Active',
            2 => 'Archived'
        ];

        $decryptedCustomerAccountId = CustomerAccount::decrypted_id($id);
        $customer_account = CustomerAccount::with('user', 'contact')->findOrFail($decryptedCustomerAccountId);

        $contact = $customer_account->contact()->get()->pluck('name_email', 'id');

        // $html = view('customer_accounts.edit', [
        $html = view('customer_accounts.edit', [
            'customer_account' => $customer_account,
            'contacts' => $contact,
            'statuses' => $statuses
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, string $id)
    {
        // dd($request->all());

        try {
            $request->validate(
                [
                    'password' => 'nullable|min:4',
                    'confirm_password' => 'required_with:password|same:password',
                    'acting_status' => 'required'
                ],
                [
                    'password.min' => 'The password must be at least 4 characters.',
                    'confirm_password.required_with' => 'The confirm password is required.',
                    'confirm_password.same' => 'The confirmation password must match the password.',
                ],
                [
                    'acting_status' => 'status'
                ]
            );
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        $decryptedCustomerAccountId = CustomerAccount::decrypted_id($id);
        $customer_account = CustomerAccount::with('user')->findOrFail($decryptedCustomerAccountId);
        $user = User::find($customer_account->user_id);

        $user->update([
            'acting_status' => $request->acting_status,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Customer account has beed updated successfully!!!',
            'redirect' => route('customer-accounts.index')
        ]);
    }

    public function destroy(string $id)
    {
        try {
            $decryptedCustomerAccountId = CustomerAccount::decrypted_id($id);
            $customer_account = CustomerAccount::findOrFail($decryptedCustomerAccountId);

            if ($customer_account) {
                $user = User::find($customer_account->user_id);
                $user->delete();
                $customer_account->delete();

                session(['success_message' => 'Customer account has been deleted successfully!!!']);

                return response()->json(array('response_type' => 1));
            } else {
                return redirect(route('customer-accounts.index'))->with(['success_message' => 'Customer not found']);
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error_message', $e);
        }
    }

    public function getContactDetails(Request $request)
    {
        $contactId = $request->input('contact_id');
        $contact = Contact::find($contactId);

        if ($contact) {
            return response()->json([
                'email' => $contact->email
            ]);
        } else {
            return response()->json(['error' => 'Contact not found'], 404);
        }
    }

    public function edit_organization(Organization $organization)
    {
        $organizations = Organization::where('tenant_id', Auth::user()->tenant_id)->pluck('name', 'id');

        $html = view('customer_accounts.edit_organization', compact('organizations', 'organization'))->render();

        return response()->json(['html' => $html]);

        // dd('Im Her Bro', $organization);
        // // $id = Customer::decrypted_id($id);
        // $customer = Contact::findOrFail($id);

        // $organizations = Organization::all();

        // $response_body =  view('customers_account._add_organization_modal', [
        //     'customer' => $customer,
        //     'organizations' => $organizations
        // ]);
        // return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function update_organization(Request $request, string $id)
    {
        try {
            $rules = [
                'organization_id' => 'required|string'
            ];

            $attributes = [
                'organization_id' => 'organization'
            ];

            $request->validate($rules, [], $attributes);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        $id = CustomerAccount::decrypted_id($id);
        $customer = Contact::findOrFail($id);

        $customer->organization_id = $request->organization_id;
        $customer->save();
        $contact = CustomerAccount::where('contact_id', $id)->first();
        session(['success_message' => 'Ticket Source has been updated successfully']);

        return redirect()->route('customer-accounts.show', ['customer_account' => $contact->encrypted_id()])->with(['success_message' => 'Contact has been updated successfully']);
    }

    public function sentEmail(Request $request, $id)
    {

        $validation_rules = [
            // 'contact_id' => 'required',
            'send_to' => 'required',
            'message' => 'required',
            'subject' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
        }

        $sent_email = new SentEmail;
        $sent_email->contact_id = $id;
        $sent_email->send_to = $request->send_to;
        $sent_email->message = $request->message;
        $sent_email->subject = $request->subject;
        $sent_email->created_by  = auth()->user()->id;
        $sent_email->save();

        return redirect()->back()->with('success_message', 'Contact successfully updated.');
    }
}
