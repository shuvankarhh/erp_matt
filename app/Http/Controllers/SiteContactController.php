<?php

namespace App\Http\Controllers;

use App\Models\SiteContact;
use Illuminate\Http\Request;

class SiteContactController extends Controller
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
    public function create()
    {
        $types = [
            1 => 'Contact',
            2 => 'Task'
        ];

        $html = view('siteContacts.create', compact('types'))->render();

        return response()->json(['html' => $html]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:20',
            'role' => 'nullable|string|max:100'
        ]);
        

        $siteContact = new SiteContact();
        $siteContact->tenant_id =1;
        $siteContact->name = $validated['name'];
        $siteContact->email = $validated['email'];
        $siteContact->phone = $validated['phone'];
        $siteContact->role = $validated['role'];
        $siteContact->project_id =1;
        $siteContact->save();

        session(['success_message' => 'Site contact added successfully!!!']);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(SiteContact $siteContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SiteContact $siteContact)
    {
    
        $siteContacts = SiteContact::find($siteContact->id);
        
        $html = view('siteContacts.edit', [
            'siteContacts' => $siteContacts
        ])->render();
        return response()->json(['html' => $html]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SiteContact $siteContact)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required',
            'phone' => 'nullable|string|max:20',
            'role' => 'nullable|string|max:100'
        ]);
        

        $siteContacts = SiteContact::find($siteContact->id);
        $siteContacts->tenant_id =1;
        $siteContacts->name = $validated['name'];
        $siteContacts->email = $validated['email'];
        $siteContacts->phone = $validated['phone'];
        $siteContacts->role = $validated['role'];
        $siteContacts->project_id =1;
        $siteContacts->save();

        session(['success_message' => 'Site contact updated successfully!!!']);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SiteContact $siteContact)
    {
        $task = SiteContact::find($siteContact->id);
        $task->delete();
        session(['success_message' => 'Site contact added successfully!!!']);
        return redirect()->back();
    }
}
