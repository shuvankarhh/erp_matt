<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Vendor\Tauhid\Validation\Validation;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Models\WebsiteSetting;

class WebsiteSettingController extends Controller
{
    public function edit()
    {
        if(auth()->user()->user_role->id == 1)
        {
            $website_setting = WebsiteSetting::select('*')->find(1);
            return view('website_settings_edit', [
                'website_setting' => $website_setting,
            ]);
        }
        return back();
        
    }

    public function update(Request $request)
    {
        $validation_rules = [
            'company_name' => 'required',
            'company_email' => 'email',
            'company_logo' => 'nullable|image|max:5000', // 5MB
            'favicon' => 'nullable|max:1000', // 1MB
            'seo_description' => 'required',
            // 'is_auto_report' => 'required',
            'auto_report_scedule' => 'required',
        ];

        $validation_names = [
            'company_name' => 'company name',
            'company_address' => 'company address',
            'company_email' => 'company email',
            'company_phone' => 'company phone',
            'company_logo' => 'company logo',
            'seo_description' => 'seo description',
            'is_auto_report' => 'auto report',
            'auto_report_scedule' => 'auto report scedule',
        ];

        Validation::validate($request, $validation_rules,[], $validation_names);
        if(ErrorMessage::has_error())
        {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->except(['company_logo', 'favicon'])]);
        }
        $website_setting = WebsiteSetting::find(1);
        $website_setting->company_name = $request->get('company_name');
        if($request->get('company_address') == null)
        {
            $website_setting->company_address = '';
        } else {
            $website_setting->company_address = $request->get('company_address');
        }
        if($request->get('company_email') == null)
        {
            $website_setting->company_email = '';
        } else {
            $website_setting->company_email = $request->get('company_email');
        }
        if($request->get('company_phone') == null)
        {
            $website_setting->company_phone = '';
        } else {
            $website_setting->company_phone = $request->get('company_phone');
        }
        // company_logo upload
        if($request->hasFile('company_logo'))
        {
            $website_setting->company_logo = $request->file('company_logo')->hashName(); // random full file name
            $request->file('company_logo')->storeAs('public/images', $website_setting->company_logo);
        }
        // company_logo upload end
        // favicon upload
        if($request->hasFile('favicon'))
        {
            $favicon_extension = $request->file('favicon')->getClientOriginalExtension();
            if($favicon_extension == 'ico')
            {
                $website_setting->favicon = $request->file('favicon')->hashName(); // random full file name
                $request->file('favicon')->storeAs('public/images', $website_setting->favicon);
            } else {
                ErrorMessage::general_push("Only 'ico' format is allowed for favicon.");
            }
        }
        // favicon upload end
        $website_setting->seo_description = $request->get('seo_description');
        $website_setting->is_auto_report = 0;
        if($request->get('is_auto_report') == 'on')
        {
            $website_setting->is_auto_report = 1;
        }
        $website_setting->auto_report_scedule = $request->get('auto_report_scedule');
        if(ErrorMessage::has_error())
        {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->except(['company_logo', 'favicon'])]);
        }
        $website_setting->save();
        return back()->with(['success_message' => 'Website Settings has been updated successfully']);
    }
}
