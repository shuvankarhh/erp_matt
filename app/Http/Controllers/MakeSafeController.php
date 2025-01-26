<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\MakeSafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class MakeSafeController extends Controller
{
    public function index()
    {
        abort(404);
    }

    public function create(Request $request)
    {
        $form_types = [
            1 => 'Internal Form',
            2 => 'External Form'
        ];

        $projectId = $request->query('project_id');

        $project = Project::where('tenant_id', Auth::user()->tenant_id)->where('id', $projectId)->first();

        return view('make_safes.create', compact('project', 'form_types'));
    }

    public function store(Request $request, Project $project)
    {
        // dd($request->all());

        try {
            $rules = [
                'form_id' => 'required|in:1,2',
                // 'structural_stabilization' => 'nullable|string',
                // 'electrical_isolation' => 'nullable|string',
                // 'debris_removal' => 'nullable|string',
                'checklist' => ['required', 'array'], // Ensure checklist is an array
                'checklist.*' => ['nullable', 'boolean'], // Validate individual checklist items
                'additional_comments' => ['nullable', 'string'],
                'media_uploads.*' => ['nullable', 'file', 'mimes:jpg,jpeg,png,mp4'],
                'completion_date' => ['required', 'date'],
                'technician_signature' => 'nullable|string',
                'task_verified' => 'nullable|boolean',
                'subcontractor_signature' => 'nullable|string',
                'timestamp' => 'nullable|date',
            ];

            if ($request->input('form_id') === '1') {
                // $rules['structural_stabilization'] = ['required', 'string', 'max:255'];
                // $rules['electrical_isolation'] = ['required', 'string', 'max:255'];
                // $rules['debris_removal'] = ['required', 'string', 'max:255'];
                $rules['checklist'] = ['required', 'array'];
                $rules['checklist.*'] = ['nullable', 'boolean'];
                $rules['additional_comments'] = ['nullable', 'string', 'max:1000'];
                $rules['media_uploads'] = ['nullable', 'array'];
                $rules['media_uploads.*'] = ['nullable', 'file', 'mimes:jpg,jpeg,png,mp4'];
                // $rules['technician_signature'] = ['required', 'string'];
                $rules['completion_date'] = ['required', 'date'];
                $rules['technician_signature'] = ['required', 'file', 'mimes:png,jpg,jpeg', 'max:2048'];
            } else {
                $rules = array_merge($rules, [
                    'task_verified' => 'required|string|max:255',
                    'subcontractor_signature' => 'required|string|max:255',
                    'timestamp' => 'required|string|max:255',
                ]);
            }

            $messages = [];

            $attributes = [
                'form_id' => 'form type',
            ];

            $request->validate($rules, $messages, $attributes);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        // dd('Validation Pass');

        $tenant_id = Auth::user()->tenant_id ?? 1;

        // Process Media Uploads
        $mediaPaths = [];
        if ($request->hasFile('media_uploads')) {
            foreach ($request->file('media_uploads') as $file) {
                $path = $file->store('uploads/media', 'public');
                $mediaPaths[] = $path;
            }
        }

        // Process Signature Upload
        $signaturePath = null;
        if ($request->hasFile('technician_signature')) {
            $signaturePath = $request->file('technician_signature')->store('uploads/signatures', 'public');
        }

        // Store Data
        $makeSafe = new MakeSafe();
        $makeSafe->tenant_id = $tenant_id;
        $makeSafe->project_id = $request->input('project_id');
        $makeSafe->form_id = $request->input('form_id');
        $makeSafe->checklist = json_encode($request->input('checklist')); // Store checklist as JSON
        $makeSafe->additional_comments = $request->input('additional_comments');
        $makeSafe->media_uploads = json_encode($mediaPaths); // Store media paths as JSON
        $makeSafe->completion_date = $request->input('completion_date');
        $makeSafe->technician_signature = $signaturePath; // Save signature path
        $makeSafe->save();

        return response()->json([
            'success' => true,
            'message' => 'Make safe form has been added successfully!!!',
            'redirect' => url()->previous()
        ]);
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
