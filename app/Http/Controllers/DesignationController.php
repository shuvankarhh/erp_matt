<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::all();
        return view('designations.index', [
            'designations' => $designations
        ]);
    }

    public function create()
    {

        $html = view('designations.create')->render();
        return response()->json(['html' => $html]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $tenant_id = Auth::user()->tenant_id ?? 1;

        $designation = new Designation;
        $designation->tenant_id = $tenant_id;
        $designation->name = $request->name;
        $designation->save();

        session(['success_message' => 'Designation has been added successfully!!!']);

        return redirect()->back();
    }

    public function edit($id)
    {
        $id = Designation::decrypted_id($id);
        $designation = Designation::find($id);

        $html = view('designations.edit', [
            'designation' => $designation,
        ])->render();

        return response()->json(['html' => $html]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $id = Designation::decrypted_id($id);
        $designation = Designation::find($id);

        $designation->name = $request->name;

        $designation->save();

        session(['success_message' => 'Designation has been updated successfully!!!']);

        return redirect()->back();
    }

    public function destroy(string $id)
    {
        $id = Designation::decrypted_id($id);
        Designation::find($id)->delete();

        session(['success_message' => 'Designation has been deleted successfully!!!']);

        return response()->json(array('response_type' => 1));
    }
}
