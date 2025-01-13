<?php

namespace App\Http\Controllers;

use App\Models\ProjectType;
use App\Models\ReferrerInfo;
use Illuminate\Support\Facades\Auth;

class ProjectSettingController extends Controller
{
    public function index()
    {
        $tenant_id = Auth::user()->tenant_id ?? 1;

        $referrer_infos = ReferrerInfo::where('tenant_id', $tenant_id)->paginate(15);
        $project_types = ProjectType::where('tenant_id', $tenant_id)->paginate(15);

        return view('project_settings.index', compact('referrer_infos', 'project_types'));
    }
}
