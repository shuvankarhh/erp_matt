<?php

namespace App\Http\Controllers;

use App\Models\MaterialsandEquipment;
use App\Models\Pricelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\ProjectMaterial;

class MaterialsandEquipmentController extends Controller
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
        
        $tenant_id = Auth::user()->tenant_id ?? 1;
        $projectId = $request->query('project');
        $pricelists= Pricelist::where('tenant_id',$tenant_id)->pluck('price', 'id');
        $html = view('Materials_and_Equipments.create',[
            'pricelists'=>$pricelists,
            'projectId'=>$projectId
        ])->render();

        return response()->json([
            'html' => $html
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $rules = [
                'name' => ['required'],
                'quantity' => ['required'],
                'pricelist_id' => ['required'],
            ];

            $messages = [];

            $attributes = [];

            $request->validate($rules, $messages, $attributes);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $projectId = $request->query('project');
        $materialsandEquipment = new MaterialsandEquipment();
        $materialsandEquipment->tenant_id = $tenant_id;
        $materialsandEquipment->name = $request->input('name');
        $materialsandEquipment->quantity = $request->input('quantity');
        $materialsandEquipment->pricelist_id = $request->input('pricelist_id');
        $materialsandEquipment->save();

        
        $projectMaterial = new ProjectMaterial();
        $projectMaterial->tenant_id = $tenant_id;
        $projectMaterial->project_id = $projectId;
        $projectMaterial->materials_and_equipment_id = $materialsandEquipment->id;
        $projectMaterial->save();

        return response()->json([
            'success' => true,
            'message' => 'Material and Equipment has been added successfully!!!',
            'redirect' => url()->previous()
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(MaterialsandEquipment $materialsandEquipment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MaterialsandEquipment $materialsandEquipment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MaterialsandEquipment $materialsandEquipment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MaterialsandEquipment $materialsandEquipment)
    {
        //
    }
}
