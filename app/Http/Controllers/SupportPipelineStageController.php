<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportPipeline;
use App\Models\SupportPipelineStage;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class SupportPipelineStageController extends Controller
{

    public function create()
    {
        $support_pipelines = SupportPipeline::all();
        $response_body =  view('support_settings._support_pipeline_stage_create_modal', [
                                'support_pipelines' => $support_pipelines
                            ]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function store(Request $request)
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
        $support_pipeline_stage = new SupportPipelineStage;
        $support_pipeline_stage->name = $request->name;
        $support_pipeline_stage->pipeline_id = $request->pipeline_id;
        $support_pipeline_stage->resolving_status = $request->resolving_status;
        $support_pipeline_stage->save();
        session(['success_message' => 'support Pipeline stage has been created successfully']);
        return redirect()->back();
    }

    public function edit($id)
    {
        $id = SupportPipeline::decrypted_id($id);
        $support_pipeline_stage = SupportPipelineStage::find($id);
        $support_pipelines = SupportPipeline::all();
        $response_body =  view('support_settings._support_pipeline_stage_edit_modal', [
            'support_pipelines' => $support_pipelines,
            'support_pipeline_stage' => $support_pipeline_stage
        ]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
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

        session(['success_message' => 'Support Pipeline Stage has been updated successfully']);

        return redirect()->back();
    }
    public function destroy(string $id)
    {
        $id = SupportPipelineStage::decrypted_id($id);
        SupportPipelineStage::find($id)->delete();
        return response()->json(array('response_type' => 1));
    }


}
