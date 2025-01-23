<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Staff;
use App\Models\Contact;
use App\Models\Solution;
use App\Models\Timezone;
use App\Models\SaleContact;
use App\Models\Organization;
use App\Models\SaleSolution;
use Illuminate\Http\Request;
use App\Models\SalesPipeline;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\SalesPipelineStage;
use App\Models\ServiceType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('timezone', 'pipeline', 'pipelineStage', 'organization')->paginate();

        return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $sale_types = [
            1 => 'New Business',
            2 => 'Existing Business'
        ];

        $priorities = [
            1 => 'Low',
            2 => 'Medium',
            3 => 'High'
        ];

        $timezones = Timezone::pluck('name', 'id');
        $sales_pipelines = SalesPipeline::pluck('name', 'id');
        $sales_pipeline_stages = SalesPipelineStage::pluck('name', 'id');
        $organizations = Organization::pluck('name', 'id');
        $staffs = Staff::pluck('name', 'id');
        $contacts = Contact::pluck('name', 'id');
        $solutions = Solution::pluck('name', 'id');

        return view('sales.create', compact('timezones', 'sales_pipelines', 'sales_pipeline_stages', 'organizations', 'staffs', 'sale_types', 'priorities', 'contacts', 'solutions'));
    }

    public function store(Request $request)
    {
        try {
            $rules = [
                'name' => 'required|string|max:255',
                'timezone_id' => 'required',
                'pipeline_id' => 'required',
                'pipeline_stage_id' => 'required',
                'owner_id' => 'nullable',
                'organization_id' => 'nullable',
                'contact_id' => 'nullable|array',
                'solution_id' => 'required|array',
                'quantity' => 'nullable|array',
                'discount' => 'nullable|array',
                'price' => 'nullable',
                'discount_percentage' => 'nullable',
                'final_price' => 'nullable',
                'close_date' => 'required',
                'sale_type' => 'nullable',
                'priority' => 'nullable',
                'description' => 'nullable'
            ];

            $messages = [];

            $attributes = [
                'timezone_id' => 'timezone',
                'pipeline_id' => 'pipeline',
                'pipeline_stage_id' => 'pipeline stage',
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

        $sale = new Sale();
        $sale->tenant_id = $tenant_id;
        $sale->name = $request->name;
        $sale->timezone_id = $request->timezone_id;
        $sale->pipeline_id = $request->pipeline_id;
        $sale->pipeline_stage_id = $request->pipeline_stage_id;
        $sale->organization_id = $request->organization_id;
        $sale->price = $request->price;
        $sale->final_price = $request->final_price;
        $sale->discount_percentage = $request->discount_percentage;
        $sale->close_date = $request->close_date;
        $sale->owner_id = $request->input('owner_id');
        $sale->sale_type = $request->sale_type;
        $sale->priority = $request->priority;
        $sale->description = $request->description;

        $sale->save();

        $contactIds = $request->contact_id;
        $solutionIds = $request->solution_id;

        if ($contactIds) {
            foreach ($contactIds as $id) {
                $saleContact = new SaleContact();
                $saleContact->tenant_id = $tenant_id;
                $saleContact->sale_id = $sale->id;
                $saleContact->contact_id = $id;

                $saleContact->save();
            }
        }

        if ($solutionIds) {
            foreach ($solutionIds as $key => $id) {
                $saleSolution = new SaleSolution();
                $saleSolution->tenant_id = $tenant_id;
                $saleSolution->sale_id = $sale->id;
                $saleSolution->solution_id = $id;
                $saleSolution->quantity = $request->quantity[$id];
                $saleSolution->discount_percentage = $request->discount[$id];
                $saleSolution->save();
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Sale has been added successfully!!!',
            'redirect' => route('sales.index')
        ]);
    }

    public function show(string $id)
    {
        $decryptedSaleId = Sale::decrypted_id($id);
        $sale = Sale::with('timezone', 'pipeline', 'pipelineStage', 'organization', 'owner', 'solutions')->findOrFail($decryptedSaleId);

        return view('sales.show', compact('sale'));
    }

    public function downloadInvoice($id)
    {
        // dd($id);

        // $decryptedSaleId = Sale::decrypted_id($id);
        // $sale = Sale::with('timezone', 'pipeline', 'pipelineStage', 'organization', 'owner', 'solutions')->findOrFail($decryptedSaleId);

        $sale = Sale::with('timezone', 'pipeline', 'pipelineStage', 'organization', 'owner', 'solutions')->findOrFail($id);

        // // Fetch the sale and related data
        // $sale = Sale::with(['solutions'])->findOrFail($id);

        // Pass data to the view
        $data = [
            'sale' => $sale,
        ];

        // Load the view and generate PDF
        $pdf = Pdf::loadView('sales.invoice', $data);
        // $pdf = Pdf::loadView('sales.show', $sale);

        // Return the PDF as a download
        // return $pdf->download('invoice-' . $sale->invoice_number . '.pdf');
        return $pdf->download('invoice-' . $sale->name . '.pdf');

        // return $pdf->stream('invoice-' . $sale->invoice_number . '.pdf');
        // return $pdf->stream('invoice-' . $sale->name . '.pdf');
    }

    public function edit(string $id)
    {
        $sale_types = [
            1 => 'New Business',
            2 => 'Existing Business'
        ];

        $priorities = [
            1 => 'Low',
            2 => 'Medium',
            3 => 'High'
        ];

        $decryptedSaleId = Sale::decrypted_id($id);
        $sale = Sale::with('timezone', 'pipeline', 'pipelineStage', 'organization', 'owner')->findOrFail($decryptedSaleId);
        $timezones = Timezone::pluck('name', 'id');
        $sales_pipelines = SalesPipeline::pluck('name', 'id');
        $sales_pipeline_stages = SalesPipelineStage::pluck('name', 'id');
        $organizations = Organization::pluck('name', 'id');
        $staffs = Staff::pluck('name', 'id');
        $contacts = Contact::pluck('name', 'id');
        $solutions = Solution::pluck('name', 'id');

        return view('sales.edit', compact('sale', 'timezones', 'sales_pipelines', 'sales_pipeline_stages', 'organizations', 'staffs', 'sale_types', 'priorities', 'contacts', 'solutions'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $rules = [
                'name' => 'required|string|max:255',
                'timezone_id' => 'required',
                'pipeline_id' => 'required',
                'pipeline_stage_id' => 'required',
                'owner_id' => 'nullable',
                'organization_id' => 'nullable',
                'contact_id' => 'nullable|array',
                'solution_id' => 'required|array',
                'quantity' => 'nullable|array',
                'discount' => 'nullable|array',
                'price' => 'nullable',
                'discount_percentage' => 'nullable',
                'final_price' => 'nullable',
                'close_date' => 'required',
                'sale_type' => 'nullable',
                'priority' => 'nullable',
                'description' => 'nullable'
            ];

            $messages = [];

            $attributes = [
                'timezone_id' => 'timezone',
                'pipeline_id' => 'pipeline',
                'pipeline_stage_id' => 'pipeline stage',
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

        $id = Sale::decrypted_id($id);
        $sale = Sale::findOrFail($id);
        $sale->name = $request->name;
        $sale->timezone_id = $request->timezone_id;
        $sale->pipeline_id = $request->pipeline_id;
        $sale->pipeline_stage_id = $request->pipeline_stage_id;
        $sale->organization_id = $request->organization_id;
        $sale->price = $request->price;
        $sale->final_price = $request->final_price;
        $sale->discount_percentage = $request->discount_percentage;
        $sale->close_date = $request->close_date;
        $sale->owner_id = $request->input('owner_id');
        $sale->sale_type = $request->sale_type;
        $sale->priority = $request->priority;
        $sale->description = $request->description;
        $sale->update();

        $contactIds = $request->contact_id;
        $solutionIds = $request->solution_id;

        $previousSaleContacts = SaleContact::where('sale_id', $sale->id)->get();

        if ($contactIds) {
            foreach ($contactIds as $contactId) {
                $previousContactIds = [];

                // $previousSaleContacts = SaleContact::where('sale_id', $sale->id)->get();

                foreach ($previousSaleContacts as $previousSaleContact) {
                    $previousId = $previousSaleContact->contact_id;
                    array_push($previousContactIds, $previousId);
                }

                $data['tenant_id'] = $tenant_id;
                $data['sale_id'] = $sale->id;
                $data['contact_id'] = $contactId;

                if ($previousContactIds != null) {
                    if (in_array($contactId, $previousContactIds)) {
                        $saleContact = SaleContact::where('sale_id', $sale->id)->where('contact_id', $contactId)->first();

                        $saleContact->update($data);
                    } else {
                        SaleContact::create($data);
                    }
                } else {
                    SaleContact::create($data);
                }

                foreach ($previousContactIds as $previousContactId) {
                    if (!in_array($previousContactId, $contactIds)) {
                        $saleContact = SaleContact::where('sale_id', $sale->id)->where('contact_id', $previousContactId)->first();
                        $saleContact->delete();
                    }
                }
            }
        }

        if ($solutionIds) {
            foreach ($solutionIds as $key => $solutionId) {
                $previousSolutionIds = [];
                $previousSaleSolutions = SaleSolution::where('sale_id', $sale->id)->get();

                foreach ($previousSaleSolutions as $previousSaleSolution) {
                    $previousId = $previousSaleSolution->solution_id;
                    array_push($previousSolutionIds, $previousId);
                }

                $data['tenant_id'] = $tenant_id;
                $data['sale_id'] = $sale->id;
                $data['solution_id'] = $solutionId;
                $data['quantity'] = $request->quantity[$solutionId] ?? null;
                $data['discount_percentage'] = $request->discount[$solutionId] ?? null;

                if ($previousSolutionIds != null) {
                    if (in_array($solutionId, $previousSolutionIds)) {
                        $saleSolution = SaleSolution::where('sale_id', $sale->id)->where('solution_id', $solutionId)->first();

                        $saleSolution->update($data);
                    } else {
                        SaleSolution::create($data);
                    }
                } else {
                    SaleSolution::create($data);
                }

                foreach ($previousSolutionIds as $previousSolutionId) {
                    if (!in_array($previousSolutionId, $solutionIds)) {
                        $saleSolution = SaleSolution::where('sale_id', $sale->id)->where('solution_id', $previousSolutionId)->first();
                        $saleSolution->delete();
                    }
                }
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Sale has been updated successfully!!!',
            'redirect' => route('sales.index')
        ]);
    }

    public function destroy(string $id)
    {
        $decryptedSaleId = Sale::decrypted_id($id);
        $sale = Sale::with('contacts', 'solutions')->findOrFail($decryptedSaleId);

        if ($sale) {
            $sale->solutions()->detach();

            $sale->contacts()->detach();

            $sale->delete();
        }

        session(['success_message' => 'Sale has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }

    public function fetchSolutions(Request $request)
    {
        $solutionIds = $request->input('solution_ids', []);

        $solutions = Solution::whereIn('id', $solutionIds)->get();

        return response()->json($solutions);
    }

    public function fetchSaleSolutions(Request $request, $id)
    {
        $solutionIds = $request->input('solution_ids', []);

        $solutions = DB::table('crm_solutions')
            ->leftJoin('crm_sale_solutions', function ($join) use ($id) {
                $join->on('crm_solutions.id', '=', 'crm_sale_solutions.solution_id')
                    ->where('crm_sale_solutions.sale_id', '=', $id);
            })
            ->whereIn('crm_solutions.id', $solutionIds)
            ->select(
                'crm_solutions.id',
                'crm_solutions.name',
                'crm_solutions.price',
                'crm_sale_solutions.quantity',
                'crm_sale_solutions.discount_percentage'
            )
            ->get();

        return response()->json($solutions);
    }

    public function searchStaff(Request $request)
    {
        $input = $request->input('term');

        if ($input !== null) {
            $results = [];

            $queries = Staff::where('name', 'LIKE', '%' . $input . '%')
                ->limit(5)
                ->select('id', 'name')
                ->get();

            foreach ($queries as $query) {
                $encryptedId = Staff::find($query->id)->encrypted_id();
                $results[] = ['id' => $encryptedId, 'value' => $query->name];
            }

            return response()->json($results);
        }
    }

    public function getSolutionPrice(Request $request)
    {
        $solutions = [];

        if ($request->solutions != null) {
            // foreach ($request->solutions as $key => $solution) {
            //     $solution = Solution::where('id', $solution)->first();
            //     array_push($solutions, $solution);
            // }

            $solutions = Solution::whereIn('id', $request->solutions)->get();
        }

        $partial = view('sales.partial', compact('solutions'))->render();
        return response()->json([
            'partial' => $partial
        ]);
    }

    public function getSolutionPriceEdit(Request $request)
    {
        $saleSolutions = [];
        $solutions = [];

        if ($request->solutions != null) {
            // foreach ($request->solutions as $key => $solutionId) {
            //     $solution = Solution::where('id', $solutionId)->first();
            //     $saleSolution = SaleSolution::where('sale_id', $request->saleId)->where('solution_id', $solutionId)->first();

            //     array_push($solutions, $solution);
            //     array_push($saleSolutions, $saleSolution);
            // }

            $solutions = Solution::whereIn('id', $request->solutions)->get();
            $saleSolutions = SaleSolution::where('sale_id', $request->saleId)->whereIn('solution_id', $request->solutions)->get();
        }



        $partial = view('sales.partial_edit', compact('solutions', 'saleSolutions'))->render();
        return response()->json([
            'partial' => $partial
        ]);
    }

    public function getStages($pipelineId)
    {
        $stages = SalesPipelineStage::where('pipeline_id', $pipelineId)->pluck('name', 'id');

        return response()->json($stages);
    }

    public function searchTimezones(Request $request)
    {
        $search = $request->get('q');

        $timezones = Timezone::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->get(['id', 'name']);

        return response()->json($timezones);
    }

    // public function getPipelineStage(Request $request)
    // {
    //     $pipelineStages = SalesPipelineStage::where('pipeline_id', $request->pipelineId)->get();

    //     return response()->json(['pipelineStages' => $pipelineStages]);
    // }
}
