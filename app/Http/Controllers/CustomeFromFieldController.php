<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Services\StorageHandlers\DynamicStorageHandler;
use App\Models\CustomeFromField;

class CustomeFromFieldController extends Controller
{
    public function store(Request $request)
    {

        // $validation_rules = [
        //     'name' => 'required|unique:crm_project_sub_modules,name',
        // ];

        // Validation::validate($request, $validation_rules, [], []);

        // if (ErrorMessage::has_error()) {
        //     return response()->json(['error' => 'Data not saved successfully'], 400);
        // }
    
        // // $CustomeSubModule = new CustomeSubModule;
        // // $CustomeSubModule->name =   $request->name;
        // // $CustomeSubModule->tenant_id = 1;
        // // $CustomeSubModule->user_id =   1;
        // // $CustomeSubModule->status =   1;
        // // $CustomeSubModule->save();

        // return response()->json(['message' => 'Data saved successfully'], 200);

        return redirect()->back();

    }   
}
