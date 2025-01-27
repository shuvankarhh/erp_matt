@extends('layouts.vertical', ['title' => 'Project', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-white border-b px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Make Safe Form</h2>
            <div class="flex items-center">
                <a href="{{ route('projects.show', ['project' => $project->id]) }}"
                    class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">Close</a>

                <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onclick="storeOrUpdate('add_make_safe_form', event)">
                    Save
                </button>
            </div>
        </div>
        <div class="p-6">
            <form id="add_make_safe_form" action="{{ route('make-safes.update', $project->id) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <input type="hidden" name="project_id" value="{{ $project->id }}">

                <!-- Form Type -->
                <x-select label="Form Type" name="form_id" :options="$form_types" placeholder="Select Form Type"
                    selected="{{ old('form_id') ?? ($makeSafe->form_id ?? null) }}" required />

                <!-- Internal Form Fields -->
                <div id="internalForm" class="form-section hidden mt-4">
                    <h3 class="text-lg font-semibold mb-4">Internal Form Fields</h3>

                    <div>
                        <h2 class="text-gray-800 text-md font-semibold mb-2">Checklist<span class="text-red-600">*</span>
                        </h2>
                        {{-- <small id="checklist-error"></small> --}}
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="mb-2">
                                <label class="text-gray-900 text-md font-semibold inline-block mb-1">Structural
                                    Stabilization
                                    Actions Checklist</label>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task1" name="checklist[stabilization_inspect_damage]"
                                        value="1"
                                        {{ isset($checklist['stabilization_inspect_damage']) && $checklist['stabilization_inspect_damage'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task1">Inspect Structural
                                        Damage</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task2"
                                        name="checklist[stabilization_identify_hazardous_zones]" value="1"
                                        {{ isset($checklist['stabilization_identify_hazardous_zones']) && $checklist['stabilization_identify_hazardous_zones'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task2">Identify Hazardous
                                        Zones</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task3" name="checklist[stabilization_reinforce_components]"
                                        value="1"
                                        {{ isset($checklist['stabilization_reinforce_components']) && $checklist['stabilization_reinforce_components'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task3">Reinforce Structural
                                        Components</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task4" name="checklist[stabilization_adjacent_structures]"
                                        value="1"
                                        {{ isset($checklist['stabilization_adjacent_structures']) && $checklist['stabilization_adjacent_structures'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task4">Ensure Safety of
                                        Adjacent Structures</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task5" name="checklist[stabilization_load_bearing_points]"
                                        value="1"
                                        {{ isset($checklist['stabilization_load_bearing_points']) && $checklist['stabilization_load_bearing_points'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task5">Inspect Load-Bearing
                                        Points</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task6" name="checklist[stabilization_clear_obstructions]"
                                        value="1"
                                        {{ isset($checklist['stabilization_clear_obstructions']) && $checklist['stabilization_clear_obstructions'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task6">Clear Obstructions
                                        from Stabilization Areas</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task7" name="checklist[stabilization_document_measures]"
                                        value="1"
                                        {{ isset($checklist['stabilization_document_measures']) && $checklist['stabilization_document_measures'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task7">Document
                                        Stabilization Measures</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task8" name="checklist[stabilization_signoff_engineer]"
                                        value="1"
                                        {{ isset($checklist['stabilization_signoff_engineer']) && $checklist['stabilization_signoff_engineer'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task8">Sign-Off by Site
                                        Engineer</label>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label class="text-gray-800 text-sm font-medium inline-block mb-1">Electrical Isolation
                                    Measures Checklist</label>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task1" name="checklist[electrical_identify_hazards]"
                                        value="1"
                                        {{ isset($checklist['electrical_identify_hazards']) && $checklist['electrical_identify_hazards'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task1">Identify Electrical
                                        Hazards</label>
                                </div>
                                <div class="mb-1">

                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task2" name="checklist[electrical_deenergize_systems]"
                                        value="1"
                                        {{ isset($checklist['electrical_deenergize_systems']) && $checklist['electrical_deenergize_systems'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task2">De-energize
                                        Electrical Systems</label>
                                </div>
                                <div class="mb-1">

                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task3" name="checklist[electrical_lockout_tagout]"
                                        value="1"
                                        {{ isset($checklist['electrical_lockout_tagout']) && $checklist['electrical_lockout_tagout'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task3">Apply
                                        Lockout/Tagout Procedures</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task4" name="checklist[electrical_test_power]"
                                        value="1"
                                        {{ isset($checklist['electrical_test_power']) && $checklist['electrical_test_power'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task4">Test for
                                        Power</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task5" name="checklist[electrical_grounding_bonding]"
                                        value="1"
                                        {{ isset($checklist['electrical_grounding_bonding']) && $checklist['electrical_grounding_bonding'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task5">Inspect Grounding
                                        and Bonding</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task6" name="checklist[electrical_temporary_power]"
                                        value="1"
                                        {{ isset($checklist['electrical_temporary_power']) && $checklist['electrical_temporary_power'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task6">Check Temporary
                                        Power Solutions</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task7" name="checklist[electrical_inspect_panels]"
                                        value="1"
                                        {{ isset($checklist['electrical_inspect_panels']) && $checklist['electrical_inspect_panels'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task7">Inspect Electrical
                                        Panels and Equipment</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task8" name="checklist[electrical_document_measures]"
                                        value="1"
                                        {{ isset($checklist['electrical_document_measures']) && $checklist['electrical_document_measures'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task8">Document Isolation
                                        Measures</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task9" name="checklist[electrical_signoff]"
                                        value="1"
                                        {{ isset($checklist['electrical_signoff']) && $checklist['electrical_signoff'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task9">Sign-Off by
                                        Qualified Personnel</label>
                                </div>
                            </div>

                            <div class="mb-2">
                                <label class="text-gray-800 text-sm font-medium inline-block mb-1">Debris Removal Details
                                    Checklist</label>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task1" name="checklist[debris_identify]" value="1"
                                        {{ isset($checklist['debris_identify']) && $checklist['debris_identify'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task1">Identify Debris to
                                        be Removed</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task2" name="checklist[debris_segregate]" value="1"
                                        {{ isset($checklist['debris_segregate']) && $checklist['debris_segregate'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task2">Segregate Debris by
                                        Type</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task3" name="checklist[debris_safety_gear]"
                                        value="1"
                                        {{ isset($checklist['debris_safety_gear']) && $checklist['debris_safety_gear'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task3">Use Safety Gear and
                                        Equipment</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task4" name="checklist[debris_hazardous_zones]"
                                        value="1"
                                        {{ isset($checklist['debris_hazardous_zones']) && $checklist['debris_hazardous_zones'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task4">Clear Debris from
                                        Hazardous Zones</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task5" name="checklist[debris_proper_disposal]"
                                        value="1"
                                        {{ isset($checklist['debris_proper_disposal']) && $checklist['debris_proper_disposal'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task5">Dispose of Debris
                                        Properly</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task6" name="checklist[debris_inspect_residual]"
                                        value="1"
                                        {{ isset($checklist['debris_inspect_residual']) && $checklist['debris_inspect_residual'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task6">Inspect for
                                        Residual Debris</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task7" name="checklist[debris_document_removal]"
                                        value="1"
                                        {{ isset($checklist['debris_document_removal']) && $checklist['debris_document_removal'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task7">Document Removal
                                        Process</label>
                                </div>
                                <div class="mb-1">
                                    <input
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                        type="checkbox" id="task8" name="checklist[debris_signoff_supervisor]"
                                        value="1"
                                        {{ isset($checklist['debris_signoff_supervisor']) && $checklist['debris_signoff_supervisor'] == 1 ? 'checked' : '' }}>
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task8">Sign-Off by
                                        Supervisor</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <x-textarea class="mb-2" label="Additional Comments" name="additional_comments" rows="2"
                        value="{{ old('additional_comments', $makeSafe->additional_comments ?? '') }}" />

                    <x-input type="file" label="Media Uploads" name="media_uploads[]" class="mb-2"
                        value="{{ old('media_uploads') }}" multiple />

                    <x-input type="date" label="Completion Date" name="completion_date" class="mb-2"
                        value="{{ old('completion_date') ?? ($makeSafe?->completion_date?->format('Y-m-d') ?? null) }}"
                        required />


                    <div>
                        <x-input type="file" label="Technician Signature" name="technician_signature"
                            value="{{ old('technician_signature') }}" accept=".png, .jpg, .jpeg" required />
                    </div>
                </div>

                <!-- External Form Fields -->
                <div id="externalForm" class="form-section hidden mt-4">
                    <h3 class="text-lg font-semibold mb-4">External Form Fields</h3>

                    <div class="flex items-center space-x-2 mb-4">
                        <label for="task_verified" class="text-sm font-medium text-gray-900 cursor-pointer">
                            Task Verified
                        </label>
                        <input type="checkbox" id="task_verified" name="task_verified" value="1"
                            {{ isset($externalMakeSafe->task_verified) && $externalMakeSafe->task_verified == 1 ? 'checked' : '' }}
                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2">
                    </div>

                    <x-input type="file" label="Subcontractor
                            Signature"
                        name="subcontractor_signature" class="mb-4" value="{{ old('subcontractor_signature') }}"
                        accept=".png, .jpg, .jpeg" required />

                    <x-input type="datetime-local" label="Timestamp" name="timestamp"
                        value="{{ old('timestamp', $externalMakeSafe?->timestamp ? $externalMakeSafe->timestamp->format('Y-m-d\TH:i') : null) }}"
                        required />
                </div>

                <button type="submit"
                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onclick="storeOrUpdate('add_make_safe_form', event)">
                    Save
                </button>
            </form>
        </div>
    @endsection

    @section('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const formTypeSelect = document.getElementById('form_id');
                const internalForm = document.getElementById('internalForm');
                const externalForm = document.getElementById('externalForm');

                function showForm() {
                    const selectedValue = formTypeSelect.value;
                    if (selectedValue === "1") {
                        internalForm.classList.remove('hidden');
                        externalForm.classList.add('hidden');
                    } else if (selectedValue === "2") {
                        externalForm.classList.remove('hidden');
                        internalForm.classList.add('hidden');
                    } else {
                        internalForm.classList.add('hidden');
                        externalForm.classList.add('hidden');
                    }
                }

                showForm();

                formTypeSelect.addEventListener('change', showForm);
            });
        </script>
    @endsection
