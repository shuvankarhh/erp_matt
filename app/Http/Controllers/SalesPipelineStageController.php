<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\SalesPipeline;
use App\Models\SalesPipelineStage;
use Illuminate\Support\Facades\Auth;

class SalesPipelineStageController extends Controller
{
    public function index()
    {
        $sales_pipeline_stages = SalesPipelineStage::with('pipeline')->paginate();

        return view('sales_pipeline_stages.index', compact('sales_pipeline_stages'));
    }

    public function create()
    {
        $sales_pipelines_collection = SalesPipeline::all();

        $selectedSalesPipelineId = old('pipeline_id') ?? $sales_pipelines_collection->firstWhere('is_default', 1)?->id;

        $sales_pipelines = SalesPipeline::pluck('name', 'id');

        $html = view('sales_pipeline_stages.create', compact('selectedSalesPipelineId', 'sales_pipelines'))->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pipeline_id' => 'required',
            'probability' => 'required'
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        try {
            $sales_pipeline_stage = new SalesPipelineStage();
            $sales_pipeline_stage->tenant_id = $tenant_id;
            $sales_pipeline_stage->pipeline_id = $request->pipeline_id;
            $sales_pipeline_stage->name = $request->name;
            $sales_pipeline_stage->probability = $request->probability;
            $sales_pipeline_stage->save();

            session(['success_message' => 'Sales pipeline stage has been added successfully!!!']);

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->with('error_message', $e);
        }
    }

    public function edit(string $id)
    {
        $id = SalesPipelineStage::decrypted_id($id);
        $sales_pipeline_stage = SalesPipelineStage::findOrFail($id);
        $sales_pipelines = SalesPipeline::pluck('name', 'id');

        $html = view('sales_pipeline_stages.edit', compact('sales_pipeline_stage', 'sales_pipelines'))->render();

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pipeline_id' => 'required',
            'probability' => 'required'
        ]);

        try {
            $id = SalesPipelineStage::decrypted_id($id);
            $pipelineStage = SalesPipelineStage::findOrFail($id);

            $pipelineStage->pipeline_id = $request->pipeline_id;
            $pipelineStage->name = $request->name;
            $pipelineStage->probability = $request->probability;

            $pipelineStage->update();

            session(['success_message' => 'Sales pipeline stage has been updated successfully!!!']);

            return redirect()->back();
        } catch (Exception $e) {
            return redirect()->back()->with('error_message', $e);
        }
    }

    public function destroy(string $id)
    {
        try {
            $id = SalesPipelineStage::decrypted_id($id);
            $pipelineStage = SalesPipelineStage::findOrFail($id);

            if ($pipelineStage) {
                $pipelineStage->delete();

                session(['success_message' => 'Sales pipeline stage has been deleted successfully!!!']);

                return response()->json(array('response_type' => 1));
            } else {
                return redirect()->back()->with('error_message', 'Pipeline stage not found');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error_message', $e);
        }
    }
}
