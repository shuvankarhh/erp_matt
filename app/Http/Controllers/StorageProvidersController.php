<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StorageProvider;
use Illuminate\Support\Facades\Auth;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class StorageProvidersController extends Controller
{
    public function create()
    {
        $statuses = [
            1 => 'Active',
            2 => 'Inactive'
        ];

        $html = view('storage_providers.create', compact('statuses'))->render();
        return response()->json([
            'html' => $html,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'alias' => 'required',
            'credentials' => 'required',
            'logo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'acting_status' => 'required',
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        if ($request->hasFile('logo_path')) {
            $logo = $request->file('logo_path');
            $logo_path = $logo->store('storage_providers_icon', 'public');
        }

        $storage_provider = new StorageProvider;
        $storage_provider->tenant_id = $tenant_id;
        $storage_provider->name = $request->name;
        $storage_provider->alias = $request->alias;
        // $storage_provider->logo_path = $request->file('logo_path')->store('storage_providers_icon', 'public');
        $storage_provider->logo_path = $logo_path;
        // $storage_provider->credentials = json_encode([]);
        $storage_provider->credentials = $request->input('credentials');
        $storage_provider->acting_status = $request->acting_status;
        $storage_provider->description = $request->description;
        $storage_provider->save();

        return redirect()->route('company-settings.index')->with(['success_message' => 'Storage provider has been added successfully!!!']);
    }


    public function edit($id)
    {
        $statuses = [
            1 => 'Active',
            2 => 'Inactive'
        ];

        $id = StorageProvider::decrypted_id($id);
        $storageProvider = StorageProvider::find($id);

        $html = view('storage_providers.edit', [
            'storage_provider' => $storageProvider,
            'statuses' => $statuses,
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $id = StorageProvider::decrypted_id($id);
        $storage_provider = StorageProvider::find($id);
        $validation_rules = [
            'name' => 'required',
            'alias' => 'required',
            'logo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'credentials' => 'required',
            'acting_status' => 'required'
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return redirect()->back()->with(['error_message' => 'Validation Error.']);
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

    public function destroy(string $id)
    {
        $id = StorageProvider::decrypted_id($id);
        StorageProvider::find($id)->delete();

        session(['success_message' => 'Storage provider has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }
}
