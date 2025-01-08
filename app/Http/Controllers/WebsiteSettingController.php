<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Vendor\Tauhid\ErrorMessage\ErrorMessage;
use App\Models\WebsiteSetting;

class WebsiteSettingController extends Controller
{
    public function edit()
    {
        $autoReportScedules = [
            1 => 'Weekly',
            2 => 'Monthly',
            3 => 'Quarterly',
            4 => 'Annual'
        ];

        if (auth()->user()->user_role->id == 1) {
            $website_setting = WebsiteSetting::select('*')->find(1);
            return view('website_settings.index', [
                'website_setting' => $website_setting,
                'autoReportScedules' => $autoReportScedules,
            ]);
        }

        return back();
    }

    public function update(Request $request)
    {
        $request->validate(
            [
                'company_name' => 'required',
                'company_email' => 'email',
                'company_logo' => 'nullable|image|max:5000',
                'favicon' => 'nullable|mimes:ico|max:1000',
                'seo_description' => 'required',
                // 'is_auto_report' => 'required',
                'auto_report_scedule' => 'required',
            ],
            [
                'company_email.email' => 'The company email must be a valid email address.',
                'favicon.mimes' => "The favicon must be in .ico format.",
            ],
            [
                'company_email' => 'company email'
            ]
        );

        $website_setting = WebsiteSetting::find(1);
        $website_setting->company_name = $request->get('company_name');
        if ($request->get('company_address') == null) {
            $website_setting->company_address = '';
        } else {
            $website_setting->company_address = $request->get('company_address');
        }

        if ($request->get('company_email') == null) {
            $website_setting->company_email = '';
        } else {
            $website_setting->company_email = $request->get('company_email');
        }

        if ($request->get('company_phone') == null) {
            $website_setting->company_phone = '';
        } else {
            $website_setting->company_phone = $request->get('company_phone');
        }

        if ($request->hasFile('company_logo')) {
            $website_setting->company_logo = $request->file('company_logo')->hashName(); // random full file name
            $request->file('company_logo')->storeAs('public/images', $website_setting->company_logo);
        }

        if ($request->hasFile('favicon')) {
            $favicon_extension = $request->file('favicon')->getClientOriginalExtension();
            if ($favicon_extension == 'ico') {
                $website_setting->favicon = $request->file('favicon')->hashName(); // random full file name
                $request->file('favicon')->storeAs('public/images', $website_setting->favicon);
            } else {
                ErrorMessage::general_push("Only 'ico' format is allowed for favicon.");
            }
        }

        $website_setting->seo_description = $request->get('seo_description');
        $website_setting->is_auto_report = 0;


        if ($request->get('is_auto_report') == '1') {
            $website_setting->is_auto_report = 1;
        }

        $website_setting->auto_report_scedule = $request->get('auto_report_scedule');
        if (ErrorMessage::has_error()) {
            return back()->with(['errors' => ErrorMessage::$errors, '_old_input' => $request->except(['company_logo', 'favicon'])]);
        }

        $website_setting->save();

        return back()->with(['success_message' => 'Website settings has been updated successfully!!!']);
    }
}
