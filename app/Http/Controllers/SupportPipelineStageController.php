<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportPipeline;
use App\Models\SupportPipelineStage;
use Illuminate\Support\Facades\Auth;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class SupportPipelineStageController extends Controller
{
    public function index()
    {
        // $support_pipelines = SupportPipeline::all();

        $support_pipeline_stages = SupportPipelineStage::with('pipeline')->get();

        return view('support_pipeline_stages.index', [
            'support_pipeline_stages' => $support_pipeline_stages,
        ]);
    }

    public function create()
    {
        $support_pipelines = SupportPipeline::pluck('name', 'id');

        $statuses = [
            1 => 'Open by support team',
            2 => 'Open by user',
            3 => 'Resolved'
        ];

        $html = view('support_pipeline_stages.create', [
            'support_pipelines' => $support_pipelines,
            'statuses' => $statuses
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'pipeline_id' => 'required',
            'resolving_status' => 'required'
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $support_pipeline_stage = new SupportPipelineStage;
        $support_pipeline_stage->tenant_id = $tenant_id;
        $support_pipeline_stage->name = $request->name;
        $support_pipeline_stage->pipeline_id = $request->pipeline_id;
        $support_pipeline_stage->resolving_status = $request->resolving_status;
        $support_pipeline_stage->save();

        session(['success_message' => 'Support pipeline stage has been added successfully!!!']);

        return redirect()->back();
    }

    public function edit($id)
    {
        $support_pipelines = SupportPipeline::pluck('name', 'id');

        $statuses = [
            1 => 'Open by support team',
            2 => 'Open by user',
            3 => 'Resolved'
        ];

        $id = SupportPipeline::decrypted_id($id);
        $support_pipeline_stage = SupportPipelineStage::find($id);

        $html = view('support_pipeline_stages.edit', [
            'support_pipeline_stage' => $support_pipeline_stage,
            'support_pipelines' => $support_pipelines,
            'statuses' => $statuses
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $validation_rules = [
            'name' => 'required',
            'pipeline_id' => 'required',
            'resolving_status' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return redirect()->back()->with(['error_message' => 'The name is required.']);
        }
        $id = SupportPipelineStage::decrypted_id($id);
        $support_pipeline_stage = SupportPipelineStage::find($id);
        $support_pipeline_stage->name = $request->name;
        $support_pipeline_stage->pipeline_id = $request->pipeline_id;
        $support_pipeline_stage->resolving_status = $request->resolving_status;
        $support_pipeline_stage->save();

        session(['success_message' => 'Support pipeline stage has been updated successfully!!!']);

        return redirect()->back();
    }
    public function destroy(string $id)
    {
        $id = SupportPipelineStage::decrypted_id($id);
        SupportPipelineStage::find($id)->delete();

        session(['success_message' => 'Support pipeline stage has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }
}
