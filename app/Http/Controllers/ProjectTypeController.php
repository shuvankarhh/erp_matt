<?php

namespace App\Http\Controllers;

use App\Models\ProjectType;
use App\Models\ServiceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;

class ProjectTypeController extends Controller
{
    public function index()
    {
        abort(404);
    }

    public function create()
    {
        $html = view('project_types.create')->render();

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

        $project_type = new ProjectType();
        $project_type->tenant_id = $tenant_id;
        $project_type->name = $request->input('name');
        $project_type->save();

        return response()->json([
            'success' => true,
            'message' => 'Project type has been added successfully!!!',
            'redirect' => url()->previous()
        ]);
    }

    public function show(ProjectType $projectType)
    {
        abort(404);
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $project_type = ProjectType::findOrFail($id);

        $html = view('project_types.edit', compact('project_type'))->render();

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
        $project_type = ProjectType::findOrFail($id);
        $project_type->tenant_id = $tenant_id;
        $project_type->name = $request->input('name');
        $project_type->save();

        return response()->json([
            'success' => true,
            'message' => 'Project type has been updated successfully!!!',
            'redirect' => url()->previous()
        ]);
    }

    public function destroy(string $id)
    {
        $id = Crypt::decrypt($id);
        $project_type = ProjectType::findOrFail($id);

        if ($project_type) {
            $project_type->delete();
        }

        session(['success_message' => 'Project type has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }

    public function getServiceTypes($projectTypeId)
    {
        $serviceTypes = ServiceType::where('project_type_id', $projectTypeId)->pluck('name', 'id');

        return response()->json($serviceTypes);
    }
}
