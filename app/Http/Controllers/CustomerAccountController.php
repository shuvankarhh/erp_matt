<?php

namespace App\Http\Controllers;

use App\Services\Vendor\Tauhid\Pagination\Pagination;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Models\TicketContact;
use App\Models\User;
use App\Models\SaleContact;
use App\Models\Country;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\Contact;
use App\Models\ContactAccount;
use App\Models\UserEmail;
use App\Models\SentEmail;
use App\Models\UserPhone;
use App\Models\Organization;
use App\Services\StorageHandlers\DynamicStorageHandler;


class CustomerAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = ContactAccount::with('user', 'contact')->paginate();
        $pagination = Pagination::default($customers);

        return view('customers_account.index', compact('customers', 'pagination'));
    }

    public function create()
    {
        $contacts = Contact::where("stage", 4)->get();
        $response_body =  view('customers_account._customers_account_create_modal', [
            'contacts' => $contacts,
        ]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function store(Request $request)
    {
        $contact = Contact::where('id', $request->contact_id)->first();
        $oldUser = User::withTrashed()->where('email', $contact->email)->first();
        $oldContactAccount = ContactAccount::withTrashed()->where('contact_id', $request->contact_id)->first();
        if ($oldUser) {
            $oldUser->forceDelete();
        }
        if ($oldContactAccount) {
            $oldContactAccount->forceDelete();
        }
        $validation_rules = [
            'email' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'contact_id' => [
                'required',
                Rule::unique('crm_contact_accounts', 'contact_id'),
            ],
            'status'  => ['required'],
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            $response_body_html =  view('vendor._errors', [
                'errors' => ErrorMessage::$errors,
            ]);
            return response()->json(array('response_type' => 0, 'response_error' => ErrorMessage::$errors, 'response_body_html' => mb_convert_encoding($response_body_html, 'UTF-8', 'ISO-8859-1')));
        }

        $email = $contact->email;
        $phone = $contact->phone;
        if ($email != $request->email) {
            $contact->email = $request->email;
            $contact->save();
        }
        if ($phone != $request->phone) {
            $contact->phone = $request->phone;
            $contact->save();
        }

        if ($request->password == $request->confirm_password) {
            $contact_account = new ContactAccount;
            $user = new User;
            $user_email = new UserEmail;
            $user_phone = new UserPhone;
            $user->password = Hash::make($request->password);
            $user->user_role_id = 2;
            $user->acting_status = $request->get('status');
            $user->name = $contact->name;
            $user->email = $contact->email;
            $user_email->email = $contact->email;
            $random_number = rand(1000, 9999);
            $user_email->verification_token = $random_number;
            $user_phone->phone = $contact->phone;
            $random_number = rand(1000, 9999);
            $user_phone->verification_token = $random_number;

            DB::transaction(function () use ($user, $contact_account, $contact, $user_phone, $user_email) {
                $user->save();
                $contact_account->user_id = $user->id;
                $contact_account->contact_id  = $contact->id;
                $user_email->user_id = $user->id;
                $contact_account->save();
                if ($user_phone->phone != null) {
                    $user_phone->user_id = $user->id;
                    $user_phone->save();
                }
                $user_email->save();
            });
        } else {
            return response()->json(array('response_type' => 0, '_old_input' => $request->all()));
        }
        session(['success_message' => 'Cuntomer Account has been created successfully']);
        return response()->json(array('response_type' => 1, 'success_message' => 'Cuntomer Account has been created successfully'));
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

    

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        $id = ContactAccount::decrypted_id($id);
        $user = ContactAccount::find($id);
    

        $userAccount = User::select('*')
            ->with('user_role:id,name')
            ->find($user->user_id);

        $sentEmails = SentEmail::where('contact_id',$id )->get();
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
        
        $customer = ContactAccount::with('user','contact','contact.organization','contact.source')
                                    ->where("id", $id)
                                    ->first();

        $sales = SaleContact::with('sale')->where('contact_id',$customer->contact_id)->get();
        $sales_count = SaleContact::where('contact_id',$customer->contact_id)->count();
        $tickets = TicketContact::with('ticket')->where('contact_id',$customer->contact_id)->get();
        $tickets_count = TicketContact::where('contact_id',$customer->contact_id)->count();

        $combined =  ContactAccount::with('user','TicketContact','TicketContact.ticket','TicketContact.ticket.trashed_support_pipeline_stage','TicketContact.ticket.trashed_support_pipeline','SaleContact','SaleContact.sale')
                                    ->where("id", $id)
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

        return view('customers_account.show', [
            'customer' => $customer,
            'sales' => $sales,
            'sales_count'=>$sales_count,
            'tickets' => $tickets,
            'tickets_count'=>$tickets_count,
            'groupedData'=>$groupedData,
            'user_profile_photo_url'=>$user_profile_photo_url,
            'sentEmails'=>$sentEmails,
        ]);
    }

    public function edit_organization(string $id)
    {
        // $id = Customer::decrypted_id($id);
        $customer = Contact::findOrFail($id);

        $organizations = Organization::all();
        
        $response_body =  view('customers_account._add_organization_modal', [
            'customer' => $customer,
            'organizations' => $organizations
        ]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }


    public function update_organization(Request $request,string $id)
    {
        $id = Customer::decrypted_id($id);
        $customer = Contact::findOrFail($id);

        $customer->organization_id = $request->organization_id;
        $customer->save();
        $contact = ContactAccount::where('contact_id',$id)->first();
        session(['success_message' => 'Ticket Source has been updated successfully']);

        return redirect()->route('customer-accounts.show', ['customer_account' => $contact->encrypted_id()])->with(['success_message' => 'Contact has been updated successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = Customer::decrypted_id($id);
        $customer = Customer::with('user')->findOrFail($id);
        $countries = Country::all();
        return view('customers_account.edit', compact('customer', 'countries'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation_rules = [
            'confirm_password' => 'required_with:password|same:password',
        ];
        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
        }
        $id = ContactAccount::decrypted_id($id);
        $contactAccount = ContactAccount::with('user')->findOrFail($id);
        $user = User::find($contactAccount->user_id);
        $user->update([
            'acting_status' => $request->acting_status,
            'password' => Hash::make($request->password)
        ]);
        return redirect()->back()->with('success_message', 'Contact successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $id = ContactAccount::decrypted_id($id);
            $customer = ContactAccount::findOrFail($id);
            if ($customer) {
                $user = User::find($customer->user_id);
                $user->delete();
                $customer->delete();
                return response()->json(array('response_type' => 1));
            } else {
                return redirect(route('customer-accounts.index'))->with(['success_message' => 'Customer not found']);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message', $e);
        }
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
