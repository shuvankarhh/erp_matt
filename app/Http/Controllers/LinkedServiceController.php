<?php

namespace App\Http\Controllers;

use App\Models\LinkedService;
use App\Models\LinkedServiceType;
use App\Models\LinkedServiceSubType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LinkedServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $tenant_id = Auth::user()->tenant_id;
        $linkedServiceTypes=LinkedServiceType::where('tenant_id',  $tenant_id )->get();

        $projectId = $request->query('project');
        $html = view('linkedServices.create', compact('linkedServiceTypes','projectId'))->render();

        return response()->json(['html' => $html]);

    }

    /**
     * Store a newly created resource in storage.
     */
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
        $linkedService->project_id =$projectId;

        $linkedService->save();

        session(['success_message' => 'Linked services added successfully!!!']);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(LinkedService $linkedService)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LinkedService $linkedService)
    {
        $tenant_id = Auth::user()->tenant_id;
        $linkedServices = LinkedService::find($linkedService->id);
        $linkedServiceTypes=LinkedServiceType::where('tenant_id',  $tenant_id )->get();
        $linkedServiceSubTypes=LinkedServiceSubType::where('tenant_id',  $tenant_id )->get();
        $html = view('linkedServices.edit', [
            'linkedServices' => $linkedServices,
            'linkedServiceTypes' => $linkedServiceTypes,
            'linkedServiceSubTypes' => $linkedServiceSubTypes
        ])->render();
        return response()->json(['html' => $html]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LinkedService $linkedService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LinkedService $linkedService)
    {
        //
    }
}
