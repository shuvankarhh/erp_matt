<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Models\CustomeForm;
use App\Models\User;

class CustomFormController extends Controller
{
    public function index()
    {
        $user = User::select('*')
        ->find(auth()->user()->id);
        $customeforms = CustomeForm::where('tenant_id',$user->tenant_id)->get();
        return view('form.custom_form_index',
        [
            'customeforms' => $customeforms,
        ]);
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
        $customeform = new CustomeForm();
        $user = User::select('*')
        ->find(auth()->user()->id);
        $customeform->form_name = $request->name;
        $customeform->tenant_id = $user->tenant_id;
        $customeform->form_body = " ";

        $customeform->save();
        
        return redirect()->back();
    }

    public function show(string $id)
    {
        $user = User::select('*')
                    ->find(auth()->user()->id);

        $customeform = CustomeForm::where('id',$id)->where('tenant_id',$user->tenant_id)->first();

        return view('form.custom_form_show',
        [
            'customeform' => $customeform,
        ]);
    }


    public function update(Request $request, $id)
    {
        // Validate and save the data
        $data = $request->validate([
            'drop_zone_content' => 'required|string',
        ]);
        $customForm = CustomeForm::findOrFail($id);  

        $customForm->form_body = $data['drop_zone_content'];
        $customForm->save();

        return response()->json(['message' => 'Content updated successfully!']);
    }


}
