<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\MakeSafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MakeSafeController extends Controller
{
    public function index()
    {
        abort(404);
    }

    public function create(Request $request)
    {
        $projectId = $request->query('project_id');

        $project = Project::where('tenant_id', Auth::user()->tenant_id)->where('id', $projectId)->first();

        return view('make_safes.create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        dd($request->all());

        $request->validate([
            'form_id' => 'required|in:1,2',
            'structural_stabilization' => 'nullable|string',
            'electrical_isolation' => 'nullable|string',
            'debris_removal' => 'nullable|string',
            'additional_comments' => 'nullable|string',
            'media_uploads.*' => 'nullable|file|mimes:jpg,jpeg,png,mp4',
            'technician_signature' => 'nullable|string',
            'task_verified' => 'nullable|boolean',
            'subcontractor_signature' => 'nullable|string',
            'timestamp' => 'nullable|date',
        ]);

        $makeSafe = $project->makeSafes()->create($request->all());

        return redirect()->route('projects.show', $project->id)->with('success', 'Make Safe Form added successfully.');
    }

    public function show(MakeSafe $makeSafe)
    {
        abort(404);
    }

    public function edit(MakeSafe $makeSafe)
    {
        abort(404);
    }

    public function update(Request $request, MakeSafe $makeSafe)
    {
        abort(404);
    }

    public function destroy(MakeSafe $makeSafe)
    {
        abort(404);
    }
}
