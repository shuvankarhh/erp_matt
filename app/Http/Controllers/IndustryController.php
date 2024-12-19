<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::all();
        return view('industries.index', compact('industries'));
    }

    public function create()
    {
        $html = view('industries.create')->render();

        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $industry = new Industry();
        $industry->tenant_id = $tenant_id;
        $industry->name = $request->input('name');
        $industry->save();

        session(['success_message' => 'Industry has been added successfully!!!']);

        return redirect()->back();
    }

    public function edit($id)
    {
        $decryptedIndustryId = Industry::decrypted_id($id);
        $industry = Industry::find($decryptedIndustryId);

        $html = view('industries.edit', [
            'industry' => $industry,
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $decryptedIndustryId = Industry::decrypted_id($id);
        $industry = Industry::find($decryptedIndustryId);
        $industry->name = $request->get('name');
        $industry->save();

        session(['success_message' => 'Industry has been updated successfully!!!']);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $decryptedIndustryId = Industry::decrypted_id($id);
        Industry::find($decryptedIndustryId)->delete();

        session(['success_message' => 'Industry has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }
}
