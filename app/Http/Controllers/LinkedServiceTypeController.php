<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LinkedServiceType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;

class LinkedServiceTypeController extends Controller
{
    public function index()
    {
        abort(404);
    }

    public function create()
    {
        $html = view('linked_service_types.create')->render();

        return response()->json([
            'html' => $html
        ]);
    }

    public function store(Request $request)
    {
        try {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
            ];

            $request->validate($rules, [], []);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $linked_service_type = new LinkedServiceType();
        $linked_service_type->tenant_id = $tenant_id;
        $linked_service_type->name = $request->input('name');
        $linked_service_type->save();

        return response()->json([
            'success' => true,
            'message' => 'Linked service type has been added successfully!!!',
            'redirect' => url()->previous()
        ]);
    }

    public function show(LinkedServiceType $linkedServiceType)
    {
        abort(404);
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $linked_service_type = LinkedServiceType::findOrFail($id);

        $html = view('linked_service_types.edit', compact('linked_service_type'))->render();

        return response()->json([
            'html' => $html,
        ]);
    }

    public function update(Request $request, string $id)
    {
        try {
            $rules = [
                'name' => ['required', 'string', 'max:255'],
            ];

            $request->validate($rules, [], []);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $id = Crypt::decrypt($id);
        $linked_service_type = LinkedServiceType::findOrFail($id);
        $linked_service_type->tenant_id = $tenant_id;
        $linked_service_type->name = $request->input('name');
        $linked_service_type->save();

        return response()->json([
            'success' => true,
            'message' => 'Linked service type has been updated successfully!!!',
            'redirect' => url()->previous()
        ]);
    }

    public function destroy(string $id)
    {
        $id = Crypt::decrypt($id);
        $linked_service_type = LinkedServiceType::findOrFail($id);

        if ($linked_service_type) {
            $linked_service_type->delete();
        }

        session(['success_message' => 'Linked service type has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }
}
