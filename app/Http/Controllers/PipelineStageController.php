<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PipelineStage;
use App\Models\SalesPipeline;
use App\Services\Vendor\Tauhid\Pagination\Pagination;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class PipelineStageController extends Controller
{
    public function index()
    {
        $pipelineStages = PipelineStage::with('pipeline')->paginate();
        $pagination = Pagination::default($pipelineStages);

        return view('pipeline_stage.index', compact('pipelineStages', 'pagination'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pipelines = SalesPipeline::select('id', 'name', 'is_default')->get();

        $response_body =  view('partials._pipeline_stage_create_modal', ['pipelines' => $pipelines]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation_rules = [
            'pipeline_id' => 'required',
            'name' => 'required',
            'probability' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
        }

        try {
            $pipelineStage = new PipelineStage();
            $pipelineStage->pipeline_id = $request->pipeline_id;
            $pipelineStage->name = $request->name;
            $pipelineStage->probability = $request->probability;

            $pipelineStage->save();

            session(['success_message' => 'Pipeline stage created successfully']);

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message', $e);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = PipelineStage::decrypted_id($id);
        $pipelineStage = PipelineStage::findOrFail($id);
        $pipelines = SalesPipeline::select('id', 'name', 'is_default')->get();

        $response_body = view(
            'partials._pipeline_stage_edit_modal',
            [
                'pipelineStage' => $pipelineStage,
                'pipelines' => $pipelines
            ]
        );

        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation_rules = [
            'pipeline_id' => 'required',
            'name' => 'required',
            'probability' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
        }

        try {
            $id = PipelineStage::decrypted_id($id);
            $pipelineStage = PipelineStage::findOrFail($id);

            $pipelineStage->pipeline_id = $request->pipeline_id;
            $pipelineStage->name = $request->name;
            $pipelineStage->probability = $request->probability;

            $pipelineStage->update();

            session(['success_message' => 'Pipeline stage updated successfully']);

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $id = PipelineStage::decrypted_id($id);
            $pipelineStage = PipelineStage::findOrFail($id);

            if ($pipelineStage) {
                $pipelineStage->delete();

                session(['success_message' => 'Pipeline stage deleted successfully']);
                return response()->json(array('response_type' => 1));
            } else {
                return redirect()->back()->with('error_message', 'Pipeline stage not found');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error_message', $e);
        }
    }
}
