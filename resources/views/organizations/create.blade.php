@extends('layouts.vertical', ['title' => 'Organization', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">Add Organization</h4>
            </div>
        </div>
        <div class="p-6">
            <form action="{{ route('organizations.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                    <x-input label="Name" name="name" value="{{ old('name') }}" placeholder="Enter organization name"
                        required />

                    <x-input label="Domain Name" name="domain_name" value="{{ old('domain_name') }}"
                        placeholder="Enter organization's domain name" />

                    <x-input label="Email" type="email" name="email" value="{{ old('email') }}"
                        placeholder="Enter email address" />

                    <x-input label="Phone" type="tel" name="phone" value="{{ old('phone') }}"
                        placeholder="Enter phone number" />

                    <x-select label="Owner" name="owner_id" :options="$staffs" placeholder="Select Owner"
                        selected="{{ old('owner_id') }}" />

                    <x-select label="Industry" name="industry_id" :options="$industries" placeholder="Select Industry"
                        selected="{{ old('industry_id') }}" />

                    <x-select label="Stakeholder Type" name="stakeholder_type" :options="$stakeholderTypes"
                        placeholder="Select Stakeholder Type" />

                    <x-input label="Number Of Employees" type="number" name="number_of_employees"
                        value="{{ old('number_of_employees') }}" />

                    <x-input label="Annual Revenue" type="number" name="annual_revenue"
                        value="{{ old('annual_revenue') }}" />

                    <x-select label="Timezone" name="timezone_id" :options="$timezones" placeholder="Select Timezone"
                        selected="{{ old('timezone_id') }}" />

                    <x-textarea label="Description" name="description" placeholder="Enter your description" />

                </div>

                <h2 class="text-lg font-semibold text-gray-800 my-4">Primary Address</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

                    <x-input label="Title" name="title" value="{{ old('title') }}"
                        placeholder="Enter primary address title" class="col-span-2 sm:col-span-4 lg:col-span-2" required />


                    <x-input label="Holder Name" name="holder_name" value="{{ old('holder_name') }}"
                        placeholder="Enter holder name" class="col-span-2 sm:col-span-4 lg:col-span-2" />

                    <x-input label="Primary Address Email" type="email" name="primary_address_email"
                        value="{{ old('primary_address_email') }}" placeholder="Enter primary address email"
                        class="col-span-2 sm:col-span-4 lg:col-span-2" />

                    <x-input label="Primary Address Phone" type="tel" name="primary_address_phone"
                        value="{{ old('primary_address_phone') }}" placeholder="Enter primary address phone"
                        class="col-span-2 sm:col-span-4 lg:col-span-2" />

                    <x-input label="Address Line 1" name="address_line_1" value="{{ old('address_line_1') }}"
                        placeholder="Enter address line 1" class="col-span-2 sm:col-span-4 lg:col-span-2" />

                    <x-input label="Address Line 2" name="address_line_2" value="{{ old('address_line_2') }}"
                        placeholder="Enter address line 2" class="col-span-2 sm:col-span-4 lg:col-span-2" />

                    <x-select label="Country" name="country_id" :options="$countries" placeholder="Select Country" />

                    <x-select label="State" name="state_id" placeholder="Select State" />

                    <x-select label="City" name="city_id" placeholder="Select City" />

                    <x-input label="Zip Code" name="zip_code" value="{{ old('zip_code') }}"
                        placeholder="Enter zip code" />
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
    @vite(['resources/js/pages/highlight.js', 'resources/js/pages/form-validation.js'])

    <script>
        $(document).ready(function() {
            $('#country_id').change(function() {
                var country = $(this).val();
                if (country) {
                    $.ajax({
                        url: '{{ route('getStates') }}',
                        type: 'POST',
                        data: {
                            country: country,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(response) {
                            var states = response.states;
                            $('#city_id').empty().append(
                                '<option value="">Select City</option>');
                            $('#state_id').empty().append(
                                '<option value="">Select State</option>');
                            $.each(states, function(index, element) {
                                $('#state_id').append('<option value="' + element[
                                        'id'] + '">' + element['name'] +
                                    '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('#state_id').empty().append('<option value="">Select State</option>');
                }
            });

            $('#state_id').change(function() {
                var state = $(this).val();
                if (state) {
                    $.ajax({
                        url: '{{ route('getCities') }}',
                        type: 'POST',
                        data: {
                            state: state,
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(response) {
                            var cities = response.cities;
                            $('#city_id').empty().append(
                                '<option value="">Select City</option>');
                            $.each(cities, function(index, element) {
                                $('#city_id').append('<option value="' + element['id'] +
                                    '">' + element['name'] + '</option>');
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                } else {
                    $('#city_id').empty().append('<option value="">Select City</option>');
                }
            });
        })
    </script>
@endsection
