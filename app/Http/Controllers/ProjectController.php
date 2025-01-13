<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Contact;
use App\Models\Staff;
use App\Models\User;
use App\Models\Country;
use App\Models\Organization;
use App\Models\ProjectType;
use App\Models\ServiceType;
use App\Models\Pricelist;
use App\Models\RaferrerInfo;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('projects.project_index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::select('*')
        ->find(auth()->user()->id);
        $tenant_id =   $user->tenant_id;

        $contacts = Contact::where("tenant_id", $tenant_id)->where("stage", 4)->get();
        $staffs = Staff::where("tenant_id", $tenant_id)->get();
        $countries = Country::orderBy('name')->get();
        $organizations = Organization::where("tenant_id", $tenant_id)->orderBy('name')->get();
        $projectTypes = ProjectType::where("tenant_id", $tenant_id)->orderBy('name')->get();
        $priceLists = Pricelist::where("tenant_id", $tenant_id)->get();
        $raferrerInfos = RaferrerInfo::where("tenant_id", $tenant_id)->get();


        return view('projects.project_create',[
            'contacts' =>$contacts,
            'staffs' =>$staffs,
            'countries' =>$countries,
            'organizations' =>$organizations,
            'projectTypes' =>$projectTypes,
            'priceLists' =>$priceLists,
            'raferrerInfos' =>$raferrerInfos,
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
