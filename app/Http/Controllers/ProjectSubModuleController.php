<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Services\StorageHandlers\DynamicStorageHandler;
use App\Models\CustomeSubModule;
use App\Models\CustomeFromField;

class ProjectSubModuleController extends Controller
{
    public function index()
    {
        $user = User::select('*')
        ->find(auth()->user()->id);
        $customeSubModule_active = CustomeSubModule::where('tenant_id',$user->tenant_id)->where('status',1)->get();
        $customeSubModule_inactive = CustomeSubModule::where('tenant_id',$user->tenant_id)->where('status',0)->get();

        return view('pages.project_sub_modules_index',[
            'customeSubModule_active' => $customeSubModule_active,
            'customeSubModule_inactive' => $customeSubModule_inactive,
        ]);
    }


    public function create()
    {
        
        return view('pages.project_sub_modules_create');
    }


    public function store(Request $request)
    {

        $validation_rules = [
            'name' => 'required|unique:crm_project_sub_modules,name',
        ];

        Validation::validate($request, $validation_rules, [], []);

        if (ErrorMessage::has_error()) {
            return response()->json(['error' => 'Data not saved successfully'], 400);
        }
        
        if ($request->save == "true")
        {
            $CustomeSubModule = new CustomeSubModule;
            $CustomeSubModule->name =   $request->name;
            $CustomeSubModule->tenant_id = 1;
            $CustomeSubModule->user_id =   1;
            $CustomeSubModule->status =   1;
            $CustomeSubModule->save();

            return redirect()->back()->with(['success_message' => 'Contact has been updatedd successfully']);
        }
    


        return response()->json(['message' => 'Data saved successfully'], 200);

    }  
    
    
 

    public function show($id)
    {
        $user = User::select('*')
        ->find(auth()->user()->id);

        $customefromfields = CustomeFromField::with('FiledOptions')->where('tenant_id',$user->tenant_id)->get();
        // return $customefromfields;
        $customeSubModule = CustomeSubModule::where('tenant_id',$user->tenant_id)->where('id',$id)->first();

        return view('pages.project_sub_modules_show',[
            'customeSubModule' => $customeSubModule,
            'customefromfields' => $customefromfields
        ]);
    }    
    
}
