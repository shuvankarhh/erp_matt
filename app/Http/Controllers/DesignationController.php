<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Designation;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::all();
        return view('designation.designation_index', [
            'designations' => $designations
        ]);
    }

    public function create()
    {
        $response_body =  view('partials._designation_create_modal', []);
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
        $designation = new Designation;
        $designation->name = $request->name;

        $designation->save();

        session(['success_message' => 'Designation has been created successfully']);

        return redirect()->back();
    }


    public function edit($id)
    {
        $id = Designation::decrypted_id($id);
        $designation = Designation::find($id);
        $response_body =  view('partials._designation_edit_modal', [
            'designation' => $designation,
        ]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function destroy(string $id)
    {
        $id = Designation::decrypted_id($id);
        Designation::find($id)->delete();
        return response()->json(array('response_type' => 1));
    }


    public function update(Request $request, $id)
    {
        $validation_rules = [
            'name' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return redirect()->back()->with(['error_message' => 'The name is required.']);
        }
        $id = Designation::decrypted_id($id);
        $designation = Designation::find($id);

        $designation->name = $request->name;

        $designation->save();

        session(['success_message' => 'Designation name has been updated successfully']);

        return redirect()->back();
    }
}
