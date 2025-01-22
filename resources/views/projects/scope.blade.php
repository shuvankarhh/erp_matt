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
                                    <h2 class="text-2xl p-2 " > Scope Summary</h2>
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

                                    <h2 class="text-2xl p-2 " >Task Breakdown:</h2>
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


<script>

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