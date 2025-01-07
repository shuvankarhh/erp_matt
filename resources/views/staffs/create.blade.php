@extends('layouts.vertical', ['title' => 'Staffs', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">Add Staff</h4>
            </div>
        </div>
        <div class="p-6">
            <form action="{{ route('staffs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
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

                    <x-input label="Full Name" name="name" value="{{ old('name') }}"
                        placeholder="Enter Full Name" required />

                    <x-input label="Short Name" name="short_name" value="{{ old('short_name') }}"
                        placeholder="Enter Short Name" />

                    <x-input type="email" label="Email" name="email" value="{{ old('email') }}"
                        placeholder="Enter Email Address" required />

                    <x-input type="password" label="Password" name="password" value="{{ old('password') }}"
                        placeholder="Enter Password" required />

                    <x-input type="tel" label="Phone" name="phone" value="{{ old('phone') }}"
                        placeholder="Enter Phone Number" />

                    <x-input label="Staff Reference Id" name="staff_reference_id" value="{{ old('staff_reference_id') }}"
                        placeholder="Enter Reference Id" required />

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

                <button type="submit"
                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Save
                </button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function previewImage(input) {
            console.log("im here sdfshbohl ");

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('preview_image').src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        document.getElementById('photo_input').addEventListener('change', function() {
            previewImage(this);
        });
    </script>
@endsection
