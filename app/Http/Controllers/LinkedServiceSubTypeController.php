<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LinkedServiceSubType;
use App\Models\LinkedServiceType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;

class LinkedServiceSubTypeController extends Controller
{
    public function index()
    {
        abort(404);
    }

    public function create()
    {
        $tenant_id = Auth::user()->tenant_id ?? 1;

        $linked_service_types = LinkedServiceType::where('tenant_id', $tenant_id)->pluck('name', 'id');

        $html = view('linked_service_sub_types.create', compact('linked_service_types'))->render();

        return response()->json([
            'html' => $html
        ]);
    }

    public function store(Request $request)
    {
        try {
            $rules = [
                'linked_service_type_id' => ['required', 'string'],
                'name' => ['required', 'string', 'max:255'],
            ];

            $attributes = [
                'linked_service_type_id' => 'linked service type'
            ];

            $request->validate($rules, [], $attributes);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $linked_service_sub_type = new LinkedServiceSubType();
        $linked_service_sub_type->tenant_id = $tenant_id;
        $linked_service_sub_type->linked_service_type_id = $request->input('linked_service_type_id');
        $linked_service_sub_type->name = $request->input('name');
        $linked_service_sub_type->save();

        return response()->json([
            'success' => true,
            'message' => 'Linked service sub type has been added successfully!!!',
            'redirect' => url()->previous()
        ]);
    }

    public function show(LinkedServiceSubType $linkedServiceSubType)
    {
        abort(404);
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);

        $linked_service_sub_type = LinkedServiceSubType::findOrFail($id);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $linked_service_types = LinkedServiceType::where('tenant_id', $tenant_id)->pluck('name', 'id');

        $html = view('linked_service_sub_types.edit', compact('linked_service_sub_type', 'linked_service_types'))->render();

        return response()->json([
            'html' => $html,
        ]);
    }

    public function update(Request $request, string $id)
    {
        try {
            $rules = [
                'linked_service_type_id' => ['required', 'string'],
                'name' => ['required', 'string', 'max:255'],
            ];

            $attributes = [
                'linked_service_type_id' => 'linked service type'
            ];

            $request->validate($rules, [], $attributes);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $id = Crypt::decrypt($id);
        $linked_service_sub_type = LinkedServiceSubType::findOrFail($id);
        $linked_service_sub_type->tenant_id = $tenant_id;
        $linked_service_sub_type->linked_service_type_id = $request->input('linked_service_type_id');
        $linked_service_sub_type->name = $request->input('name');
        $linked_service_sub_type->save();

        return response()->json([
            'success' => true,
            'message' => 'Linked service sub type has been updated successfully!!!',
            'redirect' => url()->previous()
        ]);
    }

    public function destroy(string $id)
    {
        $id = Crypt::decrypt($id);
        $linked_service_sub_type = LinkedServiceSubType::findOrFail($id);

        if ($linked_service_sub_type) {
            $linked_service_sub_type->delete();
        }

        session(['success_message' => 'Linked service sub type has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }
}
