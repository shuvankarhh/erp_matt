<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesPipeline;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Services\Vendor\Tauhid\Pagination\Pagination;

class SalesPipelineController extends Controller
{

    public function index()
    {
        $pipelines= SalesPipeline::paginate();
        $pagination = Pagination::default($pipelines);
        return view('pipeline.pipeline_index',[
            'pipelines' => $pipelines,
            'pagination' => $pagination
        ]);
    }

    public function create()
    {
        $response_body =  view('partials._pipeline_create_modal', [
        ]);
        return response()->json(array('response_type'=> 1, 'response_body'=> mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function store(Request $request)
    {
        $validation_rules = [
            'name' => 'required', 
        ];
        
        Validation::validate($request, $validation_rules, [], []);


        if(ErrorMessage::has_error())
        {
            return redirect()->back()->with(['error_message' => 'The name is required.']);
        }
        $pipeline=new SalesPipeline;
        $pipeline->name = $request->name;

        if($request->is_default == 'on'){
            $count_pipline =SalesPipeline::where('is_default','1')->count();
            if( $count_pipline > 0){
                SalesPipeline::where('is_default', '1')->update(['is_default' => 0]);
            }
            $pipeline->is_default = 1;

        }
        else{
            $pipeline->is_default = 0;
        }

        $count_pipline =SalesPipeline::count();
        if($count_pipline == 0){
            $pipeline->is_default = 1;
        }


        $pipeline->save();

        session(['success_message' => 'Sales pipeline has been created successfully']);

        return redirect()->back();
    }


    public function edit($id)
    {
        $id = SalesPipeline::decrypted_id($id);
        $pipeline = SalesPipeline::find($id);
        $response_body =  view('partials._pipeline_edit_modal', [
            'pipeline'=> $pipeline,
        ]);
        return response()->json(array('response_type'=> 1, 'response_body'=> mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function destroy(string $id)
    {
        $id = SalesPipeline::decrypted_id($id);
        SalesPipeline::find($id)->delete();
        return response()->json(array('response_type'=> 1));
    }


    public function update(Request $request, $id)
    {

        $validation_rules = [
            'name' => 'required',
        ];
        
        Validation::validate($request, $validation_rules, [], []);

        if(ErrorMessage::has_error())
        {
            return redirect()->back()->with(['error_message' => 'The name is required.']);
        }
        $id = SalesPipeline::decrypted_id($id);
        $pipeline = SalesPipeline::find($id);
        $pipeline->name = $request->name;
        
        if($request->is_default == 'on'){
            $count_pipline =SalesPipeline::where('is_default','1')->count();
            if( $count_pipline > 0){
                SalesPipeline::where('id', '!=', $id)->where('is_default', '1')->update(['is_default' => 0]);
            }
            $pipeline->is_default = 1;
        }
        else{
            $pipeline->is_default = 0;
        }
        $pipeline->save();
        session(['success_message' => 'Sales pipeline name has been updated successfully']);
        return redirect()->back();
    }

}
