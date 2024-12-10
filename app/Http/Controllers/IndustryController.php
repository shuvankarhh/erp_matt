<?php

namespace App\Http\Controllers;

use App\Models\Industry;
use Illuminate\Http\Request;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = Industry::all();
        return view('industries.index' , compact('industries'));
    }

    public function create()
    {
        $response_body = view('industries._create_modal');
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required'],
        ];

        Validation::validate($request, $rules, [], []);

        if (ErrorMessage::has_error()) {
            return redirect()->back()->with(['error_message' => 'Opps...']);
        }
        $industry = new Industry();
        $industry->name = $request->get('name');
        $industry->save();

        session(['success_message' => 'Industry has been created successfully']);

        return redirect()->back();
    }

    public function edit($id)
    {
        $decryptedIndustryId = Industry::decrypted_id($id);
        $industry = Industry::find($decryptedIndustryId);
        $response_body =  view('industries._edit_modal', [
            'industry' => $industry,
        ]);
        return response()->json(array('response_type' => 1, 'response_body' => mb_convert_encoding($response_body, 'UTF-8', 'ISO-8859-1')));
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => ['required'],
        ];

        Validation::validate($request, $rules, [], []);

        if (ErrorMessage::has_error()) {
            return redirect()->back()->with(['error_message' => 'Opps...']);
        }
        $decryptedIndustryId = Industry::decrypted_id($id);
        $industry = Industry::find($decryptedIndustryId);
        $industry->name = $request->get('name');
        $industry->save();

        session(['success_message' => 'Industry has been updated successfully']);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $decryptedIndustryId = Industry::decrypted_id($id);
        Industry::find($decryptedIndustryId)->delete();
        return response()->json(array('response_type' => 1));
    }
}
