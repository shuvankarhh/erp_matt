<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\ContactSource;
use Illuminate\Support\Facades\Auth;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class ContactSourceController extends Controller
{
    public function index()
    {
        $contactSources = ContactSource::all();

        // return view('contact_source.index', compact('contactSources'));
        return view('contact_sources.index', compact('contactSources'));
    }

    public function create()
    {
        $html = view('contact_sources.create')->render();
        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $contactSource = new ContactSource();
        $contactSource->tenant_id = $tenant_id;
        $contactSource->name = $request->name;
        $contactSource->save();

        session(['success_message' => 'Contact source has been added successfully!!!']);

        return redirect()->back();
    }

    public function edit(string $id)
    {
        $id = ContactSource::decrypted_id($id);
        $contactSource = ContactSource::find($id);

        $html = view('contact_sources.edit', [
            'contact_source' => $contactSource,
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $id = ContactSource::decrypted_id($id);
        $contactSource = ContactSource::find($id);
        $contactSource->name = $request->name;
        $contactSource->save();

        session(['success_message' => 'Contact source has been updated successfully!!!']);

        return redirect()->back();
    }


    public function destroy(string $id)
    {
        $id = ContactSource::decrypted_id($id);
        ContactSource::find($id)->delete();

        session(['success_message' => 'Contact source has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }
}
