<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupportPipeline;
use Illuminate\Support\Facades\Auth;
use App\Services\Vendor\Tauhid\Pagination\Pagination;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class SupportPipelineController extends Controller
{
    public function index()
    {
        $support_pipelines = SupportPipeline::paginate();
        
        return view('support_pipelines.index', [
            'support_pipelines' => $support_pipelines,
        ]);
    }

    public function create()
    {
        $html = view('support_pipelines.create')->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $support_pipeline = new SupportPipeline;
        $support_pipeline->tenant_id = $tenant_id;
        $support_pipeline->name = $request->name;

        if ($request->is_default == 'on') {
            $count_pipline = SupportPipeline::where('is_default', '1')->count();
            if ($count_pipline > 0) {
                SupportPipeline::where('is_default', '1')->update(['is_default' => 0]);
            }
            $support_pipeline->is_default = 1;
        } else {
            $support_pipeline->is_default = 0;
        }

        $count_pipline = SupportPipeline::count();
        if ($count_pipline == 0) {
            $support_pipeline->is_default = 1;
        }

        $support_pipeline->save();

        session(['success_message' => 'Support pipeline has been added successfully!!!']);

        return redirect()->back();
    }

    public function edit($id)
    {
        $decryptedSupportPipelineId = SupportPipeline::decrypted_id($id);
        $support_pipeline = SupportPipeline::find($decryptedSupportPipelineId);

        $html = view('support_pipelines.edit', [
            'support_pipeline' => $support_pipeline,
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $id = SupportPipeline::decrypted_id($id);
        $support_pipeline = SupportPipeline::find($id);
        $support_pipeline->name = $request->name;
        if ($request->is_default == 'on') {
            $count_pipline = SupportPipeline::where('is_default', '1')->count();
            if ($count_pipline > 0) {
                SupportPipeline::where('id', '!=', $id)->where('is_default', '1')->update(['is_default' => 0]);
            }
            $support_pipeline->is_default = 1;
        } else {
            $support_pipeline->is_default = 0;
        }
        $support_pipeline->save();

        session(['success_message' => 'Support pipeline has been updated successfully!!!']);

        return redirect()->back();
    }
    public function destroy(string $id)
    {
        $id = SupportPipeline::decrypted_id($id);
        SupportPipeline::find($id)->delete();

        session(['success_message' => 'Support pipeline has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }
}
