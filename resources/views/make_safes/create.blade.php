@extends('layouts.vertical', ['title' => 'Staffs', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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

                <!-- Form Type -->
                <div class="mb-4">
                    <label for="form_id" class="block font-medium">Form Type</label>
                    <select name="form_id" id="form_id" class="w-full rounded border-gray-300">
                        <option value="">Select Form Type</option>
                        <option value="1">Internal Form</option>
                        <option value="2">External Form</option>
                    </select>
                </div>

                <!-- Internal Form Fields -->
                <div id="internalForm" class="form-section">
                    <h2 class="font-semibold">Internal Form Fields</h2>
                    <div class="mb-4">
                        <label for="structural_stabilization" class="block font-medium">Structural Stabilization
                            Actions</label>
                        <textarea name="structural_stabilization" id="structural_stabilization" rows="4"
                            class="w-full rounded border-gray-300"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="electrical_isolation" class="block font-medium">Electrical Isolation
                            Measures</label>
                        <textarea name="electrical_isolation" id="electrical_isolation" rows="4" class="w-full rounded border-gray-300"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="debris_removal" class="block font-medium">Debris Removal Details</label>
                        <textarea name="debris_removal" id="debris_removal" rows="4" class="w-full rounded border-gray-300"></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="media_uploads" class="block font-medium">Media Uploads</label>
                        <input type="file" name="media_uploads[]" multiple class="w-full rounded border-gray-300">
                    </div>

                    <div class="mb-4">
                        <label for="technician_signature" class="block font-medium">Technician Signature</label>
                        <input type="text" name="technician_signature" id="technician_signature"
                            class="w-full rounded border-gray-300">
                    </div>
                </div>

                <!-- External Form Fields -->
                <div id="externalForm" class="form-section hidden">
                    <h2 class="font-semibold">External Form Fields</h2>
                    <div class="mb-4">
                        <label for="task_verified" class="block font-medium">Task Verified</label>
                        <input type="checkbox" name="task_verified" id="task_verified">
                    </div>

                    <div class="mb-4">
                        <label for="subcontractor_signature" class="block font-medium">Subcontractor
                            Signature</label>
                        <input type="text" name="subcontractor_signature" id="subcontractor_signature"
                            class="w-full rounded border-gray-300">
                    </div>

                    <div class="mb-4">
                        <label for="timestamp" class="block font-medium">Timestamp</label>
                        <input type="datetime-local" name="timestamp" id="timestamp" class="w-full rounded border-gray-300">
                    </div>
                </div>

                {{-- <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                    <div class="col-span-2">
                        <div class="flex flex-col items-center mb-3">
                            <label for="photo_input" class="cursor-pointer">
                                <img id="preview_image" class="rounded-full w-32 h-32 object-cover"
                                    src="{{ asset('images/' . (old('photo') ?? 'user.png')) }}" alt="Profile Image">
                            </label>
                            <input type="file" name="photo" id="photo_input" class="hidden">
                            <button type="button" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded"
                                onclick="document.getElementById('photo_input').click()">Choose Photo</button>
                            <span id="photo_name_output" class="mt-2 text-gray-500"></span>
                        </div>
                    </div>

                    <x-input label="Full Name" name="name" value="{{ old('name') }}" placeholder="Enter Full Name"
                        required />

                    <x-input label="Short Name" name="short_name" value="{{ old('short_name') }}"
                        placeholder="Enter Short Name" />

                    <x-input type="email" label="Email" name="email" value="{{ old('email') }}"
                        placeholder="Enter Email Address" required />

                    <x-input type="password" label="Password" name="password" value="{{ old('password') }}"
                        placeholder="Enter Password" required />

                    <x-input type="tel" label="Phone" name="phone" value="{{ old('phone') }}"
                        placeholder="Enter Phone Number" />

                    <x-input label="Staff Reference ID" name="staff_reference_id" value="{{ old('staff_reference_id') }}"
                        placeholder="Enter Staff Reference ID" />

                    <x-select label="Line Manager" name="line_manager" :options="$staffs" placeholder="Select Line Manager"
                        selected="{{ old('line_manager') }}" />

                    <x-select label="Gender" name="gender" :options="$genders" placeholder="Select Gender"
                        selected="{{ old('gender') }}" required />

                    <x-input label="Address" name="address" value="{{ old('address') }}" placeholder="Enter Address" />

                    <x-select label="Status" name="acting_status" :options="$statuses" placeholder="Select Status"
                        selected="{{ old('acting_status') ?? 1 }}" required />

                    <x-select label="Team" name="team_id" :options="$teams" placeholder="Select Team"
                        selected="{{ old('team_id') }}" required />

                    <x-select label="Designation" name="designation_id" :options="$designations" placeholder="Select Designation"
                        selected="{{ old('designation_id') }}" required />
                </div>

                @if (!empty($customForm))
                    @foreach ($customForm as $item)
                        @if (!empty($item->form_view))
                            <hr class="mt-4 mb-4">
                            <h2 class="text-lg font-semibold text-gray-800 my-4">{{ $item->form_name }}</h2>
                            {!! $item->form_view !!}
                        @endif
                    @endforeach
                @endif --}}

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

                // Initially hide both forms
                internalForm.classList.add('hidden');
                externalForm.classList.add('hidden');

                // Listen for changes to the form type select
                formTypeSelect.addEventListener('change', function() {
                    const selectedValue = this.value;

                    if (selectedValue === "1") {
                        internalForm.classList.remove('hidden');
                        externalForm.classList.add('hidden');
                    } else if (selectedValue === "2") {
                        externalForm.classList.remove('hidden');
                        internalForm.classList.add('hidden');
                    } else {
                        // Hide both forms if no valid value is selected
                        internalForm.classList.add('hidden');
                        externalForm.classList.add('hidden');
                    }
                });
            });
        </script>
    @endsection
