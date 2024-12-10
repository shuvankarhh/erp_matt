<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportPipeline;
use App\Services\Vendor\Tauhid\Pagination\Pagination;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class SupportPipelineController extends Controller
{
    public function index()
    {
        $support_pipelines= SupportPipeline::all();
        return view('pipeline.pipeline_index',[
            'support_pipelines' => $support_pipelines,
        ]);
    }

    public function create()
    {
        $response_body =  view('support_settings._support_pipeline_create_modal', []);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function store(Request $request)
    {
        $validation_rules = [
            'name' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return redirect()->back()->with(['error_message' => 'The name is required.']);
        }
        $support_pipeline = new SupportPipeline;
        $support_pipeline->name = $request->name;

        if($request->is_default == 'on'){
            $count_pipline =SupportPipeline::where('is_default','1')->count();
            if( $count_pipline > 0){
                SupportPipeline::where('is_default', '1')->update(['is_default' => 0]);
            }
            $support_pipeline->is_default = 1;

        }
        else{
            $support_pipeline->is_default = 0;
        }

        $count_pipline =SupportPipeline::count();
        if($count_pipline == 0){
            $support_pipeline->is_default = 1;
        }

        $support_pipeline->save();

        session(['success_message' => 'support Pipeline has been created successfully']);
        return redirect()->back();
    }

    public function edit($id)
    {
        $decryptedSupportPipelineId = SupportPipeline::decrypted_id($id);
        $support_pipeline = SupportPipeline::find($decryptedSupportPipelineId);

        $response_body =  view('support_settings._support_pipeline_edit_modal', [

            'support_pipeline' => $support_pipeline,
        ]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }
    public function update(Request $request, $id)
    {
        $validation_rules = [
            'name' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {

            return redirect()->back()->with(['error_message' => 'The name is required.']);

        }
        $id = SupportPipeline::decrypted_id($id);
        $support_pipeline = SupportPipeline::find($id);
        $support_pipeline->name = $request->name;
        if($request->is_default == 'on'){
            $count_pipline =SupportPipeline::where('is_default','1')->count();
            if( $count_pipline > 0){
                SupportPipeline::where('id', '!=', $id)->where('is_default', '1')->update(['is_default' => 0]);
            }
            $support_pipeline->is_default = 1;
        }
        else{
            $support_pipeline->is_default = 0;
        }
        $support_pipeline->save();

        session(['success_message' => 'Support Pipeline has been updated successfully']);

        return redirect()->back();
    }
    public function destroy(string $id)
    {
        $id = SupportPipeline::decrypted_id($id);
        SupportPipeline::find($id)->delete();
        return response()->json(array('response_type' => 1));
    }



}
