
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- jQuery (required for Select2) -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="grid 2xl:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-6">
    <div class="2xl:col-span-4 sm:col-span-2">
        <div class="card">
            <div class="card-header">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-300">
                    Scope
                </h4>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden">

                            <div class="flex flex-col md:flex-col lg:flex-row w-fullgap-2">

                                <div class=" w-1/2 md:w-full p-2">
                                    <button class="button1 bg-green-300  text-lg bg-green-500 w-full rounded font-semibold text-gray-800 dark:text-gray-300 p-3" onclick="changeMenuScope('scopeEditingPanel')">
                                        Scope Editing Panel
                                    </button>
                                </div>

                                <div class="w-1/2 md:w-full p-2">
                                    <button class="button2 bg-green-300 text-lg  w-full rounded font-semibold text-gray-800 dark:text-gray-300 p-3" onclick="changeMenuScope('liveDocumentPreview')">
                                        Live Document Preview
                                    </button>
                                </div>
                                
                                

                            </div>
                            <hr>
                            <div class=" scopeEditingPanel">
                                    <h2 class="text-xl p-2 " > Scope Summary</h2>
                                    <div class="p-6">
                                        @if ($tasks->count())
                                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                                            <div class="overflow-x-auto">
                                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                    <thead class="hidden md:table-header-group bg-gray-50 dark:bg-gray-700">
                                                        <tr>
                                                            <x-th>No</x-th>
                                                            <x-th>Name</x-th>
                                                            <x-th>Start Date</x-th>
                                                            <x-th>End Date</x-th>
                                                            <x-th>Material Name</x-th>
                                                            <x-th>Quantity Needed</x-th>
                                                            <x-th>Unit Price</x-th>
                                                            <x-th align="text-end">Action</x-th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    
                                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                        @foreach ($tasks as $key => $task)
                                                        <tr class="block md:table-row md:align-middle">
                                                            <!-- No -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">No: </span>
                                                                {{ $tasks->firstItem() + $key }}
                                                            </x-td>
                                            
                                                            <!-- Name -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">Name: </span>
                                                                {{ $task->name ?? null }}
                                                            </x-td>
                                            
                                                            <!-- Type -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">Start Date: </span>
                                                                {{ $task->start_date->format('d-m-Y')  ?? null }}
                                                            </x-td>
                                            
                                                            <!-- Subtype -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">End Date: </span>
                                                                {{ $task->end_date->format('d-m-Y') ?? null }}
                                                            </x-td>
                                                                            
                                                            <!-- Subtype -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">End Date: </span>
                                                                <input type="text" id="material-name" name="material-name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                            </x-td>                                        
                                                            <!-- Subtype -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">End Date: </span>
                                                                <input type="number" id="quantity" name="quantity" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                            </x-td>                                        
                                                            <!-- Subtype -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">End Date: </span>
                                                                <input type="number" id="unit-price" name="unit-price" step="0.01" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                                            </x-td>
                                    
                                            
                                                            <!-- Action -->
                                                            <x-action-td class="block md:table-cell" :editModal="[
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
                                            
                                        </div>
                                        <x-pagination :paginator="$siteContacts" />

                                        @else
                                            <div class=" flex justify-center items-center ">
                                                <img src="{{ asset('images/54557289.jpg') }}" alt="Description of the image" width="500" height="450">
                                            </div>
                                        @endif
     
                                    </div>

                                    <h2 class="text-xl p-2 " >Task Breakdown:</h2>
                                    <div class="p-6">
                                        @if ($tasks->count())
                                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                                            <div class="overflow-x-auto">
                                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                    <thead class="hidden md:table-header-group bg-gray-50 dark:bg-gray-700">
                                                        <tr>
                                                            <x-th>No</x-th>
                                                            <x-th>Name</x-th>
                                                            <x-th>Start Date</x-th>
                                                            <x-th>End Date</x-th>
                                                            <x-th>Assigned Staf</x-th>
                                                            <x-th>Is complete</x-th>
                                                            <x-th>Status</x-th>
                                                            <x-th align="text-end">Action</x-th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    
                                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                        @foreach ($tasks as $key => $task)
                                                        <tr class="block md:table-row md:align-middle">
                                                            <!-- No -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">No: </span>
                                                                {{ $tasks->firstItem() + $key }}
                                                            </x-td>
                                            
                                                            <!-- name -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">Name: </span>
                                                                {{ $task->name ?? null }}
                                                            </x-td>
                                            
                                                            <!-- start_date -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">Start Date: </span>
                                                                {{ $task->start_date->format('d-m-Y')  ?? null }}
                                                            </x-td>
                                            
                                                            <!-- end_date -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">End Date: </span>
                                                                {{ $task->end_date->format('d-m-Y') ?? null }}
                                                            </x-td>

                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">End Date: </span>
                                                                {{ $task->user->name ?? null }}
                                                            </x-td>

                                                            <x-td class="block md:table-cell">
                                                                <input type="checkbox" id="task-complete" id="task-complete-{{ $task->id }}"  @if($task->is_compleate) checked @endif   onclick="isCompleate({{ $task->id }})" > Complete
                                                            </x-td>

                                                            <!-- end_date -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">End Date: </span>
                                                                {{ $completion_statuses[$task->completion_status ?? null] }}
                                                            </x-td>

                                                            <!-- Action -->
                                                            <x-action-td class="block md:table-cell" :editModal="[
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
                                            
                                        </div>
                                        <x-pagination :paginator="$siteContacts" />

                                        @else
                                            <div class=" flex justify-center items-center ">
                                                <img src="{{ asset('images/54557289.jpg') }}" alt="Description of the image" width="500" height="450">
                                            </div>
                                        @endif
     
                                    </div>

                                    
                                    <div class="flex justify-between p-4">

                                        <h2 class="text-xl  " >Materials and Equipment</h2>
                                        <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105 flex items-center space-x-2"
                                            data-clipboard-action="add" onclick="openModal('{{ route('materials-equipment.create',['project' => $project->id]) }}')">
                                        <i class="mgc_add_line text-lg mb-1"></i>
                                            <span>Add New</span>
                                    </div>

                                    <div class="p-6">
                                        @if ($projectMaterials->count())
                                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                                            <div class="overflow-x-auto">
                                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                    <thead class="hidden md:table-header-group bg-gray-50 dark:bg-gray-700">
                                                        <tr>
                                                            <x-th>No</x-th>
                                                            <x-th>Material Name</x-th>
                                                            <x-th>Quantity</x-th>
                                                            <x-th>Unit Price</x-th>
                                                            <x-th>Total Cost</x-th>
                                                            <x-th align="text-end">Action</x-th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    
                                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                        @foreach ($projectMaterials as $key => $projectMaterial)
                                                        <tr class="block md:table-row md:align-middle">
                                                            <!-- No -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">No: </span>
                                                                {{ $projectMaterials->firstItem() + $key }}
                                                            </x-td>
                                            
                                                            <!-- name -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">Name: </span>
                                                                {{ $projectMaterial->name ?? null }}
                                                            </x-td>
                                            
                                                            <!-- start_date -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">Start Date: </span>
                                                                {{ $projectMaterial->quantity  ?? null }}
                                                            </x-td>
                                            
                                                            <!-- end_date -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">End Date: </span>
                                                                {{ $projectMaterial->pricelist->price ?? null }}
                                                            </x-td>

                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">End Date: </span>
                                                                {{ number_format($projectMaterial->pricelist->price * $projectMaterial->quantity, 2) ?? null }}
                                                            </x-td>

                                                            <!-- Action -->
                                                            <x-action-td class="block md:table-cell" :editModal="[
                                                                'route' => route('materials-equipment.edit', [
                                                                    'materials_equipment' => $projectMaterial->id,
                                                                    
                                                                ]),
                                                            ]" :simpleDelete="[
                                                                'name' => $projectMaterial->name,
                                                                'route' => route('materials-equipment.destroy', [
                                                                    'materials_equipment' => $projectMaterial->id,
                                                                    'project' => $project->id,
                                                                ]),
                                                            ]" />
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                        </div>
                                        <x-pagination :paginator="$projectMaterials" />

                                        @else
                                            <div class=" flex justify-center items-center ">
                                                <img src="{{ asset('images/54557289.jpg') }}" alt="Description of the image" width="500" height="450">
                                            </div>
                                        @endif
     
                                    </div>

                                    <div class="flex justify-between p-4">
                                        <h2 class="text-xl">Media and Documentation</h2>
                                        <button 
                                            class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105 flex items-center space-x-2"
                                            data-clipboard-action="add" 
                                            onclick="toggleUploadSection()"
                                        >
                                            <i class="mgc_add_line text-lg mb-1"></i>
                                            <span>Add New</span>
                                        </button>
                                    </div>
                                    
                                    <div class="document_upload hidden mt-4 p-4 border border-gray-300 rounded-lg m-6 pt-4">
                                        <form action="{{ route('media-and-documentation.store',['project' => $project->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                        <div class="mb-4">
                                        <label for="task_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 ">Select Task<span class="text-red-500">*</span></label>
                                        <select name="task_id[]" id="task_id" class="w-full select2" multiple>
                                            @foreach ($tasks as $task)
                                                <option value="{{ $task->id }}" 
                                                    {{ in_array($task->id, old('task_id', [])) ? 'selected' : '' }}>
                                                    {{ $task->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        </div>

                                        
                                        <label for="">Upload document <span class="text-red-500">*</span> </label>
                                        <div class="dropzone text-gray-700 dark:text-gray-300 h-52 mt-4">
                                            <div class="fallback">
                                                <input name="file" type="file" multiple="multiple" >
                                            </div>
                                            <div class="dz-message needsclick w-full h-full flex items-center justify-center">
                                                <i class="mgc_pic_2_line text-8xl"></i>
                                            </div>
                                        </div> 

                                        <div class="button flex justify-between mt-4 ">
                                            <button type="button" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105 flex items-center space-x-2" onclick="toggleUploadSection()">
                                                <i class="mgc_close_fill text-lg mb-1"></i>
                                                <span>close</span>
                                            </button>

                                            <button class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg shadow-lg transition-all duration-300 transform hover:scale-105 flex items-center space-x-2">
                                                <i class="mgc_add_line text-lg mb-1"></i>
                                                <span>Upload</span>
                                            </button>
                                        </div>
                                        </form>
                                    </div> 

                                    <div class="p-6">
                                        @if ($medias->count())
                                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                                            <div class="overflow-x-auto">
                                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                                    <thead class="hidden md:table-header-group bg-gray-50 dark:bg-gray-700">
                                                        <tr>
                                                            <x-th>No</x-th>
                                                            <x-th>Tasks </x-th>
                                                            <x-th>File</x-th>
                                                            <x-th align="text-end">Action</x-th>
                                                        </tr>
                                                    </thead>
                                                    
                                                    
                                                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                                        @foreach ($medias as $key => $media)
                                                        <tr class="block md:table-row md:align-middle">
                                                            <!-- No -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">No: </span>
                                                                {{ $medias->firstItem() + $key }}
                                                            </x-td>
                                            
                                                            <!-- name -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">Name: </span>
                                                                @php
                                                                    $mediaTaskIds = json_decode($media->task_id, true); // Decode task_id from JSON to array
                                                                @endphp
                                                                
                                                                @foreach ($tasks as $task)
                                                                    @if (is_array($mediaTaskIds) && in_array($task->id, $mediaTaskIds))
                                                                        {{ $task->name }}
                                                                    @endif
                                                                @endforeach
                                                            </x-td>
                                            
                                                            
                                                            <!-- end_date -->
                                                            <x-td class="block md:table-cell">
                                                                <span class="md:hidden font-bold">File Name </span>
                                                                <a href="{{ $media->file_url }}" 
                                                                   target="_blank" 
                                                                   class="text-blue-500 hover:underline" 
                                                                   download="{{ $media->original_file_name }}">
                                                                   {{ $media->original_file_name }}
                                                                </a>
                                                            </x-td>

                                    

                                                            <!-- Action -->
                                                            <x-action-td class="block md:table-cell" 
                                                            :simpleDelete="[
                                                                'name' => $media->original_file_name,
                                                                'route' => route('media-and-documentation.destroy', [
                                                                    'media_and_documentation' => $media->id
                                                                ]),
                                                            ]"  
                                                            />
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                        </div>
                                            @if ($medias->hasPages())
                                                <x-pagination :paginator="$medias" />
                                            @endif
                                        @else
                                            <div class=" flex justify-center items-center ">
                                                <img src="{{ asset('images/54557289.jpg') }}" alt="Description of the image" width="500" height="450">
                                            </div>
                                        @endif
     
                                    </div>

                                   
                                    
                            </div>

                            <div class="p-6 liveDocumentPreview hidden">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

<script>
    $(document).ready(function () {
        // Initialize Select2
        $('#task_id').select2({
            multiple: true, // Allow multiple selections
            placeholder: 'Select tasks...', // Placeholder text
            allowClear: true, // Allow clearing all selected options
            width: '100%' // Ensures it uses the full width
        });

        // Remove empty option when Select2 dropdown opens
        $('#task_id').on('select2:open', function () {
            $(this).find('option[value=""]').remove();
        });
    });
</script>
<script>
    function toggleUploadSection() {
        const uploadSection = document.querySelector('.document_upload');
        uploadSection.classList.toggle('hidden'); // Toggle visibility
    }
</script>

<script>

    function isCompleate(taskId) {

        fetch(`/tasks/${taskId}/complete`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            
        })
            .then(response => response.json())
            .then(data => {
                console.log('Task updated:', data);
            })
            .catch(error => {
                console.error('Error updating task:', error);
            });
    }




    function changeMenuScope(option) {
        if (option === 'liveDocumentPreview') {
            let livePreview = document.querySelector('.liveDocumentPreview');
            let editingPanel = document.querySelector('.scopeEditingPanel');
            let button1 = document.querySelector('.button1');
            let button2 = document.querySelector('.button2');

            // Only modify classes if necessary
            if (livePreview.classList.contains('hidden')) {
                livePreview.classList.remove('hidden');
            }
            if (button1.classList.contains('bg-green-500')) {
                button1.classList.remove('bg-green-500');
            }

            if (!editingPanel.classList.contains('hidden')) {
                editingPanel.classList.add('hidden');
            }
            if (!button2.classList.contains('bg-green-500')) {
                button2.classList.add('bg-green-500');
            }
        } else if (option === 'scopeEditingPanel') {
            let editingPanel = document.querySelector('.scopeEditingPanel');
            let livePreview = document.querySelector('.liveDocumentPreview');
            let button1 = document.querySelector('.button1');
            let button2 = document.querySelector('.button2');

            if (button2.classList.contains('bg-green-500')) {
                button2.classList.remove('bg-green-500');
            }
            // Only modify classes if necessary
            if (editingPanel.classList.contains('hidden')) {
                editingPanel.classList.remove('hidden');
            }

            if (!livePreview.classList.contains('hidden')) {
                livePreview.classList.add('hidden');
            }
            if (!button1.classList.contains('bg-green-500')) {
                button1.classList.add('bg-green-500');
            }
        }
    }


</script>




