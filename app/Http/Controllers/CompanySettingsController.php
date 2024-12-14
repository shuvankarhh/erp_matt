<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Models\ContactSource;
use App\Models\CompanySettings;
use App\Models\StorageProvider;

class CompanySettingsController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        $designations = Designation::all();
        $contactSources = ContactSource::all();
        $storageProviders = StorageProvider::all();
        return view('company_settings.index', [
            'teams' => $teams,
            'designations' => $designations,
            'contactSources' => $contactSources,
            'storageProviders' => $storageProviders
        ]);
    }

}
