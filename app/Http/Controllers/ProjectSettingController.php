<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Models\ContactSource;
use App\Models\ReferrerInfo;
use App\Models\StorageProvider;
use Illuminate\Support\Facades\Auth;

class ProjectSettingController extends Controller
{
    public function index()
    {
        $tenant_id = Auth::user()->tenant_id ?? 1;
        $referrer_infos = ReferrerInfo::where('tenant_id', $tenant_id)->paginate(15);
        $teams = Team::all();
        $designations = Designation::all();
        $contactSources = ContactSource::all();
        $storageProviders = StorageProvider::all();

        return view('project_settings.index', compact('referrer_infos', 'teams', 'designations', 'contactSources', 'storageProviders'));
    }
}
