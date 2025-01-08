@extends('layouts.vertical', ['title' => 'Contact', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">Add Contact</h4>
            </div>
        </div>
        <div class="p-6">
            <form action="{{ route('contacts.update', ['contact' => $contact->encrypted_id()]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                    <x-input label="Name" name="name" value="{{ old('name') ?? $contact->name }}"
                        placeholder="Enter contact name" required />

                    <x-input label="Job Title" name="job_title" value="{{ old('job_title') ?? $contact->job_title }}"
                        placeholder="Enter job title" />

                    <x-input label="Email" type="email" name="email" value="{{ old('email') ?? $contact->email }}"
                        placeholder="Enter email address" />

                    <x-input label="Phone" type="tel" name="phone" value="{{ old('phone') ?? $contact->phone }}"
                        placeholder="Enter phone number" />

                    <x-select label="Life Cycle Stage" name="stage" :options="$stages" placeholder="Select Stage"
                        selected="{{ old('stage') ?? $contact->stage }}" />

                    <x-select label="Engagement" name="engagement" :options="$engagements" placeholder="Select Engagement"
                        selected="{{ old('engagement') ?? $contact->engagement }}" />

                    <x-select label="Lead Status" name="lead_status" :options="$leads" placeholder="Select Lead Status"
                        selected="{{ old('lead_status') ?? $contact->lead_status }}" />

                    <x-select label="Source" name="source_id" :options="$sources" placeholder="Select Source"
                        selected="{{ old('source_id') ?? $contact->source_id }}" />

                    <x-select label="Organization" name="organization_id" :options="$organizations"
                        placeholder="Select Organization" selected="{{ old('organization_id') ?? $contact->organization_id }}" />

                    <div>
                        <label for="contact_tags" class="text-gray-800 text-sm font-medium inline-block mb-2">Tags</label>

                        <select
                            class="form-select block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm select2"
                            name="contact_tags[]" id="contact_tags" multiple>
                            <option value="" {{ !$contact->tags ? 'selected' : '' }}>Select Tags</option>
                            @foreach ($contact_tags as $id => $name)
                                <option value="{{ $id }}"
                                    {{ in_array($id, $tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                    {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <x-select label="Owner" name="owner_id" :options="$staffs" placeholder="Select Owner"
                        selected="{{ old('owner_id') ?? $contact->owner_id }}" />

                    <x-select label="Archive Status" name="acting_status" :options="$statuses" placeholder="Select Status"
                        selected="{{ old('acting_status') ?? $contact->acting_status }}" required />
                </div>

                <h2 class="text-lg font-semibold text-gray-800 my-4">Primary Address</h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">

                    <x-input label="Title" name="title" value="{{ old('title') ?? $address->title }}"
                        placeholder="Enter primary address title" class="col-span-2 sm:col-span-4 lg:col-span-2" required />

                    <x-input label="Holder Name" name="holder_name"
                        value="{{ old('holder_name') ?? $address->holder_name }}" placeholder="Enter holder name"
                        class="col-span-2 sm:col-span-4 lg:col-span-2" />

                    <x-input label="Primary Address Email" type="email" name="primary_address_email"
                        value="{{ old('primary_address_email') ?? $address->email }}"
                        placeholder="Enter primary address email" class="col-span-2 sm:col-span-4 lg:col-span-2" />

                    <x-input label="Primary Address Phone" type="tel" name="primary_address_phone"
                        value="{{ old('primary_address_phone') ?? $address->phone }}"
                        placeholder="Enter primary address phone" class="col-span-2 sm:col-span-4 lg:col-span-2" />

                    <x-input label="Address Line 1" name="address_line_1"
                        value="{{ old('address_line_1') ?? $address->address_line_1 }}" placeholder="Enter address line 1"
                        class="col-span-2 sm:col-span-4 lg:col-span-2" required />

                    <x-input label="Address Line 2" name="address_line_2"
                        value="{{ old('address_line_2') ?? $address->address_line_2 }}" placeholder="Enter address line 2"
                        class="col-span-2 sm:col-span-4 lg:col-span-2" />

                    <x-select label="Country" name="country_id" :options="$countries" placeholder="Select Country"
                        selected="{{ old('country_id') ?? ($address->country_id ?? null) }}" required />

                    {{-- @dd($address->state_id) --}}

                    <x-select label="State" name="state_id" :options="$states" placeholder="Select State"
                        selected="{{ old('state_id') ?? ($address->state_id ?? null) }}" />

                    <x-select label="City" name="city_id" :options="$cities" placeholder="Select City"
                        selected="{{ old('city_id') ?? ($address->city_id ?? null) }}" />

                    <x-input label="Postal Code" name="postal_code"
                        value="{{ old('postal_code') ?? $address->postal_code }}" placeholder="Enter postal code" />
                </div>

                <button type="submit"
                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Save
                </button>
            </form>
        </div>
    @endsection

    @section('script')
        <script>
            $('#contact_tags').select2({
                multiple: true,
                placeholder: 'Select Multiple Tags',
            });

            $('#contact_tags').on('select2:open', function() {
                $(this).find('option[value=""]').remove();
            });
        </script>

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
