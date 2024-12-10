<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\ContactSource;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class ContactSourceController extends Controller
{
    public function index()
    {
        $contactSources = ContactSource::all();

        return view('contact_source.index', compact('contactSources'));
    }
    public function create()
    {
        $response_body =  view('partials._contact_source_create_modal', []);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }
    public function store(Request $request)
    {
        $validation_rules = [
            'name' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return redirect()->back()->with(['error_message' => 'The name is required.']);
        }
        $contactSource = new ContactSource();
        $contactSource->name = $request->name;

        $contactSource->save();

        session(['success_message' => 'Contact Source created successfully']);

        return redirect()->back();
    }
    public function show(string $id)
    {
        abort(404);
    }
    public function edit(string $id)
    {
        $id = ContactSource::decrypted_id($id);
        $contactSource = ContactSource::find($id);

        $response_body =  view('partials._contact_source_edit_modal', [
            'contactSource' => $contactSource,
        ]);

        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function update(Request $request, string $id)
    {
        $validation_rules = [
            'name' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return redirect()->back()->with(['error_message' => 'The name is required.']);
        }
        $id = ContactSource::decrypted_id($id);
        $contactSource = ContactSource::find($id);

        $contactSource->name = $request->name;

        $contactSource->save();

        session(['success_message' => 'Contact source updated successfully']);

        return redirect()->back();
    }


    public function destroy(string $id)
    {
        try {
            $id = ContactSource::decrypted_id($id);
            ContactSource::find($id)->delete();
            session(['success_message' => 'Contact source deleted successfully']);
            return response()->json(array('response_type' => 1));
        } catch (\Exception $e) {
            return redirect()->back()->with(['error_message' => $e]);
        }
    }
}
