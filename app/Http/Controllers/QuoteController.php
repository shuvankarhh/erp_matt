<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Staff;
use App\Models\Solution;
use App\Models\QuoteContact;
use Illuminate\Http\Request;
use App\Models\QuoteSolution;
use App\Services\Vendor\Tauhid\Pagination\Pagination;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotes = Quote::paginate();
        $pagination = Pagination::default($quotes);

        return view('quote.index', compact('quotes', 'pagination'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $solution = Solution::all();
        return view('quote.create', compact('solution'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation_rules = [
            'sale_id' => 'nullable',
            'name' => 'required',
            'user_timezone_id' => 'required',
            'expiration_date' => 'required',
            'price' => 'nullable',
            'overall_discount_percentage' => 'nullable',
            'final_price' => 'nullable',
            'comment' => 'string|nullable',
            'owner_id' => 'nullable|string',
            'organization_id' => 'nullable',
            'contact_id' => 'required|array',
            'solution_id' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
        }

        // try {
        $decryptedOwnerId = Staff::decrypted_id($request->input('owner_id'));
        $quote = new Quote();

        $quote->sale_id = $request->sale_id;
        $quote->name = $request->name;
        $quote->expiration_date = $request->expiration_date;
        $quote->price = $request->price;
        $quote->discount_percentage = $request->overall_discount_percentage;
        $quote->final_price = $request->final_price;
        $quote->comment = $request->comment;
        $quote->owner_id = $decryptedOwnerId;
        $quote->organization_id = $request->organization_id;
        $quote->user_timezone_id = $request->user_timezone_id;

        $quote->save();

        $contactIds = $request->contact_id;
        $solutionIds = $request->solution_id;

        if ($contactIds) {
            foreach ($contactIds as $id) {
                $quoteContact = new QuoteContact();
                $quoteContact->quote_id = $quote->id;
                $quoteContact->contact_id = $id;

                $quoteContact->save();
            }
        }

        if ($solutionIds) {
            foreach ($solutionIds as $key => $id) {
                $quoteSolution = new QuoteSolution();

                $quoteSolution->quote_id = $quote->id;
                $quoteSolution->solution_id = $id;
                $quoteSolution->quantity = $request->quantity[$key];
                $quoteSolution->discount_percentage = $request->discount_percentage[$key];

                $quoteSolution->save();
            }
        }

        return redirect(route('quotes.index'))->with(['success_message' => 'Quote created successfully']);
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error_message', $e);
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = Quote::decrypted_id($id);
        $quote = Quote::with('organization', 'saleOwner', 'timezone')->findOrFail($id);
        $solutions = QuoteSolution::with('solution')->where('quote_id', $quote->id)->get();
        $contacts = QuoteContact::with('contact')->where('quote_id', $quote->id)->get();

        // dd($invoice);

        return view('quote.edit', compact('quote', 'solutions', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation_rules = [
            'sale_id' => 'nullable',
            'name' => 'required',
            'expiration_date' => 'required',
            'price' => 'nullable',
            'overall_discount_percentage' => 'nullable',
            'final_price' => 'nullable',
            'comment' => 'string|nullable',
            'owner_id' => 'nullable',
            'organization_id' => 'nullable',
            'contact_id' => 'required|array',
            'solution_id' => 'required',
            'user_timezone_id' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
        }

        $id = Quote::decrypted_id($id);
        $quote = Quote::findOrFail($id);
        $decryptedOwnerId = Staff::decrypted_id($request->input('owner_id'));

        $quote->sale_id = $request->sale_id;
        $quote->name = $request->name;
        $quote->expiration_date = $request->expiration_date;
        $quote->price = $request->price;
        $quote->discount_percentage = $request->overall_discount_percentage;
        $quote->final_price = $request->final_price;
        $quote->comment = $request->comment;
        $quote->owner_id = $decryptedOwnerId;
        $quote->organization_id = $request->organization_id;
        $quote->user_timezone_id = $request->user_timezone_id;

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

                $data['quote_id'] = $quote->id;
                $data['solution_id'] = $solutionId;
                $data['quantity'] = $request->quantity[$key];
                $data['discount_percentage'] = $request->discount_percentage[$key];

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

        return redirect(route('quotes.index'))->with(['success_message' => 'Quote created successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = Quote::decrypted_id($id);
        $quote = Quote::findOrFail($id);

        if ($quote) {
            $quote->delete();

            session(['success_message' => 'Quote deleted successfully']);
            return response()->json(array('response_type' => 1));
        } else {
            return redirect()->back()->with('error_message', 'Quote not found');
        }
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
