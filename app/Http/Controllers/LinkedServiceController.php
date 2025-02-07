<?php

namespace App\Http\Controllers;

use App\Models\LinkedService;
use App\Models\LinkedServiceType;
use App\Models\LinkedServiceSubType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkedServiceController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request)
    {
        $tenant_id = Auth::user()->tenant_id;
        $linkedServiceTypes = LinkedServiceType::where('tenant_id',  $tenant_id)->get();

        $projectId = $request->query('project');
        $html = view('linkedServices.create', compact('linkedServiceTypes', 'projectId'))->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $projectId = $request->query('project');
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'type' => 'required|string',
        ]);


        $tenant_id = Auth::user()->tenant_id;
        $linkedService = new LinkedService();
        $linkedService->tenant_id = $tenant_id;
        $linkedService->service_name = $validated['service_name'];
        $linkedService->type = $validated['type'];
        $linkedService->subtype = $request->subtype;
        $linkedService->insurance_policy = $request->insurance_policy;
        $linkedService->notes = $request->notes;
        $linkedService->project_id = $projectId;

        $linkedService->save();

        session(['success_message' => 'Linked services added successfully!!!']);
        return redirect()->back();
    }

    public function show(LinkedService $linkedService)
    {
        //
    }

    public function edit(LinkedService $linkedService)
    {
        $tenant_id = Auth::user()->tenant_id;
        $linkedServices = LinkedService::find($linkedService->id);
        $linkedServiceTypes = LinkedServiceType::where('tenant_id',  $tenant_id)->get();
        $linkedServiceSubTypes = LinkedServiceSubType::where('tenant_id',  $tenant_id)->get();
        $html = view('linkedServices.edit', [
            'linkedServices' => $linkedServices,
            'linkedServiceTypes' => $linkedServiceTypes,
            'linkedServiceSubTypes' => $linkedServiceSubTypes
        ])->render();
        return response()->json(['html' => $html]);
    }

    public function update(Request $request, LinkedService $linkedService)
    {
        $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'type' => 'required|string',
        ]);
        

        $tenant_id = Auth::user()->tenant_id;
        $linkedService = LinkedService::find($linkedService->id);
        $linkedService->tenant_id = $tenant_id;
        $linkedService->service_name = $validated['service_name'];
        $linkedService->type = $validated['type'];
        $linkedService->subtype = $request->subtype;
        $linkedService->insurance_policy = $request->insurance_policy;
        $linkedService->notes = $request->notes;

        $linkedService->save();

        session(['success_message' => 'Linked services added successfully!!!']);
        return redirect()->back();
    }

    public function destroy(LinkedService $linkedService)
    {
        //
    }
}
