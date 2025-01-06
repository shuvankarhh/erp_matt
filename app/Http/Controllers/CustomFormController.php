<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Models\CustomeForm;
use App\Models\CustomFormData;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Services\Vendor\Tauhid\Encryption\Encryption;
use App\Services\randomNumberGenarator;
use Illuminate\Support\Facades\DB;

class CustomFormController extends Controller
{
    public function index()
    {
        $user = User::select('*')
        ->find(auth()->user()->id);

        $customeforms = CustomeForm::with('customFormData')->where('tenant_id', $user->tenant_id)->get();

        $customeforms = $customeforms->map(function ($form) {
            $uniqueNumbers = $form->customFormData->pluck('unique_number')->unique();
            
            // Return the count of unique values
            return [
                'id' => $form->id,
                'form_name' => $form->form_name,
                'url' => $form->url,
                'unique_numbers_count' => $uniqueNumbers->count(),
            ];
        });
        // return $customeforms;
        return view('form.custom_form_index',
        [
            'customeforms' => $customeforms,
        ]);
    }

    
    public function store(Request $request)
    {
        $rules = [
            'name' => [
                'required',
                Rule::unique('crm_custom_form', 'form_name'),
            ],
        ];

        Validation::validate($request, $rules, [], []);

        if (ErrorMessage::has_error()) {
     

            return redirect()->back()->with(['error_message' => 'Permission Denied']);
        }

        $customeform = new CustomeForm();
        $user = User::select('*')
        ->find(auth()->user()->id);
        $customeform->form_name = $request->name;
        $customeform->tenant_id = $user->tenant_id;
        $customeform->url = $request->url;
        $customeform->form_body = " ";

        $customeform->save();
        session()->flash('success_message', 'From has been added successfully!!!');
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
            'drop_zone_content' => 'nullable|string',
            'form_view' => 'nullable|string',
        ]);
        $customForm = CustomeForm::findOrFail($id);
    
        // Update fields

        $customForm->form_body = $data['drop_zone_content'];
        $customForm->form_view = $data['form_view'];
        $customForm->background_color = $request->background_color;
        $customForm->font_style = $request->font_style;
        $customForm->font_size = $request->font_size;
        $customForm->from_body_color = $request->from_body_color;
        $customForm->save();
    
        return response()->json(['message' => 'Content updated successfully!']);
    }


    public function updateFromSettings(Request $request, $id)
    {
        // Validate and save the data
        // $data = $request->validate([
        //     'drop_zone_content' => 'nullable|string',
        //     'form_view' => 'nullable|string',
        // ]);
        $customForm = CustomeForm::findOrFail($id);
    
        // Update fields
        
        // $customForm->form_body = $data['drop_zone_content'];
        // $customForm->form_view = $data['form_view'];
        $customForm->background_color = $request->background_color;
        $customForm->font_style = $request->font_style;
        $customForm->font_size = $request->font_size;
        $customForm->from_body_color = $request->from_body_color;
        $customForm->column_number = $request->column_number;
        $customForm->save();
    
        return redirect()->back()->with(['success_message' => 'Settings updated successfully!']);
    }


    public function custom_show(string $id)
    {
        $id = CustomeForm::decrypted_id($id);
        $customeform = CustomeForm::find($id);
        return view('form.froms',
        [
        'customeform' => $customeform,
        ]);
    }


    public function form_store(Request $request, $id)
    {
        $id = CustomeForm::decrypted_id($id);
        $generator = new randomNumberGenarator();
        do {
            $randomString = $generator->generateRandom16CharacterString();
        } while (DB::table('crm_custom_form_data')->where('unique_number', $randomString)->exists());
        $formFields = $request->input('form_fields');

        foreach ($formFields as $field) {
            CustomFormData::create([
                'form_id' => $id,
                'question' => $field['question'] ?? '',
                'question_name' => $field['questionName'],
                'answer' => $field['answer'] ?? '',
                'unique_number' => $randomString,
            ]);
        }


        return response()->json(['message' => 'Form submitted successfully!'], 200);
    }


}
