<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Models\StorageProvider;

class StorageProvidersController extends Controller
{
    public function create()
    {
        $statuses = [
            1 => 'Active',
            2 => 'Archived'
        ];

        $html = view('storage_providers.create', compact('statuses'))->render();
        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'alias' => 'required',
            'logo_path' => 'required|image|mimes:jpeg,png,jpg,gif',
            'credentials' => 'required',
        ]);

        $storage_provider = new StorageProvider;
        $storage_provider->name = $request->name;
        $storage_provider->alias = $request->alias;
        $storage_provider->logo_path = $request->file('logo_path')->store('storage_providers_icon', 'public');
        $storage_provider->credentials = json_encode([]);
        $storage_provider->acting_status = $request->acting_status;
        $storage_provider->description = $request->description;
        $storage_provider->save();

        return redirect()->route('company-settings.index')->with(['success_message' => 'Storage provider has been created successfully']);
    }


    public function edit($id)
    {
        $id = StorageProvider::decrypted_id($id);
        $storageProvider = StorageProvider::find($id);
        $response_body =  view('partials._storage_providers_edit_modal', [
            'storageProvider' => $storageProvider,
        ]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }


    public function destroy(string $id)
    {
        $id = StorageProvider::decrypted_id($id);
        StorageProvider::find($id)->delete();
        return response()->json(array('response_type' => 1));
    }


    public function update(Request $request, $id)
    {
        $id = StorageProvider::decrypted_id($id);
        $storage_provider = StorageProvider::find($id);
        $validation_rules = [
            'name' => 'required',
            'alias' => 'required',
            'logo_path' => 'required|image|mimes:jpeg,png,jpg,gif',
            'credentials' => 'required',
            'acting_status' => 'required'
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return redirect()->back()->with(['error_message' => 'Permission denied.']);
        }

        $storage_provider->name = $request->name;
        $storage_provider->alias = $request->alias;

        if ($request->has('logo_path')) {
            $storage_provider->logo_path = $request->file('logo_path')->store('storage_providers_icon', 'public');
        } else {
            $storage_provider->logo_path = $storage_provider->logo_path;
        }

        $storage_provider->credentials = $request->credentials;
        $storage_provider->acting_status = $request->acting_status;
        $storage_provider->description = $request->description;
        $storage_provider->save();

        return redirect()->route('company-settings.index')->with(['success_message' => 'Storage provider has been updated successfully']);
    }
}
