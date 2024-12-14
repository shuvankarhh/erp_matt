<x-dashboard-layout pagename="Organization Craete">
    <x-slot name='css'>

    </x-slot>

    <br>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;"> Create New Organization </h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="col-12">

                        <form action="{{ route('organizations.store') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="name"> Name <span style="color:red">*</span></label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') }}" required>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="domain_name"> Domain Name </label>
                                    <input type="text" class="form-control" id="domain_name" name="domain_name"
                                        value="{{ old('domain_name') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="email"> Email </label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        value="{{ old('email') }}">
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="phone"> Phone </label>
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

                                        <input type="phone" class="form-control" placeholder="Phone" id="phone"
                                            name="phone" value="{{ old('phone') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="owner_id"> Owner </label>
                                    <select class="form-control" name="owner_id" id="owner_id">
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="industry_id"> Industry </label>
                                    <select class="form-control" name="industry_id" id="industry_id">
                                        @foreach ($industries as $industry)
                                            <option value="{{ $industry->id }}"> {{ $industry->name }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="stakeholder_type"> Stakeholder Type </label>
                                    <select class="form-control" name="stakeholder_type" id="stakeholder_type">
                                        @if (old('stakeholder_type') == 1)
                                            <option value="1" selected> Prospect </option>
                                        @else
                                            <option value="1"> Prospect </option>
                                        @endif

                                        @if (old('stakeholder_type') == 2)
                                            <option value="2" selected> Partner </option>
                                        @else
                                            <option value="2"> Partner </option>
                                        @endif

                                        @if (old('stakeholder_type') == 3)
                                            <option value="3" selected> Reseller </option>
                                        @else
                                            <option value="3"> Reseller </option>
                                        @endif

                                        @if (old('stakeholder_type') == 4)
                                            <option value="4" selected> Vendor </option>
                                        @else
                                            <option value="4"> Vendor </option>
                                        @endif

                                        @if (old('stakeholder_type') == 5)
                                            <option value="5" selected> Other </option>
                                        @else
                                            <option value="5"> Other </option>
                                        @endif
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="number_of_employees"> Number Of Employees </label>
                                    <input type="number" class="form-control" id="number_of_employees"
                                        name="number_of_employees" value="{{ old('number_of_employees') }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="annual_revenue"> Annual Revenue </label>
                                    <input type="number" class="form-control" id="annual_revenue" name="annual_revenue"
                                        value="{{ old('annual_revenue') }}">
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="time_zone"> Time Zone </label>
                                    <select class="form-control" id="time_zone" name="time_zone">
                                        <option value="" selected> Select Time Zone </option>
                                        @foreach ($timezones as $timezone)
                                            <option value="{{ $timezone->id }}">{{ $timezone->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                                    <label for="description"> Description </label>
                                    <textarea class="form-control" name="description" id="description" rows="1" required> {{ old('description') }} </textarea>
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
                                    <label for="primary_address_email"> Primary Address Email </label>
                                    <input type="email" class="form-control" placeholder="Email"
                                        id="primary_address_email" name="primary_address_email"
                                        value="{{ old('primary_address_email') }}">
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="primary_address_phone"> Primary Address Phone </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend" style="width: 20%;">
                                            <select class="form-control" name="primary_address_phone_code">
                                                @foreach ($countries as $country)
                                                    <option value="{{ json_decode($country->phone_codes)[0] }}">
                                                        {{ $country->cca3 }}
                                                        &nbsp;
                                                        {{ json_decode($country->phone_codes)[0] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <input type="text" id="primary_address_phone" name="primary_address_phone"
                                            class="form-control" placeholder="Phone"
                                            value="{{ old('primary_address_phone') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6 mb-4">
                                    <label for="address_line_1"> Address Line 1 </label>
                                    <input type="text" id="address_line_1" name="address_line_1"
                                        class="form-control" placeholder="Address Line One"
                                        value="{{ old('address_line_1') }}">
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
                                    <label for="country_id"> Country </label>
                                    <select name="country_id" id="country_id" class="form-control">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-4">
                                    <label for="state_id"> State </label>
                                    <select name="state_id" id="state_id" class="form-control">
                                        <option value="">Select State</option>
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-4">
                                    <label for="city_id"> City </label>
                                    <select name="city_id" id="city_id" class="form-control">
                                        <option value="">Select City</option>
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-3 mb-4">
                                    <label for="zip_code"> Zip Code </label>
                                    <input type="text" id="zip_code" name="zip_code" class="form-control"
                                        value="{{ old('zip_code') }}" placeholder="Zip Code">
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
        <script src="{{ mix('/js/umtt/organizations.js')}}"></script>
    </x-slot>
</x-dashboard-layout>
