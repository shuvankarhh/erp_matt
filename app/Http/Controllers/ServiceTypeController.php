<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectType;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;

class ServiceTypeController extends Controller
{
    public function index()
    {
        abort(404);
    }

    public function create()
    {
        $tenant_id = Auth::user()->tenant_id ?? 1;

        $project_types = ProjectType::where('tenant_id', $tenant_id)->pluck('name', 'id');

        $html = view('service_types.create', compact('project_types'))->render();

        return response()->json([
            'html' => $html
        ]);
    }

    public function store(Request $request)
    {
        try {
            $rules = [
                'project_type_id' => ['required', 'string'],
                'name' => ['required', 'string', 'max:255'],
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

        $service_type = new ServiceType();
        $service_type->tenant_id = $tenant_id;
        $service_type->project_type_id = $request->input('project_type_id');
        $service_type->name = $request->input('name');
        $service_type->save();

        return response()->json([
            'success' => true,
            'message' => 'Service type has been added successfully!!!',
            'redirect' => url()->previous()
        ]);
    }

    public function show(ServiceType $ServiceType)
    {
        abort(404);
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);

        $service_type = ServiceType::findOrFail($id);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $project_types = ProjectType::where('tenant_id', $tenant_id)->pluck('name', 'id');

        $html = view('service_types.edit', compact('service_type', 'project_types'))->render();

        return response()->json([
            'html' => $html,
        ]);
    }

    public function update(Request $request, string $id)
    {
        try {
            $rules = [
                'project_type_id' => ['required', 'string'],
                'name' => ['required', 'string', 'max:255'],
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

        $id = Crypt::decrypt($id);
        $service_type = ServiceType::findOrFail($id);
        $service_type->tenant_id = $tenant_id;
        $service_type->project_type_id = $request->input('project_type_id');
        $service_type->name = $request->input('name');
        $service_type->save();

        return response()->json([
            'success' => true,
            'message' => 'Service type has been updated successfully!!!',
            'redirect' => url()->previous()
        ]);
    }

    public function destroy(string $id)
    {
        $id = Crypt::decrypt($id);
        $service_type = ServiceType::findOrFail($id);

        if ($service_type) {
            $service_type->delete();
        }

        session(['success_message' => 'Service type has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }
}
