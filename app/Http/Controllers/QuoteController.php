<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Staff;
use App\Models\Contact;
use App\Models\Solution;
use App\Models\Organization;
use App\Models\QuoteContact;
use Illuminate\Http\Request;
use App\Models\QuoteSolution;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class QuoteController extends Controller
{
    public function index()
    {
        $quotes = Quote::paginate();

        return view('quotes.index', compact('quotes'));
    }

    public function create()
    {
        $staffs = Staff::pluck('name', 'id');
        $organizations = Organization::pluck('name', 'id');
        $contacts = Contact::pluck('name', 'id');
        $solutions = Solution::pluck('name', 'id');

        return view('quotes.create', compact('staffs', 'organizations', 'contacts', 'solutions'));
    }

    public function store(Request $request)
    {
        try {
            $rules = [
                'name' => 'required',
                'expiration_date' => 'required',
                'owner_id' => 'nullable|string',
                'organization_id' => 'nullable',
                'contact_id' => 'nullable|array',
                'solution_id' => 'required|array',
                'quantity' => 'nullable|array',
                'discount' => 'nullable|array',
                'price' => 'nullable',
                'discount_percentage' => 'nullable',
                'final_price' => 'nullable',
                'comment' => 'nullable|string',
                'billing_address_id' => 'nullable',
                'shipping_address_id' => 'nullable',
            ];

            $messages = [
                'name.required' => 'Name is required.',
                'expiration_date.required' => 'Expiration date is required.',
                'solution_id.required' => 'Solution is required.',
            ];

            $attributes = [
                'owner_id' => 'sale owner',
                'organization_id' => 'organization',
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

        $quote = new Quote();
        $quote->tenant_id = $tenant_id;
        $quote->sale_id = $request->sale_id;
        $quote->name = $request->name;
        $quote->expiration_date = $request->expiration_date;
        $quote->price = $request->price;
        $quote->discount_percentage = $request->discount_percentage;
        $quote->final_price = $request->final_price;
        $quote->comment = $request->comment;
        $quote->owner_id = $request->input('owner_id');
        $quote->organization_id = $request->organization_id;
        $quote->save();


        if ($request->filled('contact_id')) {
            foreach ($request->input('contact_id') as $contactId) {
                QuoteContact::create([
                    'tenant_id' => $tenant_id,
                    'quote_id' => $quote->id,
                    'contact_id' => $contactId,
                ]);
            }
        }

        if ($request->has('solution_id')) {
            foreach ($request->input('solution_id') as $key => $id) {
                $quoteSolution = new QuoteSolution();
                $quoteSolution->tenant_id = $tenant_id;
                $quoteSolution->quote_id = $quote->id;
                $quoteSolution->solution_id = $id;
                $quoteSolution->quantity = $request->quantity[$id];
                $quoteSolution->discount_percentage = $request->discount[$id];
                $quoteSolution->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Quote has been added successfully!!!',
            'redirect' => route('quotes.index')
        ]);
    }

    public function show(string $id)
    {
        abort(404);
    }

    public function edit(string $id)
    {
        $decryptedQuoteId = Quote::decrypted_id($id);
        $quote = Quote::with('timezone', 'organization', 'saleOwner', 'contacts', 'solutions')->findOrFail($decryptedQuoteId);

        $staffs = Staff::pluck('name', 'id');
        $organizations = Organization::pluck('name', 'id');
        $contacts = Contact::pluck('name', 'id');
        $solutions = Solution::pluck('name', 'id');

        return view('quotes.edit', compact('quote', 'staffs', 'organizations', 'contacts', 'solutions'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $rules = [
                'name' => 'required',
                'expiration_date' => 'required',
                'owner_id' => 'nullable|string',
                'organization_id' => 'nullable',
                'contact_id' => 'nullable|array',
                'solution_id' => 'required|array',
                'quantity' => 'nullable|array',
                'discount' => 'nullable|array',
                'price' => 'nullable',
                'discount_percentage' => 'nullable',
                'final_price' => 'nullable',
                'comment' => 'nullable|string',
                'billing_address_id' => 'nullable',
                'shipping_address_id' => 'nullable',
            ];

            $messages = [
                'name.required' => 'Name is required.',
                'expiration_date.required' => 'Expiration date is required.',
                'solution_id.required' => 'Solution is required.',
            ];

            $attributes = [
                'owner_id' => 'sale owner',
                'organization_id' => 'organization',
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

        $id = Quote::decrypted_id($id);
        $quote = Quote::findOrFail($id);
        $quote->tenant_id = $tenant_id;
        $quote->sale_id = $request->sale_id;
        $quote->name = $request->name;
        $quote->expiration_date = $request->expiration_date;
        $quote->price = $request->price;
        $quote->discount_percentage = $request->discount_percentage;
        $quote->final_price = $request->final_price;
        $quote->comment = $request->comment;
        $quote->owner_id = $request->input('owner_id');
        $quote->organization_id = $request->organization_id;
        // $quote->timezone_id = $request->timezone_id;
        $quote->save();

        $contactIds = $request->contact_id;
        $solutionIds = $request->solution_id;

        if ($contactIds) {
            foreach ($contactIds as $contactId) {
                $previousContactIds = [];

                $previousSaleContacts = QuoteContact::where('quote_id', $quote->id)->get();

                foreach ($previousSaleContacts as $previousSaleContact) {
                    $previousId = $previousSaleContact->contact_id;
                    array_push($previousContactIds, $previousId);
                }

                $data['tenant_id'] = $tenant_id;
                $data['quote_id'] = $quote->id;
                $data['contact_id'] = $contactId;

                if ($previousContactIds != null) {
                    if (in_array($contactId, $previousContactIds)) {
                        $saleContact = QuoteContact::where('quote_id', $quote->id)->where('contact_id', $contactId)->first();

                        $saleContact->update($data);
                    } else {
                        QuoteContact::create($data);
                    }
                } else {
                    QuoteContact::create($data);
                }

                foreach ($previousContactIds as $previousContactId) {
                    if (!in_array($previousContactId, $contactIds)) {
                        $saleContact = QuoteContact::where('quote_id', $quote->id)->where('contact_id', $previousContactId)->first();
                        $saleContact->delete();
                    }
                }
            }
        }

        if ($solutionIds) {
            foreach ($solutionIds as $key => $solutionId) {
                $previousSolutionIds = [];
                $previousSaleSolutions = QuoteSolution::where('quote_id', $quote->id)->get();

                foreach ($previousSaleSolutions as $previousSaleSolution) {
                    $previousId = $previousSaleSolution->solution_id;
                    array_push($previousSolutionIds, $previousId);
                }

                $data['tenant_id'] = $tenant_id;
                $data['quote_id'] = $quote->id;
                $data['solution_id'] = $solutionId;
                $data['quantity'] = $request->quantity[$solutionId] ?? null;
                $data['discount_percentage'] = $request->discount[$solutionId] ?? null;

                if ($previousSolutionIds != null) {
                    if (in_array($solutionId, $previousSolutionIds)) {
                        $saleSolution = QuoteSolution::where('quote_id', $quote->id)->where('solution_id', $solutionId)->first();

                        $saleSolution->update($data);
                    } else {
                        QuoteSolution::create($data);
                    }
                } else {
                    QuoteSolution::create($data);
                }

                foreach ($previousSolutionIds as $previousSolutionId) {
                    if (!in_array($previousSolutionId, $solutionIds)) {
                        $saleSolution = QuoteSolution::where('quote_id', $quote->id)->where('solution_id', $previousSolutionId)->first();
                        $saleSolution->delete();
                    }
                }
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Quote has been updated successfully!!!',
            'redirect' => route('quotes.index')
        ]);
    }

    public function destroy(string $id)
    {
        $decryptedQuoteId = Quote::decrypted_id($id);
        $quote = Quote::with('contacts', 'solutions')->findOrFail($decryptedQuoteId);

        if ($quote) {
            $quote->solutions()->detach();

            $quote->contacts()->detach();

            $quote->delete();
        }

        session(['success_message' => 'Quote has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }

    public function fetchQuoteSolutions(Request $request, $id)
    {
        $solutionIds = $request->input('solution_ids', []);

        $solutions = DB::table('crm_solutions')
            ->leftJoin('crm_quote_solutions', function ($join) use ($id) {
                $join->on('crm_solutions.id', '=', 'crm_quote_solutions.solution_id')
                    ->where('crm_quote_solutions.quote_id', '=', $id);
            })
            ->whereIn('crm_solutions.id', $solutionIds)
            ->select(
                'crm_solutions.id',
                'crm_solutions.name',
                'crm_solutions.price',
                'crm_quote_solutions.quantity',
                'crm_quote_solutions.discount_percentage'
            )
            ->get();

        return response()->json($solutions);
    }

    public function fetchSolutions2(Request $request, $id)
    {
        dd($id, $request->all());

        $solutionIds = $request->input('solution_ids', []);

        $solutions = DB::table('crm_solutions')
            ->leftJoin('crm_quote_solutions', 'crm_solutions.id', '=', 'crm_quote_solutions.solution_id')
            ->whereIn('crm_solutions.id', $solutionIds)
            ->select('crm_solutions.id', 'crm_solutions.name', 'crm_solutions.price', 'crm_quote_solutions.quantity', 'crm_quote_solutions.discount_percentage')
            ->get();

        return response()->json($solutions);
    }


    public function getSolutionPriceEdit(Request $request)
    {
        $saleSolutions = [];
        $solutions = [];

        if ($request->solutions != null) {
            foreach ($request->solutions as $key => $solutionId) {
                $solution = Solution::where('id', $solutionId)->first();
                $invoiceSolution = QuoteSolution::where('quote_id', $request->quoteId)->where('solution_id', $solutionId)->first();
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
