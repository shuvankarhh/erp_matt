<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SupportPipeline;
use App\Models\SupportPipelineStage;

class SupportSettingsController extends Controller
{
    public function index()
    {
        $support_pipelines = SupportPipeline::all();
        $support_pipeline_stages = SupportPipelineStage::with('trashed_pipeline')->get();
        return view('support_settings.support_settings_index',[
            'support_pipelines' => $support_pipelines,
            'support_pipeline_stages' => $support_pipeline_stages
        ]);
    }
}
