<?php

namespace App\Http\Controllers;

use App\Models\mediaandDocumentation;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\StorageHandlers\DynamicStorageHandler;

class MediaandDocumentationController extends Controller
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

        $projectId = $request->query('project');

        $tenant_id = Auth::user()->tenant_id;
        $tasks = Task::with('project')
                            ->where('tenant_id', $tenant_id)
                            ->where('id', $projectId)
                            ->get()                      
                            ;

        $html = view('media_and_documentations.create', compact('tasks','projectId'))->render();

        return response()->json(['html' => $html]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tenant_id = Auth::user()->tenant_id;
        $dynamic = new DynamicStorageHandler;
        $upload_info = $dynamic->upload($request->file('file'), 'media_and_Documentation');
        mediaandDocumentation::updateOrCreate(
            [
                'tenant_id' => $tenant_id ,
                'task_id' => json_encode($request->task_id) ,
                'project_id' => $request->input('project'),
                'storage_provider_id' => $upload_info['storage_provider_id'],
                'is_private_file' => false,
                'file_path' => $upload_info['uploaded_path'],
                'file_url' => $upload_info['uploaded_url'],
                'original_file_name' => $request->file('file')->getClientOriginalName()
            ]
        );

        return redirect()->back()->with('success', 'File uploaded successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(mediaandDocumentation $mediaandDocumentation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mediaandDocumentation $mediaandDocumentation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mediaandDocumentation $mediaandDocumentation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mediaandDocumentation = mediaandDocumentation::findOrFail($id);

        $mediaandDocumentation->delete();
        session(['success_message' => 'Media and Documentation have been deleted successfully']);
        return redirect()->back();
    }
}
