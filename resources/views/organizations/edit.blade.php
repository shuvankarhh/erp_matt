@extends('layouts.vertical', ['title' => 'Organizations', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

{{-- @foreach ($staffs as $staff) --}}
{{-- @dd($organization->owner->id) --}}
{{-- @dd($staff->id) --}}
{{-- @endforeach --}}


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">Edit Organization</h4>
                <div class="flex items-center gap-2">
                    <button type="button" class="btn-code" data-fc-type="collapse" data-fc-target="GridFormHtml">
                        <i class="mgc_eye_line text-lg"></i>
                        <span class="ms-2">Code</span>
                    </button>

                    <button class="btn-code" data-clipboard-action="copy">
                        <i class="mgc_copy_line text-lg"></i>
                        <span class="ms-2">Copy</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="p-6">
            <form action="{{ route('organizations.update', ['organization' => $organization->encrypted_id()]) }}"
                method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                    <x-input label="Name" name="name" value="{{ old('name') ?? $organization->name }}"
                        placeholder="Enter organization name" required />

                    <x-input label="Domain Name" name="domain_name"
                        value="{{ old('domain_name') ?? $organization->domain_name }}"
                        placeholder="Enter organization's domain name" required />

                    <x-input label="Email" type="email" name="email" value="{{ old('email') ?? $organization->email }}"
                        placeholder="Enter email address" required />

                    <x-input label="Phone" type="tel" name="phone" value="{{ old('phone') ?? $organization->phone }}"
                        placeholder="Enter phone number" required />

                    {{-- <div class="lg:col-span-2">
                        <label for="inputAddress"
                            class="text-gray-800 text-sm font-medium inline-block mb-2">Address</label>
                        <input type="text" class="form-input" id="inputAddress" placeholder="1234 Main St">
                    </div> --}}

                    <x-select label="Owner" name="owner_id" required>
                        <option value="{{ $organization->owner->id ?? null }}" selected>
                            {{ $organization->owner->name ?? null }}
                        </option>
                    </x-select>

                    <x-select label="Industry" name="industry_id" :options="$industries" placeholder="Select an industry"
                        selected="{{ old('industry_id') ?? $organization->industry->id }}" required />

                    <x-select label="Stakeholder Type" name="stakeholder_type" required>
                        @php
                            $stakeholderTypes = [
                                1 => 'Prospect',
                                2 => 'Partner',
                                3 => 'Reseller',
                                4 => 'Vendor',
                                5 => 'Other',
                            ];
                        @endphp

                        @foreach ($stakeholderTypes as $key => $value)
                            <option value="{{ $key }}"
                                {{ old('stakeholder_type', $organization->stakeholder_type) == $key ? 'selected' : '' }}>
                                {{ $value }}
                            </option>
                        @endforeach
                    </x-select>

                    <x-input label="Number Of Employees" type="number" name="number_of_employees"
                        value="{{ old('number_of_employees') ?? $organization->number_of_employees }}" />

                    <x-input label="Annual Revenue" type="number" name="annual_revenue"
                        value="{{ old('annual_revenue') ?? $organization->annual_revenue }}" />

                    <x-select label="Timezone" name="timezone_id" :options="$timezones" placeholder="Select an industry"
                        selected="{{ old('timezone_id') ?? $organization->timezone_id }}" required />

                    <x-textarea label="Description" name="description" placeholder="Enter your description" required />

                    <x-input label="Title" name="title" value="{{ old('title') ?? $address->title ?? null }}"
                        placeholder="Enter organization's primary address title" required />

                    {{-- <br>

                    <h5> Primary Address </h5>

                    <hr>

                    <br>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                            <label for="title"> Title <span style="color:red">*</span></label>
                            <input type="text" id="title" name="title" class="form-control" placeholder="Title"
                                value="{{ old('title') ?? ($address->title ?? null) }}" required>
                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                            <label for="holder_name"> Holder Name </label>
                            <input type="text" id="holder_name" name="holder_name" class="form-control"
                                placeholder="Holder Name"
                                value="{{ old('holder_name') ?? ($address->holder_name ?? null) }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                            <label for="primary_address_email"> Primary Address Email </label>
                            <input type="email" class="form-control" placeholder="Email" id="primary_address_email"
                                name="primary_address_email"
                                value="{{ old('primary_address_email') ?? ($address->email ?? null) }}">
                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                            <label for="primary_address_phone"> Primary Address Phone </label>
                            <div class="input-group">
                                <div class="input-group-prepend" style="width: 20%;">
                                    <select class="form-control" name="primary_address_phone_code">
                                        @if ($countries->isEmpty())
                                            <option class="text-muted" value="" selected disabled>
                                                Select Country
                                            </option>
                                        @else
                                            @foreach ($countries as $country)
                                                <option value="{{ json_decode($country->phone_codes)[0] }}"
                                                    {{ optional($address)->phone_code == json_decode($country->phone_codes)[0] ? 'selected' : '' }}>
                                                    {{ $country->cca3 }}
                                                    &nbsp;
                                                    {{ json_decode($country->phone_codes)[0] }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <input type="phone" class="form-control" placeholder="Phone"
                                    id="primary_address_phone" name="primary_address_phone"
                                    value="{{ old('primary_address_phone') ?? ($address->phone ?? null) }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                            <label for="address_line_1"> Address Line 1 </label>
                            <input type="text" id="address_line_1" name="address_line_1" class="form-control"
                                placeholder="Address Line One"
                                value="{{ old('address_line_1') ?? ($address->address_line_1 ?? null) }}">
                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                            <label for="address_line_2"> Adddress Line 2 </label>
                            <input type="text" class="form-control" placeholder="Adddress Line Two"
                                id="address_line_2" name="address_line_2"
                                value="{{ old('address_line_2') ?? ($address->address_line_2 ?? null) }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-4">
                            <label> Country </label>
                            <select name="country_id" id="country_id" class="form-control">
                                <option value="">Select country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        {{ optional($address)->country_id == $country->id ? 'selected' : '' }}>
                                        {{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-4">
                            <label> State </label>
                            <select name="state_id" id="state_id" class="form-control">
                                <option value="">Select state</option>
                                @if ($states)
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}"
                                            {{ $state->id == optional($address)->state_id ? 'selected' : '' }}>
                                            {{ $state->name }}
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-4">
                            <label> City </label>
                            <select name="city_id" id="city_id" class="form-control">
                                <option value="">Select city</option>
                                @if ($cities)
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}"
                                            {{ $city->id == optional($address)->city_id ? 'selected' : '' }}>
                                            {{ $city->name }}
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-4">
                            <label> Zip Code </label>
                            <input type="text" name="zip_code" id="" class="form-control"
                                value="{{ old('zip_code') ?? ($address->zip_code ?? null) }}" placeholder="Zip Code">
                        </div>
                    </div> --}}
                </div>

                {{-- <div class="row justify-content-md-center mb-4 borderd">
                    <button type="submit" class="btn btn-info">Submit</button>
                </div> --}}

                {{-- <button type="submit" class="btn bg-primary text-white">Save</button> --}}

                {{-- <button type="submit"
                    class="mt-2 flex justify-start bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Save
                </button> --}}

                <button type="submit"
                    class="mt-2 flex justify-start bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 ml-auto">
                    Save
                </button>

                {{-- <div class="flex">
                    <button type="submit"
                        class="mt-2 flex justify-start bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 ml-auto">
                        Save
                    </button>
                </div> --}}
            </form>
        </div>
    </div>
@endsection

@section('script')
    @vite(['resources/js/pages/highlight.js', 'resources/js/pages/form-validation.js'])
@endsection

{{-- @section('script')
    <script src="{{ mix('/js/umtt/organizations.js') }}"></script>
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
@endsection --}}
