<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Sale;
use App\Models\Staff;
use App\Models\State;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Invoice;
use App\Models\Solution;
use App\Models\Timezone;
use App\Models\SaleContact;
use App\Models\Organization;
use App\Models\SaleSolution;
use Illuminate\Http\Request;
use App\Models\InvoiceContact;
use App\Models\InvoiceSolution;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::paginate();

        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $timezones = Timezone::pluck('name', 'id');
        $organizations = Organization::pluck('name', 'id');
        $staffs = Staff::pluck('name', 'id');
        $contacts = Contact::pluck('name', 'id');
        $solutions = Solution::pluck('name', 'id');

        return view('invoices.create', compact('timezones', 'organizations', 'staffs', 'contacts', 'solutions'));
    }

    public function store(Request $request)
    {
        // dd($request->all());

        try {
            $rules = [
                'sale_id' => 'nullable',
                'invoice_date' => 'required',
                'due_date' => 'required|after_or_equal:invoice_date',
                'po_number' => 'nullable',
                'timezone_id' => 'nullable',
                'price' => 'nullable',
                'overall_discount_percentage' => 'nullable',
                'final_price' => 'nullable',
                'comment' => 'nullable|string',
                'owner_id' => 'nullable|string',
                'organization_id' => 'nullable',
                'contact_id' => 'nullable|array',
                'solution_id' => 'nullable|array',
                'quantities' => 'nullable|array',
                'billing_address_id' => 'nullable',
                'shipping_address_id' => 'nullable',
            ];

            $messages = [
                'invoice_date.required' => 'Invoice date is required.',
                'due_date.required' => 'Due date is required.',
                'due_date.after_or_equal' => 'Due date must be a date after or equal to invoice date.',
                'timezone_id.required' => 'Timezone is required.',
            ];

            $attributes = [
                'owner_id' => 'contact',
                'organization_id' => 'solution',
                'contact_id' => 'contact',
                'solution_id' => 'solution',
            ];

            $request->validate($rules, $messages, $attributes);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $decryptedOwnerId = Staff::decrypted_id($request->input('owner_id'));
        $invoice = new Invoice();

        $invoice->tenant_id = $tenant_id;
        $invoice->sale_id = $request->sale_id;
        $invoice->invoice_date = $request->invoice_date;
        $invoice->due_date = $request->due_date;
        $invoice->po_number = $request->po_number;
        $invoice->timezone_id = $request->timezone_id;
        $invoice->price = $request->price;
        $invoice->discount_percentage = $request->overall_discount_percentage;
        $invoice->final_price = $request->final_price;
        $invoice->comment = $request->comment;
        $invoice->owner_id = $decryptedOwnerId;
        $invoice->organization_id = $request->organization_id;
        $invoice->billing_address_id = $request->billing_address_id;
        $invoice->save();

        if ($request->filled('contact_id')) {
            InvoiceContact::create([
                'tenant_id' => $tenant_id,
                'invoice_id' => $invoice->id,
                'contact_id' => $request->input('contact_id'),
            ]);
        }

        // $contactIds = $request->contact_id;

        // if ($contactIds) {
        //     foreach ($contactIds as $id) {
        //         $invoiceContact = new InvoiceContact();
        //         $invoiceContact->invoice_id = $invoice->id;
        //         $invoiceContact->contact_id = $id;

        //         $invoiceContact->save();
        //     }
        // }

        $solutionIds = $request->solution_id;

        if ($solutionIds) {
            foreach ($solutionIds as $key => $id) {
                $invoiceSolution = new InvoiceSolution();
                $invoiceSolution->tenant_id = $tenant_id;
                $invoiceSolution->invoice_id = $invoice->id;
                $invoiceSolution->solution_id = $id;
                // dd( $request->quantities);
                // $invoiceSolution->quantity = $request->quantity[$key];
                $invoiceSolution->quantity = $request->quantities[$id];
                // $invoiceSolution->discount_percentage = $request->discount_percentage[$key];
                $invoiceSolution->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Invoice has been added successfully!!!',
            'redirect' => route('invoices.index')
        ]);

        // return redirect(route('invoices.index'))->with(['success_message' => 'Invoice has been added successfully!!!']);
    }

    public function show($id)
    {
        $decryptedSaleId = Sale::decrypted_id($id);
        // dd($decryptedSaleId);
        $sale = Sale::find($decryptedSaleId);
        // dd($sale);
        $saleContacts = SaleContact::where('sale_id', $decryptedSaleId)->get();
        // $contact_id = $saleContacts[0]->contact_id;
        // dd($contact_id);
        // $contacts = Contact::select(['id', 'firstname', 'lastname'])->orderBy('firstname')->get();
        $contact = Contact::where('id', $saleContacts[0]->contact_id)->first();
        // dd($contact);
        // $address = ContactAddress::where('id', $contact->primary_address_id)->first();
        $address = $contact->address;
        $country = null;
        $state = null;
        $city = null;

        if ($address) {
            $country_id = $address->country_id;
            $state_id = $address->state_id;
            $city_id = $address->city_id;
            if ($country_id) {
                $country = Country::where('id', $country_id)->first();
            }
            if ($state_id) {
                $state = State::where("country_id", $country_id)->where('id', $state_id)->first();
            }
            if ($city_id) {
                $city = City::where('id', $city_id)->first();
            }
        }
        // dd($city);
        $contacts = [];
        if (count($saleContacts) > 1) {
            foreach ($saleContacts as $contactData) {
                $contact = Contact::find($contactData->contact_id);
                if ($contact) {
                    $contacts[] = $contact;
                }
            }
        }
        // dd($contacts);
        $saleSolution = SaleSolution::where('sale_id', $decryptedSaleId)->first();
        // dd($saleSolution);
        $solutionId = $saleSolution->solution_id;
        // dd($solutionId);
        $solution = Solution::where('id', $solutionId)->first();
        // dd($solution);
        return view('sales.invoice', compact('sale', 'contact', 'address', 'country', 'state', 'city', 'contacts', 'saleSolution', 'solution'));
    }

    public function edit(string $id)
    {
        $id = Invoice::decrypted_id($id);
        $invoice = Invoice::with('organization', 'saleOwner', 'timezone')->findOrFail($id);
        $solutions = InvoiceSolution::with('solution')->where('invoice_id', $invoice->id)->get();
        $contacts = InvoiceContact::with('contact')->where('invoice_id', $invoice->id)->get();

        // dd($invoice);

        return view('invoice.edit', compact('invoice', 'solutions', 'contacts'));
    }

    public function update(Request $request, string $id)
    {
        $validation_rules = [
            'sale_id' => 'nullable',
            'invoice_date' => 'required',
            'due_date' => 'required',
            'po_number' => 'nullable',
            'timezone_id' => 'required',
            'price' => 'nullable',
            'overall_discount_percentage' => 'nullable',
            'final_price' => 'nullable',
            'comment' => 'string|nullable',
            'owner_id' => 'nullable',
            'organization_id' => 'nullable',
            'contact_id' => 'required|array',
            'solution_id' => 'required',
            'billing_address_id' => 'nullable',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
        }

        $id = Invoice::decrypted_id($id);
        $invoice = Invoice::findOrFail($id);
        $decryptedOwnerId = Staff::decrypted_id($request->input('owner_id'));

        $invoice->sale_id = $request->sale_id;
        $invoice->invoice_date = $request->invoice_date;
        $invoice->due_date = $request->due_date;
        $invoice->po_number = $request->po_number;
        $invoice->timezone_id = $request->timezone_id;
        $invoice->price = $request->price;
        $invoice->discount_percentage = $request->overall_discount_percentage;
        $invoice->final_price = $request->final_price;
        $invoice->comment = $request->comment;
        $invoice->owner_id = $decryptedOwnerId;
        $invoice->organization_id = $request->organization_id;
        $invoice->billing_address_id = $request->billing_address_id;

        $invoice->save();

        $contactIds = $request->contact_id;
        $solutionIds = $request->solution_id;

        if ($contactIds) {
            foreach ($contactIds as $contactId) {
                $previousContactIds = [];

                $previousSaleContacts = InvoiceContact::where('invoice_id', $invoice->id)->get();

                foreach ($previousSaleContacts as $previousSaleContact) {
                    $previousId = $previousSaleContact->contact_id;
                    array_push($previousContactIds, $previousId);
                }

                $data['invoice_id'] = $invoice->id;
                $data['contact_id'] = $contactId;

                if ($previousContactIds != null) {
                    if (in_array($contactId, $previousContactIds)) {
                        $saleContact = InvoiceContact::where('invoice_id', $invoice->id)->where('contact_id', $contactId)->first();

                        $saleContact->update($data);
                    } else {
                        InvoiceContact::create($data);
                    }
                } else {
                    InvoiceContact::create($data);
                }

                foreach ($previousContactIds as $previousContactId) {
                    if (!in_array($previousContactId, $contactIds)) {
                        $saleContact = InvoiceContact::where('invoice_id', $invoice->id)->where('contact_id', $previousContactId)->first();
                        $saleContact->delete();
                    }
                }
            }
        }

        if ($solutionIds) {
            foreach ($solutionIds as $key => $solutionId) {
                $previousSolutionIds = [];
                $previousSaleSolutions = InvoiceSolution::where('invoice_id', $invoice->id)->get();

                foreach ($previousSaleSolutions as $previousSaleSolution) {
                    $previousId = $previousSaleSolution->solution_id;
                    array_push($previousSolutionIds, $previousId);
                }

                $data['invoice_id'] = $invoice->id;
                $data['solution_id'] = $solutionId;
                $data['quantity'] = $request->quantity[$key];
                $data['discount_percentage'] = $request->discount_percentage[$key];

                if ($previousSolutionIds != null) {
                    if (in_array($solutionId, $previousSolutionIds)) {
                        $saleSolution = InvoiceSolution::where('invoice_id', $invoice->id)->where('solution_id', $solutionId)->first();

                        $saleSolution->update($data);
                    } else {
                        InvoiceSolution::create($data);
                    }
                } else {
                    InvoiceSolution::create($data);
                }

                foreach ($previousSolutionIds as $previousSolutionId) {
                    if (!in_array($previousSolutionId, $solutionIds)) {
                        $saleSolution = InvoiceSolution::where('invoice_id', $invoice->id)->where('solution_id', $previousSolutionId)->first();
                        $saleSolution->delete();
                    }
                }
            }
        }

        return redirect(route('invoices.index'))->with(['success_message' => 'Invoice created successfully']);
    }

    public function destroy(string $id)
    {
        $id = Invoice::decrypted_id($id);
        $invoice = Invoice::findOrFail($id);

        if ($invoice) {
            $invoice->delete();

            session(['success_message' => 'Invoice deleted successfully']);
            return response()->json(array('response_type' => 1));
        } else {
            return redirect()->back()->with('error_message', 'Invoice not found');
        }
    }

    public function getSolutionPriceEdit(Request $request)
    {
        $saleSolutions = [];
        $solutions = [];

        if ($request->solutions != null) {
            foreach ($request->solutions as $key => $solutionId) {
                $solution = Solution::where('id', $solutionId)->first();
                $invoiceSolution = InvoiceSolution::where('invoice_id', $request->invoiceId)->where('solution_id', $solutionId)->first();
                array_push($solutions, $solution);
                array_push($saleSolutions, $invoiceSolution);
            }
        }

        $partial = view('sales.partial_edit', compact('solutions', 'saleSolutions'))->render();
        return response()->json([
            'partial' => $partial
        ]);
    }
}
