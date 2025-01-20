<?php

namespace App\Http\Controllers;

use App\Models\LinkedServiceSubType;
use App\Models\LinkedServiceType;
use App\Models\Pricelist;
use App\Models\ProjectType;
use App\Models\ReferrerInfo;
use App\Models\ServiceType;
use Illuminate\Support\Facades\Auth;

class ProjectSettingController extends Controller
{
    public function index()
    {
        $tenant_id = Auth::user()->tenant_id ?? 1;

        $referrer_infos = ReferrerInfo::where('tenant_id', $tenant_id)->paginate(10);

        $project_types = ProjectType::where('tenant_id', $tenant_id)->paginate(10);

        $service_types = ServiceType::with('project_type')->where('tenant_id', $tenant_id)->paginate(10);

        $price_lists = Pricelist::where('tenant_id', $tenant_id)->paginate(10);

        $linked_service_types = LinkedServiceType::where('tenant_id', $tenant_id)->paginate(10);

        $linked_service_sub_types = LinkedServiceSubType::where('tenant_id', $tenant_id)->with('linked_service_type')->paginate(10);

        return view('project_settings.index', compact('referrer_infos', 'project_types', 'service_types', 'price_lists', 'linked_service_types', 'linked_service_sub_types'));
    }
}
