<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\MakeSafe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class MakeSafeController extends Controller
{
    public function editInternal(Project $project)
    {
        $internalMakeSafe = $project->internalMakeSafe; // Retrieve related internal make safe
        return view('make_safes.internal.edit', compact('project', 'internalMakeSafe'));
    }

    // Update Internal Make Safe
    public function updateInternal(Request $request, Project $project)
    {
        $internalMakeSafe = $project->internalMakeSafe()->updateOrCreate(
            ['project_id' => $project->id],
            $request->only(['checklist', 'additional_comments', 'media_uploads', 'technician_signature'])
        );
        return redirect()->route('projects.internal_make_safe_form', ['project' => $project->id]);
    }

    // Edit External Make Safe
    public function editExternal(Project $project)
    {
        $externalMakeSafe = $project->externalMakeSafe; // Retrieve related external make safe
        return view('make_safes.external.edit', compact('project', 'externalMakeSafe'));
    }

    // Update External Make Safe
    public function updateExternal(Request $request, Project $project)
    {
        $externalMakeSafe = $project->externalMakeSafe()->updateOrCreate(
            ['project_id' => $project->id],
            $request->only(['task_verified', 'timestamp', 'subcontractor_signature'])
        );
        return redirect()->route('projects.external_make_safe_form', ['project' => $project->id]);
    }

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

    public function edit(string $projectId)
    {
        $form_types = [
            1 => 'Internal Form',
            2 => 'External Form'
        ];

        $tenantId = Auth::user()->tenant_id ?? 1;

        $project = Project::with('makeSafe')->where('tenant_id', $tenantId)->findOrFail($projectId);

        $makeSafe = MakeSafe::with('project')
            ->where('tenant_id', $tenantId)
            ->where('project_id', $project->id)
            ->where('form_id', 1)
            ->first();

        $checklist = $makeSafe ? json_decode($makeSafe->checklist, true) : [];

        $externalMakeSafe = MakeSafe::with('project')
            ->where('tenant_id', $tenantId)
            ->where('project_id', $project->id)
            ->where('form_id', 2)
            ->first();

        return view('make_safes.edit', compact('project', 'makeSafe', 'form_types', 'checklist', 'externalMakeSafe'));
    }

    public function update(Request $request, string $projectId)
    {
        // dd($request->all());

        $tenantId = Auth::user()->tenant_id ?? 1;

        try {
            $rules = [
                'form_id' => 'required|in:1,2',
            ];

            if ($request->input('form_id') === '1') {
                $rules['checklist'] = ['required', 'array'];
                $rules['checklist.*'] = ['nullable', 'boolean'];
                $rules['additional_comments'] = ['nullable', 'string', 'max:1000'];
                $rules['media_uploads'] = ['nullable', 'array'];
                $rules['media_uploads.*'] = ['nullable', 'file', 'mimes:jpg,jpeg,png,mp4'];
                $rules['completion_date'] = ['required', 'date'];
                $rules['technician_signature'] = ['required', 'file', 'mimes:png,jpg,jpeg', 'max:2048'];
            } else {
                $rules = array_merge($rules, [
                    'task_verified' => 'nullable|string|max:255',
                    // 'subcontractor_signature' => 'required|string|max:255',
                    'subcontractor_signature' => 'required|file|mimes:png,jpg,jpeg|max:2048',
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


        if ($request->input('form_id') == 2) {
            // dd('heloo brooooo im here');

            // Fetch or create a MakeSafe record
            $makeSafe = MakeSafe::firstOrNew([
                'tenant_id' => $tenantId,
                'project_id' => $projectId,
                'form_id' => $request->input('form_id'), // Assuming form_id 2 is for the external form
            ]);

            // Update the fields
            $makeSafe->task_verified = $request->input('task_verified', false); // Default to false if null
            $makeSafe->timestamp = $request->input('timestamp'); // Store the timestamp directly

            // Handle subcontractor signature upload
            if ($request->hasFile('subcontractor_signature')) {
                // Delete the old file if it exists
                if ($makeSafe->subcontractor_signature) {
                    Storage::disk('public')->delete($makeSafe->subcontractor_signature);
                }

                // Store the new file and save the path
                $makeSafe->subcontractor_signature = $request->file('subcontractor_signature')->store('uploads/signatures', 'public');
            }

            // Save the record
            $makeSafe->save();
        } else {

            $project = Project::where('tenant_id', $tenantId)->findOrFail($projectId);



            $makeSafe = MakeSafe::where('tenant_id', $tenantId)
                ->where('project_id', $project->id)
                ->first();

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

            if ($makeSafe) {
                $makeSafe->update([
                    'checklist' => json_encode($request->input('checklist')),
                    'additional_comments' => $request->input('additional_comments'),
                    'media_uploads' => json_encode($mediaPaths),
                    'completion_date' => $request->input('completion_date'),
                    'technician_signature' => $signaturePath,
                ]);
            } else {
                $makeSafe = MakeSafe::create([
                    'tenant_id' => $tenantId,
                    'project_id' => $project->id,
                    'form_id' => $request->input('form_id'),
                    'checklist' => json_encode($request->input('checklist')),
                    'additional_comments' => $request->input('additional_comments'),
                    'media_uploads' => json_encode($mediaPaths),
                    'completion_date' => $request->input('completion_date'),
                    'technician_signature' => $signaturePath,
                ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Make safe form has been ' . ($makeSafe->wasRecentlyCreated ? 'added' : 'updated') . ' successfully!!!',
            'redirect' => url()->previous()
        ]);
    }

    public function update2(Request $request, $projectId)
    {
        $tenantId = Auth::user()->tenant_id ?? 1;

        // Fetch or create a MakeSafe record
        $makeSafe = MakeSafe::firstOrNew([
            'tenant_id' => $tenantId,
            'project_id' => $projectId,
            'form_id' => $request->input('form_id'), // Either 1 (internal) or 2 (external)
        ]);

        // Update common fields
        $makeSafe->checklist = json_encode($request->input('checklist', []));
        $makeSafe->additional_comments = $request->input('additional_comments');
        $makeSafe->media_uploads = json_encode($request->file('media_uploads', []));

        // Update external form-specific fields
        if ($makeSafe->form_id == 2) {
            $makeSafe->task_verified = $request->input('task_verified', false);
            $makeSafe->subcontractor_signature = $request->file('subcontractor_signature')
                ? $request->file('subcontractor_signature')->store('uploads/signatures', 'public')
                : $makeSafe->subcontractor_signature;
            $makeSafe->timestamp = $request->input('timestamp');
        }

        $makeSafe->save();

        return redirect()->route('project.show', $projectId)
            ->with('success', 'Make Safe Form successfully updated.');
    }


    public function destroy(MakeSafe $makeSafe)
    {
        abort(404);
    }
}
