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
use App\Models\PipelineStage;
use App\Models\SalesPipeline;
use Illuminate\Http\Response;
use App\Models\SalesPipelineStage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Services\Vendor\Tauhid\Pagination\Pagination;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
// use Response;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('pipeline', 'pipelineStage', 'organization')->get();

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
        // dd($request->all());
        $validation_rules = [
            'name' => 'required',
            'user_timezone_id' => 'required',
            'pipeline_id' => 'required',
            'pipeline_stage_id' => 'required',
            'organization_id' => 'nullable',
            'price' => 'nullable',
            'overall_discount_percentage' => 'nullable',
            'final_price' => 'nullable',
            'close_date' => 'nullable',
            'owner_id' => 'nullable|string',
            'sale_type' => 'nullable',
            'priority' => 'nullable',
            'description' => 'nullable',
            'solution_id' => 'nullable',
            'contact_id' => 'nullable|array',
            // 'quantity' => 'nullable|array',
            // 'quantity.*' => 'nullable'
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $decryptedOwnerId = Staff::decrypted_id($request->input('owner_id'));

        $sale = new Sale();
        $sale->tenant_id = $tenant_id;
        $sale->name = $request->name;
        $sale->user_timezone_id = $request->user_timezone_id;
        $sale->pipeline_id = $request->pipeline_id;
        $sale->pipeline_stage_id = $request->pipeline_stage_id;
        $sale->organization_id = $request->organization_id;
        $sale->price = $request->price;
        $sale->final_price = $request->final_price;
        $sale->discount_percentage = $request->overall_discount_percentage;
        $sale->close_date = $request->close_date;
        $sale->owner_id = $decryptedOwnerId;
        $sale->sale_type = $request->sale_type;
        $sale->priority = $request->priority;
        $sale->description = $request->description;

        $sale->save();

        $contactIds = $request->contact_id;
        $solutionIds = $request->solution_id;

        if ($contactIds) {
            foreach ($contactIds as $id) {
                $saleContact = new SaleContact();
                $saleContact->sale_id = $sale->id;
                $saleContact->contact_id = $id;

                $saleContact->save();
            }
        }

        if ($solutionIds) {
            foreach ($solutionIds as $key => $id) {
                $saleSolution = new SaleSolution();

                $saleSolution->sale_id = $sale->id;
                $saleSolution->solution_id = $id;
                $saleSolution->quantity = $request->quantity[$key];
                $saleSolution->discount_percentage = $request->discount_percentage[$key];

                $saleSolution->save();
            }
        }



        return redirect(route('sales.index'))->with(['success_message' => 'Sale has been added successfully!!!']);
    }

    public function show(string $id)
    {
        $id = Sale::decrypted_id($id);
        $sale = Sale::findOrFail($id);

        return view('sales.show', compact('sale'));
    }

    public function edit(string $id)
    {
        $id = Sale::decrypted_id($id);
        $sale = Sale::with('organization', 'saleOwner', 'timezone')->findOrFail($id);
        $pipelines = SalesPipeline::all();
        $solutions = SaleSolution::with('solution')->where('sale_id', $sale->id)->get();
        $contacts = SaleContact::with('contact')->where('sale_id', $sale->id)->get();

        return view('sales.edit', compact('sale', 'pipelines', 'solutions', 'contacts'));
    }

    public function update(Request $request, string $id)
    {
        $validation_rules = [
            'name' => 'required',
            'user_timezone_id' => 'required',
            'pipeline_id' => 'required',
            'pipeline_stage_id' => 'required',
            'organization_id' => 'nullable',
            'price' => 'nullable',
            'overall_discount_percentage' => 'nullable',
            'final_price' => 'nullable',
            'close_date' => 'nullable',
            'owner_id' => 'nullable',
            'sale_type' => 'nullable',
            'priority' => 'nullable',
            'solution_id' => 'required',
            'description' => 'nullable',
            'contact_id' => 'required|array',
            'quantity' => 'required|array',
            'quantity.*' => 'required'
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
        }

        // try {
        $id = Sale::decrypted_id($id);
        $sale = Sale::findOrFail($id);
        $decryptedOwnerId = Staff::decrypted_id($request->input('owner_id'));

        $sale->name = $request->name;
        $sale->user_timezone_id = $request->user_timezone_id;
        $sale->pipeline_id = $request->pipeline_id;
        $sale->pipeline_stage_id = $request->pipeline_stage_id;
        $sale->organization_id = $request->organization_id;
        $sale->price = $request->price;
        $sale->final_price = $request->final_price;
        $sale->discount_percentage = $request->overall_discount_percentage;
        $sale->close_date = $request->close_date;
        $sale->owner_id = $decryptedOwnerId;
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

                $data['sale_id'] = $sale->id;
                $data['solution_id'] = $solutionId;
                $data['quantity'] = $request->quantity[$key];
                $data['discount_percentage'] = $request->discount_percentage[$key];

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



        return redirect(route('sales.index'))->with(['success_message' => 'Sale updated successfully']);
        // } catch (\Exception $e) {
        //     return redirect()->back()->with('error_message', $e);
        // }
    }

    public function destroy(string $id)
    {
        $id = Sale::decrypted_id($id);
        $sale = Sale::findOrFail($id);

        if ($sale) {
            $sale->delete();

            session(['success_message' => 'Sale deleted successfully']);
            return response()->json(array('response_type' => 1));
        } else {
            return redirect()->back()->with('error_message', 'Sale not found');
        }
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

    public function getPipelineStage(Request $request)
    {
        $pipelineStages = SalesPipelineStage::where('pipeline_id', $request->pipelineId)->get();

        return response()->json(['pipelineStages' => $pipelineStages]);
    }
}
