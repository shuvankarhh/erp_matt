<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesPipeline;
use Illuminate\Support\Facades\Auth;

class SalesPipelineController extends Controller
{

    public function index()
    {
        $sales_pipelines = SalesPipeline::paginate();

        return view('sales_pipelines.index', [
            'sales_pipelines' => $sales_pipelines
        ]);
    }

    public function create()
    {
        $html = view('sales_pipelines.create')->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $sales_pipeline = new SalesPipeline;
        $sales_pipeline->tenant_id = $tenant_id;
        $sales_pipeline->name = $request->name;

        if ($request->is_default == 'on') {
            $count_pipline = SalesPipeline::where('is_default', '1')->count();
            if ($count_pipline > 0) {
                SalesPipeline::where('is_default', '1')->update(['is_default' => 0]);
            }
            $sales_pipeline->is_default = 1;
        } else {
            $sales_pipeline->is_default = 0;
        }

        $count_pipline = SalesPipeline::count();
        if ($count_pipline == 0) {
            $sales_pipeline->is_default = 1;
        }


        $sales_pipeline->save();

        session(['success_message' => 'Sales pipeline has been added successfully!!!']);

        return redirect()->back();
    }


    public function edit($id)
    {
        $id = SalesPipeline::decrypted_id($id);
        $sales_pipeline = SalesPipeline::find($id);

        $html = view('sales_pipelines.edit', [
            'sales_pipeline' => $sales_pipeline,
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $decryptedSalesPipelineId = SalesPipeline::decrypted_id($id);
        $sales_pipeline = SalesPipeline::findOrFail($decryptedSalesPipelineId);

        $sales_pipeline->name = $request->name;

        if ($request->has('is_default') && $request->is_default == 'on') {
            SalesPipeline::where('is_default', 1)
                ->where('id', '!=', $decryptedSalesPipelineId)
                ->update(['is_default' => 0]);

            $sales_pipeline->is_default = 1;
        } else {
            $sales_pipeline->is_default = 0;
        }

        $sales_pipeline->save();

        if (!SalesPipeline::where('is_default', 1)->exists()) {
            SalesPipeline::orderBy('created_at')->first()->update(['is_default' => 1]);
        }

        session()->flash('success_message', 'Sales pipeline has been updated successfully!!!');

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $id = SalesPipeline::decrypted_id($id);
        SalesPipeline::find($id)->delete();

        session(['success_message' => 'Sales pipeline has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }
}
