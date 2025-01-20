<?php

namespace App\Http\Controllers;

use App\Models\Communication;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class CommunicationController extends Controller
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
        $types = [
            1 => 'Email',
            2 => 'Phone'
        ];
        $projectId = $request->query('project');
        $html = view('communications.create', compact('types','projectId'))->render();

        return response()->json(['html' => $html]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $projectId = $request->query('project');
        try {

            $rules = [
                'summary' => 'required',
                'type' => 'required',
            ];

            $messages = [];

            $attributes = [
                'summary' => 'summary',
                'type' => 'type'
            ];
            
            $request->validate($rules, $messages, $attributes);


        } catch (ValidationException $e) {
            session(['error_message' => 'Site contact added unsuccessful ']);

            return redirect()->back();
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $communication = new Communication;
        $communication->tenant_id = $tenant_id;
        $communication->type = $request->type;
        $communication->summary = $request->summary;
        $communication->project_id = $projectId;

        $communication->save();

        

        session(['success_message' => 'Site contact added successfully!!!']);

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Communication $communication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Communication $communication)
    {
        $types = [
            1 => 'Email',
            2 => 'Phone'
        ];
        $communication = Communication::find($communication->id);

        $html = view('communications.edit', [

            'communication' => $communication,
            'types' => $types
            
        ])->render();

        return response()->json(['html' => $html]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Communication $communication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Communication $communication)
    {
        $communications = Communication::find($communication->id);
        $communications->delete();
        session(['success_message' => 'Communication summary deleted successfully!!!']);
        return redirect()->back();
    }
}
