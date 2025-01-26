@extends('layouts.vertical', ['title' => 'Project', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-white border-b px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Make Safe Forms</h2>
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
            <form id="add_make_safe_form" action="{{ route('make-safes.store') }}" method="POST"
                enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="project_id" value="{{ $project->id }}">

                <!-- Form Type -->
                <x-select label="Form Type" name="form_id" :options="$form_types" placeholder="Select Form Type"
                    selected="{{ old('form_id') }}" required />

                <!-- Internal Form Fields -->
                <div id="internalForm" class="form-section hidden mt-4">
                    {{-- <h2 class="font-semibold">Internal Form Fields</h2> --}}
                    <h3 class="text-lg font-semibold mb-4">Internal Form Fields</h3>

                    {{-- <x-textarea class="mb-2" label="Structural Stabilization
                            Actions"
                        name="structural_stabilization" rows="2" required /> --}}

                    <div>
                        <h2 class="text-gray-800 text-md font-semibold mb-2">Checklist<span class="text-red-600">*</span></h2>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="mb-2">
                                <label class="text-gray-900 text-md font-semibold inline-block mb-1">Structural Stabilization
                                    Actions Checklist</label>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task1" name="checklist[stabilization_inspect_damage]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task1">Inspect Structural Damage</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task2"
                                        name="checklist[stabilization_identify_hazardous_zones]" value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task2">Identify Hazardous Zones</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task3"
                                        name="checklist[stabilization_reinforce_components]" value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task3">Reinforce Structural Components</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task4"
                                        name="checklist[stabilization_adjacent_structures]" value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task4">Ensure Safety of Adjacent Structures</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task5"
                                        name="checklist[stabilization_load_bearing_points]" value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task5">Inspect Load-Bearing Points</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task6" name="checklist[stabilization_clear_obstructions]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task6">Clear Obstructions from Stabilization Areas</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task7" name="checklist[stabilization_document_measures]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task7">Document Stabilization Measures</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task8" name="checklist[stabilization_signoff_engineer]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task8">Sign-Off by Site Engineer</label>
                                </div>
                            </div>
                            {{--
                    <x-textarea class="mb-2" label="Electrical Isolation
                            Measures"
                        name="electrical_isolation" rows="2" required /> --}}

                            <div class="mb-2">
                                <label class="text-gray-800 text-sm font-medium inline-block mb-1">Electrical Isolation
                                    Measures Checklist</label>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task1" name="checklist[electrical_identify_hazards]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task1">Identify Electrical Hazards</label>
                                </div>
                                <div class="mb-1">

                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task2" name="checklist[electrical_deenergize_systems]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task2">De-energize Electrical Systems</label>
                                </div>
                                <div class="mb-1">

                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task3" name="checklist[electrical_lockout_tagout]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task3">Apply Lockout/Tagout Procedures</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task4" name="checklist[electrical_test_power]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task4">Test for Power</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task5" name="checklist[electrical_grounding_bonding]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task5">Inspect Grounding and Bonding</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task6" name="checklist[electrical_temporary_power]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task6">Check Temporary Power Solutions</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task7" name="checklist[electrical_inspect_panels]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task7">Inspect Electrical Panels and Equipment</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task8" name="checklist[electrical_document_measures]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task8">Document Isolation Measures</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task9" name="checklist[electrical_signoff]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task9">Sign-Off by Qualified Personnel</label>
                                </div>
                            </div>


                            {{-- <x-textarea class="mb-2" label="Debris Removal Details" name="debris_removal" rows="2"
                        required /> --}}

                            <div class="mb-2">
                                <label class="text-gray-800 text-sm font-medium inline-block mb-1">Debris Removal Details
                                    Checklist</label>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task1" name="checklist[debris_identify]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task1">Identify Debris to be Removed</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task2" name="checklist[debris_segregate]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task2">Segregate Debris by Type</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task3" name="checklist[debris_safety_gear]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task3">Use Safety Gear and Equipment</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task4" name="checklist[debris_hazardous_zones]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task4">Clear Debris from Hazardous Zones</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task5" name="checklist[debris_proper_disposal]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task5">Dispose of Debris Properly</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task6" name="checklist[debris_inspect_residual]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task6">Inspect for Residual Debris</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task7" name="checklist[debris_document_removal]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task7">Document Removal Process</label>
                                </div>
                                <div class="mb-1">
                                    <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task8" name="checklist[debris_signoff_supervisor]"
                                        value="1">
                                    <label class="text-sm text-gray-500 cursor-pointer" for="task8">Sign-Off by Supervisor</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <x-textarea class="mb-2" label="Additional Comments" name="additional_comments" rows="2" />

                    <x-input type="file" label="Media Uploads" name="media_uploads[]" class="mb-2"
                        value="{{ old('media_uploads') }}" multiple />

                    <x-input type="date" label="Completion Date" name="completion_date" class="mb-2"
                        value="{{ old('completion_date') }}" required />

                    {{-- <div class="mb-2">
                        <label class="text-gray-800 text-sm font-medium inline-block mb-1">Checklist<span
                                class="text-red-600">*</span></label>
                        <div>
                            <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task1" name="checklist[task1]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                value="1">
                            <label class="text-sm text-gray-500 cursor-pointer" for="task1" class="text-sm font-medium text-gray-900 cursor-pointer">
                                Inspect Structural Stabilization
                            </label>
                        </div>

                        <div>
                            <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task1" name="checklist[electrical_identify_hazards]"
                                value="1">
                            <label class="text-sm text-gray-500 cursor-pointer" for="task1">Identify Electrical Hazards</label>
                        </div>
                        <div>
                            <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task2" name="checklist[electrical_deenergize_systems]"
                                value="1">
                            <label class="text-sm text-gray-500 cursor-pointer" for="task2">De-energize Electrical Systems</label>
                        </div>
                        <div>
                            <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task3" name="checklist[electrical_lockout_tagout]"
                                value="1">
                            <label class="text-sm text-gray-500 cursor-pointer" for="task3">Apply Lockout/Tagout Procedures</label>
                        </div>
                        <div>
                            <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task4" name="checklist[electrical_test_power]"
                                value="1">
                            <label class="text-sm text-gray-500 cursor-pointer" for="task4">Test for Power</label>
                        </div>
                        <div>
                            <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task5" name="checklist[electrical_grounding_bonding]"
                                value="1">
                            <label class="text-sm text-gray-500 cursor-pointer" for="task5">Inspect Grounding and Bonding</label>
                        </div>
                        <div>
                            <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task6" name="checklist[electrical_temporary_power]"
                                value="1">
                            <label class="text-sm text-gray-500 cursor-pointer" for="task6">Check Temporary Power Solutions</label>
                        </div>
                        <div>
                            <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task7" name="checklist[electrical_inspect_panels]"
                                value="1">
                            <label class="text-sm text-gray-500 cursor-pointer" for="task7">Inspect Electrical Panels and Equipment</label>
                        </div>
                        <div>
                            <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task8" name="checklist[electrical_document_measures]"
                                value="1">
                            <label class="text-sm text-gray-500 cursor-pointer" for="task8">Document Isolation Measures</label>
                        </div>
                        <div>
                            <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task9" name="checklist[electrical_signoff]" value="1">
                            <label class="text-sm text-gray-500 cursor-pointer" for="task9">Sign-Off by Qualified Personnel</label>
                        </div>

                        <div>
                            <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task2" name="checklist[task2]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                value="1">
                            <label class="text-sm text-gray-500 cursor-pointer" for="task2" class="text-sm font-medium text-gray-900 cursor-pointer">
                                Inspect Structural Stabilization
                            </label>
                        </div>

                        <div>
                            <input class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2" type="checkbox" id="task3" name="checklist[task3]"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 focus:ring-2"
                                value="1">
                            <label class="text-sm text-gray-500 cursor-pointer" for="task3" class="text-sm font-medium text-gray-900 cursor-pointer">
                                Remove Debris
                            </label>
                        </div>
                    </div> --}}

                    <div>
                        <x-input type="file" label="Technician Signature" name="technician_signature"
                            value="{{ old('technician_signature') }}" accept=".png, .jpg, .jpeg" required />
                    </div>
                </div>

                <!-- External Form Fields -->
                <div id="externalForm" class="form-section hidden mt-4">
                    <h2 class="font-semibold">External Form Fields</h2>
                    <div class="my-4">
                        <label class="text-sm text-gray-500 cursor-pointer" for="task_verified" class="block font-medium">Task Verified</label>
                        <input type="checkbox" name="task_verified" id="task_verified">
                    </div>

                    <div class="mb-4">
                        <label for="subcontractor_signature" class="block font-medium">Subcontractor
                            Signature</label>
                        <input type="text" name="subcontractor_signature" id="subcontractor_signature"
                            class="w-full rounded border-gray-300">
                    </div>

                    <div>
                        <label for="timestamp" class="block font-medium">Timestamp</label>
                        <input type="datetime-local" name="timestamp" id="timestamp"
                            class="w-full rounded border-gray-300">
                    </div>
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
