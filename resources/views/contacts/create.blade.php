<x-dashboard-layout pagename="Add Contact">

    <br>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;"> Create New Contact</h4>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">
                    <br>
                    <div class="col-12">

                        @include('vendor._errors')

                        <form action="{{ route('contacts.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label> Name </label>
                                    <input type="text" class="form-control" placeholder="Name" name="name"
                                        value="{{ old('name') }}">
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label> Job title </label>
                                    <input type="text" class="form-control" placeholder="Job title " name="job_title"
                                        value="{{ old('job_title ') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label> Email </label>
                                    <input type="email" class="form-control" placeholder="Email" name="email"
                                        value="{{ old('email') }}">
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label> Phone </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 20%;">
                                            <select class="form-control" name="phone_code">
                                                @foreach ($countries as $country)
                                                    <option value="{{ json_decode($country->phone_codes)[0] }}">
                                                        {{ $country->cca3 }}
                                                        &nbsp;
                                                        {{ json_decode($country->phone_codes)[0] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <input type="phone" class="form-control" placeholder="Phone" name="phone"
                                            value="{{ old('phone') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="stage"> Life Cycle Stage </label>
                                    <select class="form-control" name="stage">
                                        <option value="" selected> Select A Stage </option>
                                        @if (old('stage') == 1)
                                            <option value="1" selected> Subscriber </option>
                                        @else
                                            <option value="1"> Subscriber </option>
                                        @endif

                                        @if (old('stage') == 2)
                                            <option value="2" selected> Lead </option>
                                        @else
                                            <option value="2"> Lead </option>
                                        @endif

                                        @if (old('stage') == 3)
                                            <option value="3" selected> Opportunity </option>
                                        @else
                                            <option value="3"> Opportunity </option>
                                        @endif

                                        @if (old('stage') == 4)
                                            <option value="4" selected> Customer </option>
                                        @else
                                            <option value="4"> Customer </option>
                                        @endif

                                        @if (old('stage') == 5)
                                            <option value="5" selected> Evangelist </option>
                                        @else
                                            <option value="5"> Evangelist </option>
                                        @endif

                                        @if (old('stage') == 6)
                                            <option value="6" selected> Other </option>
                                        @else
                                            <option value="6"> Other </option>
                                        @endif
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label> Engagement </label>
                                    <select class="form-control" name="engagement">
                                        <option value="" selected> Select An Engagement </option>
                                        @if (old('engagement') == 1)
                                            <option value="1" selected>Hot</option>
                                        @else
                                            <option value="1">Hot</option>
                                        @endif

                                        @if (old('engagement') == 2)
                                            <option value="2" selected>Warm</option>
                                        @else
                                            <option value="2">Warm</option>
                                        @endif

                                        @if (old('engagement') == 3)
                                            <option value="3" selected>Cold</option>
                                        @else
                                            <option value="3">Cold</option>
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label> Lead Status </label>
                                    <select class="form-control" name="lead_status">
                                        <option value="" selected> Select A Lead Status </option>
                                        @if (old('lead_status') == 1)
                                            <option value="1" selected>New</option>
                                        @else
                                            <option value="1">New</option>
                                        @endif

                                        @if (old('lead_status') == 2)
                                            <option value="2" selected> Contacted </option>
                                        @else
                                            <option value="2"> Contacted </option>
                                        @endif

                                        @if (old('lead_status') == 3)
                                            <option value="3" selected> In Progress </option>
                                        @else
                                            <option value="3"> In Progress </option>
                                        @endif

                                        @if (old('lead_status') == 4)
                                            <option value="4" selected> Qualified </option>
                                        @else
                                            <option value="4"> Qualified </option>
                                        @endif

                                        @if (old('lead_status') == 5)
                                            <option value="5" selected> Unqualified </option>
                                        @else
                                            <option value="5"> Unqualified </option>
                                        @endif

                                        @if (old('lead_status') == 6)
                                            <option value="6" selected> Attempted To Contact </option>
                                        @else
                                            <option value="6"> Attempted To Contact </option>
                                        @endif
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label> Source </label>
                                    <select class="form-control" name="source_id">
                                        @if ($sources->isEmpty())
                                            <option class="text-muted" value="" selected disabled>
                                                No Sources Available
                                            </option>
                                        @else
                                            <option value="" selected> Select A Source </option>
                                            @foreach ($sources as $source)
                                                <option value="{{ $source->id }}">
                                                    {{ $source->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label> Organization </label>
                                    <select class="form-control" name="organization_id"
                                        {{ $readOnly ? 'readonly' : '' }}>
                                        @if ($organizations->isEmpty())
                                            <option class="text-muted" value="" selected disabled>
                                                No Organizations Available
                                            </option>
                                        @else
                                            <option value="" selected> Select An Organization </option>
                                            @foreach ($organizations as $organization)
                                                <option value="{{ $organization->id }}"
                                                    {{ $organization->id == $selectedOrganizationId ? 'selected' : '' }}
                                                    {{ $readOnly && $organization->id != $selectedOrganizationId ? 'disabled' : '' }}>
                                                    {{ $organization->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="contact_tags"> Tags </label>
                                    <select class="form-control" name="contact_tags[]" id="contact_tags">
                                        <option value=""></option>
                                        @foreach ($contact_tags as $contact_tag)
                                            <option value="{{ $contact_tag->id }}">
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
                                            <option class="text-muted" value="">
                                                No Owners Available...
                                            </option>
                                        @else
                                            <option value="" selected> Select An Owner </option>
                                            @foreach ($staffs as $staff)
                                                <option value="{{ $staff->id }}">
                                                    {{ $staff->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="acting_status"> Archive Status <span
                                            style="color:red">*</span></label>
                                    <select class="form-control" name="acting_status" required>
                                        @if (old('acting_status') == 1)
                                            <option value="1" selected> Active </option>
                                        @else
                                            <option value="1"> Active </option>
                                        @endif

                                        @if (old('acting_status') == 2)
                                            <option value="2" selected> Archived </option>
                                        @else
                                            <option value="2"> Archived </option>
                                        @endif
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
                                        placeholder="Title" value="{{ old('title') }}" required>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="holder_name"> Holder Name </label>
                                    <input type="text" id="holder_name" name="holder_name" class="form-control"
                                        placeholder="Holder Name" value="{{ old('holder_name') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="address_email"> Address Email </label>
                                    <input type="email" class="form-control" placeholder="Address Email"
                                        id="address_email" name="address_email" value="{{ old('address_email') }}">
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="address_phone"> Address Phone </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 20%;">
                                            <select class="form-control" name="address_phone_code">
                                                @foreach ($countries as $country)
                                                    <option value="{{ json_decode($country->phone_codes)[0] }}">
                                                        {{ $country->cca3 }}
                                                        &nbsp;
                                                        {{ json_decode($country->phone_codes)[0] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <input type="text" id="address_phone" name="address_phone"
                                            class="form-control" placeholder="Address Phone"
                                            value="{{ old('address_phone') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="address_line_1"> Address Line 1 <span
                                            style="color:red">*</span></label>
                                    <input type="text" id="address_line_1" name="address_line_1"
                                        class="form-control" placeholder="Address Line One"
                                        value="{{ old('address_line_1') }}" required>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="address_line_2"> Adddress Line 2 </label>
                                    <input type="text" class="form-control" placeholder="Adddress Line Two"
                                        id="address_line_2" name="address_line_2"
                                        value="{{ old('address_line_2') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-4">
                                    <label> Country <span style="color:red">*</span></label>
                                    <select name="country_id" id="country_id" class="form-control" required>
                                        <option value="">Select country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-4">
                                    <label> State <span style="color:red">*</span></label>
                                    <select name="state_id" id="state_id" class="form-control" required>
                                        <option value="">Select state</option>
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-4">
                                    <label> City <span style="color:red">*</span></label>
                                    <select name="city_id" id="city_id" class="form-control" required>
                                        <option value="">Select city</option>
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-4">
                                    <label> Postal Code </label>
                                    <input type="text" name="postal_code" id="postal_code" class="form-control"
                                        value="{{ old('postal_code') }}" placeholder="Postal Code">
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
        <script>
            $(document).ready(function() {
                var readOnly = {{ $readOnly ? 'true' : 'false' }};
                var selectedOrganizationId = {{ $selectedOrganizationId ?? 'null' }};

                if (readOnly && selectedOrganizationId) {
                    $('select[name="organization_id"] option').prop('disabled', true);
                    $('select[name="organization_id"] option[value="' + selectedOrganizationId + '"]').prop('disabled',
                        false);
                }
            });
        </script>

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

    </x-slot>
</x-dashboard-layout>
