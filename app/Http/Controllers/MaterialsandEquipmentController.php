<?php

namespace App\Http\Controllers;

use App\Models\MaterialsandEquipment;
use App\Models\Pricelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\ProjectMaterial;
use Illuminate\Support\Facades\DB;

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
        DB::beginTransaction(); // Start a transaction
    
        try {
            // Validation
            $rules = [
                'name' => ['required'],
                'quantity' => ['required', 'numeric'],
                'pricelist_id' => ['required', 'exists:pricelists,id'],
            ];
    
            $messages = [];
            $attributes = [];
    
            $request->validate($rules, $messages, $attributes);
    
            // Tenant ID
            $tenant_id = Auth::user()->tenant_id ?? 1;
    
            // Get project ID from query parameter
            $projectId = $request->query('project');
    
            // Create MaterialsandEquipment
            $materialsandEquipment = new MaterialsandEquipment();
            $materialsandEquipment->tenant_id = $tenant_id;
            $materialsandEquipment->name = $request->input('name');
            $materialsandEquipment->quantity = $request->input('quantity');
            $materialsandEquipment->pricelist_id = $request->input('pricelist_id');
            $materialsandEquipment->save();
    
            // Create ProjectMaterial
            $projectMaterial = new ProjectMaterial();
            $projectMaterial->tenant_id = $tenant_id;
            $projectMaterial->project_id = $projectId;
            $projectMaterial->materials_and_equipment_id = $materialsandEquipment->id;
            $projectMaterial->save();
    
            DB::commit(); // Commit transaction
    
            return response()->json([
                'success' => true,
                'message' => 'Material and Equipment has been added successfully!',
                'redirect' => url()->previous(),
            ]);
        } catch (ValidationException $e) {
            DB::rollBack(); // Rollback transaction on validation error
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction on any other error
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while adding Material and Equipment: ' . $e->getMessage(),
            ], 500);
        }
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
    public function edit(string $id)
    {
        $materialsandEquipments = MaterialsandEquipment::findOrFail($id);
        $tenant_id = Auth::user()->tenant_id ?? 1;
        $pricelists = Pricelist::where('tenant_id',$tenant_id)->pluck('price', 'id');
        // dd($materialsandEquipments);
        $html = view('Materials_and_Equipments.edit', compact('materialsandEquipments','pricelists'))->render();

        return response()->json([
            'html' => $html,
            'modal_width' => 'max-w-xl',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
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

        $materialsandEquipment = MaterialsandEquipment::findOrFail($id);
        $materialsandEquipment->tenant_id = $tenant_id;
        $materialsandEquipment->name = $request->input('name');
        $materialsandEquipment->quantity = $request->input('quantity');
        $materialsandEquipment->pricelist_id = $request->input('pricelist_id');
        $materialsandEquipment->save();

        return response()->json([
            'success' => true,
            'message' => 'Material and Equipment has been update successfully',
            'redirect' => url()->previous()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        // Start a database transaction
        DB::beginTransaction();
    
        try {
            $materialsandEquipment = MaterialsandEquipment::findOrFail($id);
    
            $projectId = $request->query('project');
            $projectMaterial = ProjectMaterial::where('project_id', $projectId)
                ->where('materials_and_equipment_id', $id)
                ->first();
    
            if ($projectMaterial) {
                $projectMaterial->delete();
            }

            $materialsandEquipment->delete();

            DB::commit();
            session(['success_message' => 'Material and Equipment have been deleted successfully']);
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with(['success_message' => 'An error occurred while deleting Material and Equipment']);

        }
    }
}
