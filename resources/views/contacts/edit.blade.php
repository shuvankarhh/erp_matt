<x-dashboard-layout pagename="Edit Contact">

    <br>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;"> Edit Contact </h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <br>
                    <div class="col-12">
                        @include('vendor._errors')

                        <form action="{{ route('contacts.update', $contact->encrypted_id()) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label> Name </label>
                                    <input type="text" class="form-control" placeholder="Name" name="name"
                                        value="{{ old('name') ?? $contact->name }}">
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label> Job title </label>
                                    <input type="text" class="form-control" placeholder="Job title" name="job_title"
                                        value="{{ old('job_title') ?? $contact->job_title }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="email"> Email </label>
                                    <input type="email" class="form-control" placeholder="Email" name="email"
                                        value="{{ old('email') ?? $contact->email }}">
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="phone"> Phone </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 20%;">
                                            <select class="form-control" name="phone_code">
                                                @foreach ($countries as $country)
                                                    <option value="{{ json_decode($country->phone_codes)[0] }}"
                                                        {{ $contact->phone_code == json_decode($country->phone_codes)[0] ? 'selected' : '' }}>
                                                        {{ $country->cca3 }}
                                                        &nbsp;
                                                        {{ json_decode($country->phone_codes)[0] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <input type="phone" class="form-control" placeholder="Phone" name="phone"
                                            value="{{ old('phone') ?? $contact->phone }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="stage"> Life Cycle Stage </label>
                                    <select class="form-control" name="stage">
                                        @php
                                            $stages = [
                                                1 => 'Subscriber',
                                                2 => 'Lead',
                                                3 => 'Opportunity',
                                                4 => 'Customer',
                                                5 => 'Evangelist',
                                                6 => 'Other',
                                            ];
                                            $selectedStage = $contact->stage ?? old('stage');
                                        @endphp

                                        <option value="" {{ $selectedStage == '' ? 'selected' : '' }}> Select A
                                            Stage </option>

                                        @foreach ($stages as $key => $stage)
                                            <option value="{{ $key }}"
                                                {{ $selectedStage == $key ? 'selected' : '' }}> {{ $stage }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="engagement"> Engagement </label>
                                    <select class="form-control" name="engagement">
                                        @php
                                            $engagements = [
                                                1 => 'Hot',
                                                2 => 'Warm',
                                                3 => 'Cold',
                                            ];
                                        @endphp

                                        <option value=""
                                            {{ ($contact->engagement ?? old('engagement')) === null ? 'selected' : '' }}>
                                            Select A Stage
                                        </option>

                                        @foreach ($engagements as $key => $engagement)
                                            <option value="{{ $key }}"
                                                {{ ($contact->engagement ?? old('engagement')) == $key ? 'selected' : '' }}>
                                                {{ $engagement }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label> Lead Status </label>
                                    <select class="form-control" name="lead_status">
                                        @php
                                            $lead_status = [
                                                1 => 'New',
                                                2 => 'Contacted',
                                                3 => 'In Progress',
                                                4 => 'Qualified',
                                                5 => 'Unqualified',
                                                6 => 'Attempted To Contact',
                                            ];
                                        @endphp

                                        <option value=""
                                            {{ ($contact->lead_status ?? old('lead_status')) === null ? 'selected' : '' }}>
                                            Select A Lead Status
                                        </option>

                                        @foreach ($lead_status as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ ($contact->lead_status ?? old('lead_status')) == $key ? 'selected' : '' }}>
                                                {{ $value }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label> Source </label>
                                    <select class="form-control" name="source_id">
                                        <option value="" {{ !$contact->source ? 'selected' : '' }}> Select A
                                            Source </option>
                                        @foreach ($sources as $source)
                                            <option value="{{ $source->id }}"
                                                {{ $contact->source && $contact->source->id == $source->id ? 'selected' : '' }}>
                                                {{ $source->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label> Organization </label>
                                    <select class="form-control" name="organization_id">
                                        <option value="" {{ !$contact->organization ? 'selected' : '' }}> Select
                                            An Organization </option>
                                        @foreach ($organizations as $organization)
                                            <option value="{{ $organization->id }}"
                                                {{ $contact->organization && $organization->id == $contact->organization->id ? 'selected' : '' }}>
                                                {{ $organization->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="contact_tags"> Tags </label>
                                    <select class="form-control" name="contact_tags[]" id="contact_tags" multiple>
                                        <option value="" {{ !$contact->tags ? 'selected' : '' }}> Select
                                            Multiple Tags </option>
                                        @foreach ($contact_tags as $contact_tag)
                                            <option value="{{ $contact_tag->id }}"
                                                {{ in_array($contact_tag->id, $tags->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                {{ $contact_tag->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="owner_id"> Owner </label>
                                    <select class="form-control" name="owner_id" id="owner_id">
                                        @if ($staffs->isEmpty())
                                            <option class="text-muted" value="" selected disabled>
                                                No Owners Available...
                                            </option>
                                        @else
                                            <option value="" {{ !$contact->owner ? 'selected' : '' }}>
                                                Select An Owner </option>
                                            @foreach ($staffs as $staff)
                                                <option value="{{ $staff->id }}"
                                                    {{ $contact->owner && $staff->id == $contact->owner->id ? 'selected' : '' }}>
                                                    {{ $staff->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="acting_status"> Archive Status <span style="color:red">*</span></label>
                                    <select class="form-control" name="acting_status" required>
                                        <option value="1"
                                            {{ old('acting_status') == 1 || $contact->acting_status == 1 ? 'selected' : '' }}>
                                            Active </option>
                                        <option value="2"
                                            {{ old('acting_status') == 2 || $contact->acting_status == 2 ? 'selected' : '' }}>
                                            Archived </option>
                                    </select>
                                </div>
                            </div>

                            <br>

                            <h5> Primary Address </h5>

                            <hr>

                            <br>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="title"> Title <span style="color:red">*</span></label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        placeholder="Title" value="{{ old('title') ?? $address->title }}" required>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="holder_name"> Holder Name </label>
                                    <input type="text" id="holder_name" name="holder_name" class="form-control"
                                        placeholder="Holder Name"
                                        value="{{ old('holder_name') ?? $address->holder_name }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="address_email"> Address Email </label>
                                    <input type="email" class="form-control" placeholder="Address Email"
                                        id="address_email" name="address_email"
                                        value="{{ old('email') ?? $address->email }}">
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="phone"> Address Phone </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 20%;">
                                            <select class="form-control" name="address_phone_code">
                                                @foreach ($countries as $country)
                                                    <option value="{{ json_decode($country->phone_codes)[0] }}"
                                                        {{ $address->phone_code == json_decode($country->phone_codes)[0] ? 'selected' : '' }}>
                                                        {{ $country->cca3 }}
                                                        &nbsp;
                                                        {{ json_decode($country->phone_codes)[0] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <input type="phone" class="form-control" placeholder="Address Phone"
                                            name="address_phone"
                                            value="{{ old('address_phone') ?? $address->phone }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="address_line_1"> Address Line 1 <span
                                            style="color:red">*</span></label>
                                    <input type="text" id="address_line_1" name="address_line_1"
                                        class="form-control" placeholder="Address Line One"
                                        value="{{ old('address_line_1') ?? $address->address_line_1 }}" required>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="address_line_2"> Adddress Line 2 </label>
                                    <input type="text" class="form-control" placeholder="Adddress Line Two"
                                        id="address_line_2" name="address_line_2"
                                        value="{{ old('address_line_2') ?? $address->address_line_2 }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-4">
                                    <label> Country <span style="color:red">*</span></label>
                                    <select name="country_id" id="country_id" class="form-control" required>
                                        <option value="">Select country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ $address->country_id == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-4">
                                    <label> State <span style="color:red">*</span></label>
                                    <select name="state_id" id="state_id" class="form-control" required>
                                        <option value="">Select state</option>
                                        @if ($states)
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}"
                                                    {{ $state->id == $address->state_id ? 'selected' : '' }}>
                                                    {{ $state->name }}
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-4">
                                    <label> City <span style="color:red">*</span></label>
                                    <select name="city_id" id="city_id" class="form-control" required>
                                        <option value="">Select city</option>
                                        @if ($cities)
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}"
                                                    {{ $city->id == $address->city_id ? 'selected' : '' }}>
                                                    {{ $city->name }}
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-4">
                                    <label> Postal Code </label>
                                    <input type="text" name="postal_code" id="postal_code" class="form-control"
                                        value="{{ old('postal_code') ?? $address->postal_code }}"
                                        placeholder="Postal Code">
                                </div>
                            </div>

                            <div class="row justify-content-md-center mb-4 borderd">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <x-slot name='scripts'>
        {{-- js CDN for select2 --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
            integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

        {{-- <script>
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
        </script> --}}

    </x-slot>
</x-dashboard-layout>
