<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\ContactTag;
use Illuminate\Http\Request;

class ContactTagController extends Controller
{
    public function attachTagToContact(Request $request, $contactId)
    {
        $contact = Contact::findOrFail($contactId);
        $tagIds = $request->input('tag_ids');

        // Validate input, if necessary

        // Attach tags to the contact
        $contact->tags()->attach($tagIds);

        return response()->json(['message' => 'Tags attached to contact successfully'], 200);
    }

    public function detachTagFromContact(Request $request, $contactId)
    {
        $contact = Contact::findOrFail($contactId);
        $tagIds = $request->input('tag_ids');

        // Detach tags from the contact
        $contact->tags()->detach($tagIds);

        return response()->json(['message' => 'Tags detached from contact successfully'], 200);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactTags = ContactTag::all();
        dd($contactTags);
        return  view('admin.contacts.tags.index', compact('contactTags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactTag $contactTag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactTag $contactTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactTag $contactTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactTag $contactTag)
    {
        //
    }
}
