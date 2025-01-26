<?php

namespace App\Http\Controllers;

use App\Models\NotesandAnnotations;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesandAnnotationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $tenant_id = Auth::user()->tenant_id ?? 1;
        $projectId = $request->query('project');
        $tasks  =   Task::where('tenant_id',$tenant_id)->pluck('name', 'id');
        $html = view('notes_and_annotations.create',[
            'tasks'=>$tasks,
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
        $tenant_id = Auth::user()->tenant_id ?? 1;
        $projectId = $request->query('project');
        
        $note = new NotesandAnnotations();
        $note->tenant_id = $tenant_id;
        $note->project_id = $projectId;
        $note->section = $request->section;
        $note->task_id = " ";
        $note->material_id = " ";
        if($request->section == 'Task'){
            $note->task_id = $request->task_id;
        }else if($request->section == 'Material'){
            $note->material_id = $request->material_id;
        }
        $note->note = $request->note;
        $note->created_by = Auth::id();
        $note->updated_by = Auth::id();
        $note->save();

        return redirect()->back()->with('success', 'File uploaded successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(NotesandAnnotations $notesandAnnotations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NotesandAnnotations $notesandAnnotations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NotesandAnnotations $notesandAnnotations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NotesandAnnotations $notesandAnnotations)
    {
        //
    }
}
