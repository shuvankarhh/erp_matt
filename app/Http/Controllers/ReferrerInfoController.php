<?php

namespace App\Http\Controllers;

use App\Models\ReferrerInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\ValidationException;

class ReferrerInfoController extends Controller
{
    public function index()
    {
        abort(404);
    }

    public function create()
    {
        $html = view('referrer_infos.create')->render();

        return response()->json([
            'html' => $html,
            'modal_width' => 'max-w-xl',
        ]);
    }

    public function store(Request $request)
    {
        try {
            $rules = [
                'organization_name' => ['nullable', 'string', 'max:255'],
                'contact_first_name' => ['required', 'string', 'max:255'],
                'contact_last_name' => ['nullable', 'string', 'max:255'],
                'phone_number' => ['nullable', 'string', 'regex:/^[0-9+\(\)#\.\s\/ext-]+$/', 'max:255'],
                // 'email' => ['required', 'email', 'unique:users,email'],
                'email' => ['required', 'email'],
                'organization' => ['nullable', 'string', 'max:255'],
                'parent_organization' => ['nullable', 'string', 'max:255'],
                'referral_source' => ['nullable', 'string', 'max:255'],
                'sales_source' => ['nullable', 'string', 'max:255'],
            ];

            $messages = [];

            $attributes = [];

            $request->validate($rules, $messages, $attributes);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $referrer_info = new ReferrerInfo();
        $referrer_info->tenant_id = $tenant_id;
        $referrer_info->organization_name = $request->input('organization_name');
        $referrer_info->contact_first_name = $request->input('contact_first_name');
        $referrer_info->contact_last_name = $request->input('contact_last_name');
        $referrer_info->phone_number = $request->input('phone_number');
        $referrer_info->email = $request->input('email');
        $referrer_info->organization = $request->input('organization');
        $referrer_info->parent_organization = $request->input('parent_organization');
        $referrer_info->referral_source = $request->input('referral_source');
        $referrer_info->sales_source = $request->input('sales_source');
        $referrer_info->save();


        return response()->json([
            'success' => true,
            'message' => 'Referrer info has been added successfully!!!',
            'redirect' => url()->previous()
        ]);
    }

    public function show(ReferrerInfo $raferrerInfo)
    {
        abort(404);
    }

    public function edit(string $id)
    {
        $id = Crypt::decrypt($id);
        $referrer_info = ReferrerInfo::findOrFail($id);

        $html = view('referrer_infos.edit', compact('referrer_info'))->render();

        return response()->json([
            'html' => $html,
            'modal_width' => 'max-w-xl',
        ]);
    }

    public function update(Request $request, string $id)
    {
        try {
            $rules = [
                'organization_name' => ['nullable', 'string', 'max:255'],
                'contact_first_name' => ['required', 'string', 'max:255'],
                'contact_last_name' => ['nullable', 'string', 'max:255'],
                'phone_number' => ['nullable', 'string', 'regex:/^[0-9+\(\)#\.\s\/ext-]+$/', 'max:255'],
                // 'email' => ['required', 'email', 'unique:users,email'],
                'email' => ['required', 'email'],
                'organization' => ['nullable', 'string', 'max:255'],
                'parent_organization' => ['nullable', 'string', 'max:255'],
                'referral_source' => ['nullable', 'string', 'max:255'],
                'sales_source' => ['nullable', 'string', 'max:255'],
            ];

            $messages = [];

            $attributes = [];

            $request->validate($rules, $messages, $attributes);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation Error',
                'errors' => $e->errors(),
            ], 422);
        }

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $id = Crypt::decrypt($id);
        $referrer_info = ReferrerInfo::findOrFail($id);
        $referrer_info->tenant_id = $tenant_id;
        $referrer_info->organization_name = $request->input('organization_name');
        $referrer_info->contact_first_name = $request->input('contact_first_name');
        $referrer_info->contact_last_name = $request->input('contact_last_name');
        $referrer_info->phone_number = $request->input('phone_number');
        $referrer_info->email = $request->input('email');
        $referrer_info->organization = $request->input('organization');
        $referrer_info->parent_organization = $request->input('parent_organization');
        $referrer_info->referral_source = $request->input('referral_source');
        $referrer_info->sales_source = $request->input('sales_source');
        $referrer_info->save();


        return response()->json([
            'success' => true,
            'message' => 'Referrer info has been updated successfully!!!',
            'redirect' => url()->previous()
        ]);
    }

    public function destroy(string $id)
    {
        $id = Crypt::decrypt($id);
        $referrer_info = ReferrerInfo::findOrFail($id);

        if ($referrer_info) {
            $referrer_info->delete();
        }

        session(['success_message' => 'Referrer info has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }
}
