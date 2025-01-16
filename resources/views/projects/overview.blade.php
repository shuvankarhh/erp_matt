<div class="grid 2xl:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-6">
    {{-- <div class="2xl:col-span-4 sm:col-span-2">
        <div class="flex items-center justify-between gap-4">
            <div class="lg:hidden block">
                <button data-fc-target="default-offcanvas" data-fc-type="offcanvas" class="inline-flex items-center justify-center text-gray-700 border border-gray-300 rounded shadow hover:bg-slate-100 dark:text-gray-400 hover:dark:bg-gray-800 dark:border-gray-700 transition h-9 w-9 duration-100">
                    <div class="mgc_menu_line text-lg"></div>
                </button>
            </div>
            <h4 class="text-xl"></h4>

            {{-- <form class="ms-auto">
                <div class="flex items-center">
                    <input type="text" class="form-input  rounded-full" placeholder="Search files...">
                    <span class="mgc_search_line text-xl -ms-8"></span>
                </div>
            </form> --}}
        {{-- </div>
    </div> --}} 

    <div class="2xl:col-span-4 sm:col-span-2">
        <div class="card">
            <div class="card-header">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Project Overview</h4>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden p-2">

                            <h3 class="p-3 text-lg"> Customer Information</h3>
                            {{-- <hr class="p-2"> --}}

                            <div class="flex flex-row gap-2 p-3">
                                <div class="flex flex-col w-1/4">
                                    <div class="flex justify-between">
                                        <label class="text-l p-2 w-1/2">Customer Name</label>
                                        
                                        <input type="text" class="rounded w-1/2" value="{{$project->contact->name}}">
                                    </div>
                                </div>
                                <div class="flex flex-col w-1/4">
                                    <div class="flex justify-between">
                                        <label class="text-l p-2 w-1/2">Phone Number</label>
                                        <input type="text" class="rounded w-1/2"  value="{{$project->contact->phone}}">
                                    </div>
                                </div>  

                                <div class="flex flex-col w-1/4">
                                    <div class="flex justify-between">
                                        <label class="text-l p-2 w-1/2">Customer email</label>
                                        <input type="text" class="rounded w-1/2"  value="{{$project->contact->email}}">
                                    </div>
                                </div>                                
                                <div class="flex flex-col w-1/4">
                                    <div class="flex justify-between">
                                        <label class="text-l p-2 w-1/2">Status</label>
                                        <select name="status" class="rounded w-1/2" id="">
                                            <option @selected($project->contact->acting_status == 0)>Archived</option>
                                            <option @selected($project->contact->acting_status == 1)>Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                            
                            <h3 class="p-3 text-lg"> Basic Information</h3>

                            <div class="flex flex-row gap-2 p-3">
                                <div class="flex flex-col w-1/4">
                                    <div class="flex justify-between">
                                        <label class="text-l p-2 w-1/2">Project Types</label>
                                        <select name="" id="" class="rounded">
                                            
                                            <option value="">None</option>
                                            @foreach ($projectTypes as $projectType)
                                                @if ($projectType->id == $project->project_type_id )
                                                    <option value="{{$projectType->id}}" selected>{{$projectType->name}}</option>
                                                @else
                                                    <option value="{{$projectType->id}}">{{$projectType->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex-col w-1/4">
                                    <div class="flex justify-between">
                                        <label class="text-l p-2 w-1/2">Service Type</label>
                                        <select name="" id="" class="rounded">
                                                @if ($project->serviceType )
                                                    <option value="{{$project->serviceType->id}}" selected>{{$project->serviceType->name}}</option>
                                                @else
                                                    <option value="">None</option>
                                                @endif
                                        </select>
                                    </div>
                                </div>  

                                <div class="flex flex-col w-1/4">
                                    <div class="flex justify-between">
                                        <label class="text-l p-2 w-1/2">Customer email</label>
                                        <select class="rounded" name="property_type" id="">
                                            <option value="">None</option>
                                            <option value="1" {{ $project->property_type == 1 ? "selected" : '' }}>Commercial</option>
                                            <option value="2"  {{ $project->property_type == 2 ? "selected" : '' }}>Residential</option>
                                        </select>
                                    </div>
                                </div>                                
                                {{-- <div class="flex flex-col w-1/4">
                                    <div class="flex justify-between">
                                        <label class="text-l p-2 w-1/2">Status</label>
                                        <select name="status" class="rounded w-1/2" id="">
                                            <option @selected($project->contact->acting_status == 0)>Archived</option>
                                            <option @selected($project->contact->acting_status == 1)>Active</option>
                                        </select>
                                    </div>
                                </div> --}}
                            </div> 

                            <h3 class="p-3 text-lg"> Referral Information</h3>

                            <div class="flex flex-row gap-2 p-3">
                                <div class="flex flex-col w-1/4">
                                    <div class="flex justify-between">
                                        <label class="text-l p-2 w-1/2">Referral Source</label>
                                        <select name="" id="" class="rounded">
                                            
                                            <option value="">None</option>
                                            @foreach ($raferrerInfos as $raferrerInfo)
                                                @if ($raferrerInfo->id == $project->referral_source_id )
                                                    <option value="{{$raferrerInfo->id}}" selected>{{$raferrerInfo->name}}</option>
                                                @else
                                                    <option value="{{$raferrerInfo->id}}">{{$raferrerInfo->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex-col w-1/4">
                                    <div class="flex justify-between">
                                        <label class="text-l p-2 w-1/2">Sales Person</label>
                                        <select name="" id="" class="rounded">
                                            
                                            <option value="">None</option>
                                            @foreach ($staffs as $staff)
                                                @if ($staff->id == $project->sales_person_id )
                                                    <option value="{{$staff->id}}" selected>{{$staff->name}}</option>
                                                @else
                                                    <option value="{{$staff->id}}">{{$staff->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="flex flex-col w-1/4">
                                    <div class="flex justify-between">
                                        <label class="text-l p-2 w-1/2">Associated Contact</label>
                                        <select name="" id="" class="rounded">
                                            
                                            <option value="">None</option>
                                            @foreach ($staffs as $staff)
                                                @if ($staff->id == $project->assigned_staff )
                                                    <option value="{{$staff->id}}" selected>{{$staff->name}}</option>
                                                @else
                                                    <option value="{{$staff->id}}">{{$staff->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                            </div> 
                            

                            <h3 class="p-3 text-lg"> Project Tasks</h3>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>