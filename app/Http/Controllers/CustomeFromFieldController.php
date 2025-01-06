<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Services\StorageHandlers\DynamicStorageHandler;
use App\Models\CustomFromField;
use App\Models\CustomFromFieldOption;

class CustomeFromFieldController extends Controller
{
    public function store(Request $request)
    {
        $validation_rules = [
            'field_name' => 'required|unique:crm_custome_from_fields,field_name',
            'field_type' => 'required',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->all()]);
        }
        
        $user = User::select('*')
        ->find(auth()->user()->id);
        $Customefromfield = new Customfromfield;
        $Customefromfield->tenant_id =   $user->tenant_id;
        $Customefromfield->user_id =   $user->id;
        $Customefromfield->field_name =   $request->field_name;
        $Customefromfield->field_type =   $request->field_type;
        
        $Customefromfield->is_required = $request->is_required;
        $Customefromfield->default_value =   $request->default_value;
        $Customefromfield->is_global =   $request->is_global;
        $Customefromfield->save();

        if ($request->field_type == "select") {
            if ($request->has('dropdown_options') && is_array($request->dropdown_options)) {
                foreach ($request->dropdown_options as $key => $optionName) {
                    // Create a new instance of the model
                    $CustomeFromFieldOption = new CustomeFromFieldOption;
                    
                    $CustomeFromFieldOption->tenant_id = $user->tenant_id;
                    $CustomeFromFieldOption->from_field_id = $Customefromfield->id;
                    $CustomeFromFieldOption->option_name = $optionName;
                    
                    if ($request->has('dropdown_values') && is_array($request->dropdown_values)) {
                        $CustomeFromFieldOption->option_value = $request->dropdown_values[$key] ?? null;
                    }
                    
                    $CustomeFromFieldOption->save();
                }
            }
        }

        return redirect()->back()->with(['success_message' => 'Contact has been updatedd successfully']);

    }   

    public function destroy($id)
    {
        $Customefromfield = CustomeFromField::find($id);
        $Customefromfield->delete();
        return redirect()->back()->with(['success_message' => 'Contact has been updatedd successfully']);
    }

}
