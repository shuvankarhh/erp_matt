<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteSetting;


class HomeController extends Controller
{
    public function index()
    {
        $website_setting = WebsiteSetting::select('*')->find(1);
        return view('home',[
            'website_settings' => $website_setting
        ]);
    }
}
