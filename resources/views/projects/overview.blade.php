<div class="grid 2xl:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-6">
   

    <div class="2xl:col-span-4 sm:col-span-2">
        <div class="card">
            <div class="card-header">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Project Overview</h4>
            </div>
            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden p-2">
                            <h3 class="p-3 text-lg">Customer Information</h3>
                            <div class="flex flex-col md:flex-row lg:flex-row w-full gap-4 p-3">
                                <!-- Customer Name -->
                                <div class="flex flex-col w-full md:w-1/2 lg:w-1/2 ">
                                    
                                    <div class="flex flex-col md:flex-row md:justify-between">
                                        <label class="text-l p-2 md:w-1/2">Customer Name</label>
                                        <input type="text" class="rounded w-full md:w-1/2" value="{{$project->contact->name}}">
                                    </div>


                                </div>
                        
                                <!-- Phone Number -->
                                <div class="flex flex-col w-full md:w-1/2 lg:w-1/2 ">
                                    <div class="flex flex-col md:flex-row md:justify-between">
                                        <label class="text-l p-2 md:w-1/2">Phone Number</label>
                                        <input type="text" class="rounded w-full md:w-1/2" value="{{$project->contact->phone}}">
                                    </div>
                                </div>  
                            </div> 

                            <div class="flex flex-col md:flex-row lg:flex-row w-full gap-4 p-3">
                                <!-- Customer Email -->
                                <div class="flex flex-col w-full md:w-1/2 lg:w-1/2">
                                    <div class="flex flex-col md:flex-row md:justify-between">
                                        <label class="text-l p-2 md:w-1/2">Customer Email</label>
                                        <input type="text" class="rounded w-full md:w-1/2" value="{{$project->contact->email}}">
                                    </div>
                                </div>                                
                        
                                <!-- Status -->
                                <div class="flex flex-col w-full md:w-1/2 lg:w-1/2">
                                    <div class="flex flex-col md:flex-row md:justify-between">
                                        <label class="text-l p-2 md:w-1/2">Status</label>
                                        <select name="status" class="rounded w-full md:w-1/2">
                                            <option @selected($project->contact->acting_status == 0)>Archived</option>
                                            <option @selected($project->contact->acting_status == 1)>Active</option>
                                        </select>
                                    </div>
                                </div>
                            </div> 
                            
                            <hr class="p-2 mt-3">
                        
                            <h3 class="p-3 text-lg">Basic Information</h3>
                            <div class="flex flex-wrap gap-4 p-3">
                                <!-- Project Types -->
                                <div class="flex flex-col w-full md:w-1/2 lg:w-1/4">
                                    <label class="text-l p-2">Project Types</label>
                                    <select name="" id="" class="rounded w-full">
                                        <option value="">None</option>
                                        @foreach ($projectTypes as $projectType)
                                            <option value="{{$projectType->id}}" @selected($projectType->id == $project->project_type_id)>{{$projectType->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        
                                <!-- Service Type -->
                                <div class="flex flex-col w-full md:w-1/2 lg:w-1/4">
                                    <label class="text-l p-2">Service Type</label>
                                    <select name="" id="" class="rounded w-full">
                                        @if ($project->serviceType)
                                            <option value="{{$project->serviceType->id}}" selected>{{$project->serviceType->name}}</option>
                                        @else
                                            <option value="">None</option>
                                        @endif
                                    </select>
                                </div>  
                        
                                <!-- Property Type -->
                                <div class="flex flex-col w-full md:w-1/2 lg:w-1/4">
                                    <label class="text-l p-2">Property Type</label>
                                    <select class="rounded w-full" name="property_type">
                                        <option value="">None</option>
                                        <option value="1" @selected($project->property_type == 1)>Commercial</option>
                                        <option value="2" @selected($project->property_type == 2)>Residential</option>
                                    </select>
                                </div>
                            </div> 

                            <hr class="p-2 mt-3">

                            <h3 class="p-3 text-lg">Referral Information</h3>
                            <div class="flex flex-wrap gap-4 p-3">
                                <!-- Referral Source -->
                                <div class="flex flex-col w-full md:w-1/2 lg:w-1/4">
                                    <label class="text-l p-2">Referral Source</label>
                                    <select name="" id="" class="rounded w-full">
                                        <option value="">None</option>
                                        @foreach ($raferrerInfos as $raferrerInfo)
                                            <option value="{{$raferrerInfo->id}}" @selected($raferrerInfo->id == $project->referral_source_id)>{{$raferrerInfo->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        
                                <!-- Sales Person -->
                                <div class="flex flex-col w-full md:w-1/2 lg:w-1/4">
                                    <label class="text-l p-2">Sales Person</label>
                                    <select name="" id="" class="rounded w-full">
                                        <option value="">None</option>
                                        @foreach ($staffs as $staff)
                                            <option value="{{$staff->id}}" @selected($staff->id == $project->sales_person_id)>{{$staff->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                        
                                <!-- Associated Contact -->
                                <div class="flex flex-col w-full md:w-1/2 lg:w-1/4">
                                    <label class="text-l p-2">Associated Contact</label>
                                    <select name="assigned_staff" id="" class="rounded w-full">
                                        <option value="">None</option>
                                        <option value="all_staff" @selected($project->assigned_staff == 'all_staff')>All Staff</option>
                                        <option value="admin" @selected($project->assigned_staff == 'admin')>Admin</option>
                                        <option value="field_technicians" @selected($project->assigned_staff == 'field_technicians')>Field Technicians</option>
                                        @foreach ($staffs as $staff)
                                            <option value="{{ $staff->id }}" @selected($staff->id == $project->assigned_staff)>{{ $staff->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> 

                            <hr class="p-2 mt-3">
                            <div class="p-2">
                                
                                <div class="flex justify-between">

                                    <h3 class="p-3 text-lg m">Project Tasks</h3>

                                    <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105 flex items-center space-x-2"
                                    data-clipboard-action="add" onclick="openModal('{{ route('tasks.create') }}')">
                                    <i class="mgc_add_line text-lg mb-1"></i>
                                    <span>Add New</span>
                                </button>
                                
                                </div>

                                <div class="min-w-full inline-block align-middle mt-5">
                                    @if ($tasks->count())

                                    

                                    <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                            <thead class="bg-gray-50 dark:bg-gray-700">
                                                <tr>
                                                <tr>
                                                    <x-th>No</x-th>
                                                    <x-th>Name</x-th>
                                                    <x-th>Start Date</x-th>
                                                    <x-th>End Date</x-th>
                                                    <x-th align="text-end">Action</x-th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                @foreach ($tasks as $key => $task)
                                                    <tr>
                                                        <x-td>{{ $tasks->firstItem() + $key }}</x-td>
                                                        <x-td>{{ $task->name ?? null }}</x-td>
                                                        <x-td>{{ $task->start_date->format('d-m-Y') ?? null }}</x-td>
                                                        <x-td>{{ $task->end_date->format('d-m-Y') ?? null }}</x-td>
                                                        <x-action-td :editModal="[
                                                            'route' => route('tasks.edit', [
                                                                'task' => $task->encrypted_id(),
                                                            ]),
                                                        ]" :simpleDelete="[
                                                            'name' => $task->name,
                                                            'route' => route('tasks.destroy', [
                                                                'task' => $task->encrypted_id(),
                                                            ]),
                                                        ]" />
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <x-pagination :paginator="$tasks" />

                                    @else
                                        <div class=" flex justify-center items-center ">
                                            <img src="{{ asset('images/54557289.jpg') }}" alt="Description of the image" width="500" height="450">
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <hr class="p-2 mt-3">

                            <div class="p-2">
                                
                                <div class="flex justify-between">

                                    <h3 class="p-3 text-lg m">Site Contacts</h3>

                                    <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105 flex items-center space-x-2"
                                        data-clipboard-action="add" onclick="openModal('{{ route('site-contacts.create') }}')">
                                        <i class="mgc_add_line text-lg mb-1"></i>
                                        <span>Add New</span>
                                    </button>
                                
                                </div>

                                <div class="min-w-full inline-block align-middle mt-5">
                                    @if ($siteContacts->count())

                                    

                                    <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                            <thead class="bg-gray-50 dark:bg-gray-700">
                                                <tr>
                                                <tr>
                                                    <x-th>No</x-th>
                                                    <x-th>Name</x-th>
                                                    <x-th>Email</x-th>
                                                    <x-th>Role</x-th>
                                                    <x-th align="text-end">Action</x-th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                @foreach ($siteContacts as $key => $siteContact)
                                                    <tr>
                                                        <x-td>{{ $siteContacts->firstItem() + $key }}</x-td>
                                                        <x-td>{{ $siteContact->name ?? null }}</x-td>
                                                        <x-td>{{ $siteContact->email ?? null }}</x-td>
                                                        <x-td>{{ $siteContact->role ?? null }}</x-td>
                                                        <x-action-td :editModal="[
                                                            'route' => route('site-contacts.edit', [
                                                                'site_contact' => $siteContact->id,
                                                            ]),
                                                        ]" :simpleDelete="[
                                                            'name' => $task->name,
                                                            'route' => route('site-contacts.destroy', [
                                                                'site_contact' => $siteContact->id,
                                                            ]),
                                                        ]" />
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <x-pagination :paginator="$siteContacts" />

                                    @else
                                        <div class=" flex justify-center items-center ">
                                            <img src="{{ asset('images/54557289.jpg') }}" alt="Description of the image" width="500" height="450">
                                        </div>
                                    @endif
                                </div>
                                
                            </div>

                            <div class="h-10">

                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>