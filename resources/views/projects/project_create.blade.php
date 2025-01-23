@extends('layouts.vertical', ['title' => 'Project', 'sub_title' => 'Project', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/glightbox/dist/css/glightbox.min.css'])
@endsection

@section('content')
@section('script')
    @vite('resources/js/pages/main.js')
@endsection
<style>
    .form-input {
        width: 100%;
        padding: 8px;
        padding-right: 2.5rem;
        /* Space for the icon */
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    #save-icon {
        font-size: 1.2rem;
        color: #4caf50;
        /* Green color for save indication */
        pointer-events: none;
        /* Prevent interaction with the icon */
    }

    .hidden {
        display: none;
    }

    .sortable-ghost {
        background-color: #f3f4f6;
        opacity: 0.7;
        border: 2px dashed #ccc;
    }
</style>




<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card">
    <form action="{{ route('projects.store') }}" method="POST">
        @csrf
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">Create New Project</h4>
                <div class="flex items-center gap-2">

                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Close
                    </button>


                    <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Save
                    </button>
                </div>
            </div>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <h2 class="text-lg">Customer Information</h2>
                <hr class="mt-2">
                <div class="flex justify-between mt-3">
                    <label for="inTheCustomer" class="w-1/2">Is the Customer</label>
                    <select name="inTheCustomer" class="w-1/2 rounded" id="inTheCustomer" onchange="inTheCustomers()">
                        <option value="">---select---</option>
                        <option value="existing">Add Existing</option>
                        <option value="createNew">Create New</option>
                    </select>
                </div>

                <div class="customerList flex justify-between mt-2 hidden">
                    <label for="" class="w-1/2">Select Customer</label>
                    <select name="contact_id" class="w-1/2 rounded" id="">
                        <option value="">---select one---</option>
                        @foreach ($contacts as $contact)
                            <option value="{{ $contact->id }}">{{ $contact->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="createCustomer mt-2 hidden">
                    <label for="">Create New</label>
                    <div class="flex justify-between gap-3 mt-1 p-2">

                        <!-- Organisation Name -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="contact-organisation-name" class="mb-1 text-gray-700 font-medium">Organisation
                                Name</label>
                            <input type="text" id="contact-organisation-name" name="contact_organisation_name"
                                class="border border-gray-300 rounded p-2" placeholder="Enter organisation name">
                        </div>

                        <!-- Contact First Name -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="contact-first-name" class="mb-1 text-gray-700 font-medium">Contact first
                                Name</label>
                            <input type="text" id="contact-first-name" name="contact_first_name"
                                class="border border-gray-300 rounded p-2" placeholder="Enter first name">
                        </div>
                        <!-- Contact Last Name -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="contact-last-name" class="mb-1 text-gray-700 font-medium">Contact Last
                                Name</label>
                            <input type="text" id="contact-last-name" name="contact_last_name"
                                class="border border-gray-300 rounded p-2" placeholder="Enter last name">
                        </div>

                    </div>

                    <div class="flex justify-between gap-3 mt-1 p-2">
                        <!-- Phone Number -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="phone-number" class="mb-1 text-gray-700 font-medium">Phone Number</label>
                            <input type="text" id="phone-number" name="phone_number"
                                class="border border-gray-300 rounded p-2" placeholder="Enter phone number">
                        </div>
                        <!-- Email -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="email" class="mb-1 text-gray-700 font-medium">Email</label>
                            <input type="email" id="email" name="email"
                                class="border border-gray-300 rounded p-2" placeholder="Enter email address">
                        </div>
                        <!-- Status -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="status-2" class="mb-1 text-gray-700 font-medium">Status</label>
                            <select name="status" id="">
                                <option value="1"> Active </option>
                                <option value="2"> Archived </option>

                            </select>
                        </div>
                    </div>


                    <div class="flex justify-between gap-3 mt-1 p-2">
                        <!-- Organisation -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="organization" class="mb-1 text-gray-700 font-medium">Organization</label>
                            <select name="organization_id" id="">
                                <option value="">---select one---</option>
                                @foreach ($organizations as $organization)
                                    <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <!-- Parent Organisation -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="parent-organization" class="mb-1 text-gray-700 font-medium">Parent
                                Organisation</label>
                            <select name="parent_organization_id" id="">
                                <option value="">---select one---</option>
                                @foreach ($organizations as $organization)
                                    <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- Sales Person -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="sales-person" class="mb-1 text-gray-700 font-medium">Sales Person</label>
                            <select name="sales_person_id" id="">
                                <option value="">---select one---</option>
                                @foreach ($staffs as $staff)
                                    <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-between gap-3 mt-1 p-2">
                        <!-- Order Number -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="order-number" class="mb-1 text-gray-700 font-medium">Order Number</label>
                            <input type="text" id="order-number" name="order_number"
                                class="border border-gray-300 rounded p-2" placeholder="Enter order number">
                        </div>


                        {{-- <x-select label="Country" name="country_id" :options="$countries" placeholder="Select Country" required />

                    <x-select label="State" name="state_id" placeholder="Select State" />

                    <x-select label="City" name="city_id" placeholder="Select City" /> --}}


                        <div class="flex flex-col w-full md:w-1/2">
                            <label class="mb-1 text-gray-700 font-medium"> Country <span
                                    style="color:red">*</span></label>
                            <select name="country_id" id="country_id" class="rounded" required>
                                <option value="">Select country</option>
                                @foreach ($countries as $country)
                                    <option value="{{ $country->id }}"
                                        {{ old('country_id') == $country->id ? 'selected' : '' }}>
                                        {{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col w-full md:w-1/2">
                            <label class="mb-1 text-gray-700 font-medium"> State <span
                                    style="color:red">*</span></label>
                            <select name="state_id" id="state_id" class="rounded" required>
                                <option value="">Select state</option>
                            </select>
                        </div>

                        <div class="flex flex-col w-full md:w-1/2">
                            <label class="mb-1 text-gray-700 font-medium"> City </label>
                            <select name="city_id" id="city_id" class="rounded">
                                <option value="">Select city</option>
                            </select>
                        </div>

                        <div class="flex flex-col w-full md:w-1/2">
                            <label> Postal Code </label>
                            <input type="text" name="postal_code" id="postal_code" class="rounded"
                                value="{{ old('postal_code') }}" placeholder="Postal Code">
                        </div>

                    </div>

                </div>

                <h2 class="text-lg mt-3">Basic Information</h2>
                <hr class="mt-2">
                <div class="flex justify-between gap-3 mt-1 p-2">
                    <!-- Project Type -->
                    <div class="flex flex-col w-full md:w-1/2">
                        <label for="project-type" class="mb-1 text-gray-700 font-medium">Project Type</label>
                        <select name="project_type_id" id="project-type"
                            data-url="{{ route('getServiceTypes', ':id') }}">
                            <option value="">---select one---</option>
                            @foreach ($projectTypes as $projectType)
                                <option value="{{ $projectType->id }}"> {{ $projectType->name }} </option>
                            @endforeach
                        </select>

                    </div>

                    <!-- Service Type -->
                    <div class="flex flex-col w-full md:w-1/2">
                        <label for="service-type" class="mb-1 text-gray-700 font-medium">Service Type</label>
                        <select name="service_type_id" id="service-type" class="rounded">
                            <option value="">Select Service Type</option>
                            @foreach ($ServiceTypes as $id => $name)
                                <option value="{{ $id }}"
                                    {{ $id == old('service_type_id') ? 'selected' : '' }}> {{ $name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Property Type -->
                    <div class="flex flex-col w-full md:w-1/2">
                        <label for="property-type" class="mb-1 text-gray-700 font-medium">Property Type</label>
                        <select name="property_type" id="">
                            <option value="">---select---</option>
                            <option value="1">Commercial</option>
                            <option value="2">Residential</option>
                        </select>
                    </div>
                </div>

                <div class="flex justify-between gap-3 mt-1 p-2">

                    <!-- Year Built -->
                    <div class="flex flex-col w-full md:w-1/2">
                        <label for="year-built" class="mb-1 text-gray-700 font-medium">Year Built</label>
                        <select id="year-picker" name="year_built" class="border border-gray-300 rounded p-2">
                            <script>
                                const currentYear = new Date().getFullYear();

                                document.write('<option value="" disabled>Select year built</option>');
                                for (let year = 2000; year <= currentYear; year++) {
                                    if (year === currentYear) {
                                        document.write(`<option value="${year}" selected>${year}</option>`);
                                    } else {
                                        document.write(`<option value="${year}">${year}</option>`);
                                    }
                                }
                            </script>
                        </select>
                    </div>

                    <!-- Insurance Information -->
                    <div class="flex flex-col w-full md:w-1/2">
                        <label for="insurance-information" class="mb-1 text-gray-700 font-medium">Insurance
                            Information</label>
                        <select name="insurance_information" id="insurance-information"
                            class="border border-gray-300 rounded p-2" onchange="insuranceInformation()">
                            <option value="">---Select One---</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>

                </div>

                <div class="insuranceInformations hidden">

                    <label for="" class="">Insurance Information</label>

                    <div class="flex justify-between gap-3 mt-1 p-2">
                        <!-- Project Type -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="insurance-company" class="mb-1 text-gray-700 font-medium">Insurance
                                Company</label>
                            <input type="text" id="insurance-company" name="insurance_company"
                                class="border border-gray-300 rounded p-2" placeholder="Enter insurance company">
                        </div>
                        <!-- Insurance Policy -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="insurance-policy" class="mb-1 text-gray-700 font-medium">Insurance
                                Policy</label>
                            <input type="text" id="insurance-policy" name="insurance_policy"
                                class="border border-gray-300 rounded p-2" placeholder="Enter insurance policy">
                        </div>
                        <!-- Property Type -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="insurance_claim-number" class="mb-1 text-gray-700 font-medium">Insurance Claim
                                Number</label>
                            <input type="text" id="insurance-claim-number" name="insurance_claim_number"
                                class="border border-gray-300 rounded p-2" placeholder="Enter property type">
                        </div>
                    </div>
                </div>

                <div class="flex justify-between gap-3 mt-1 p-2">
                    <!-- Price List -->
                    <div class="flex flex-col w-full md:w-1/2">
                        <label for="price-list" class="mb-1 text-gray-700 font-medium">Price List</label>
                        <select name="price_list_id" id="">
                            <option value="">---select one---</option>
                            @foreach ($priceLists as $priceList)
                                <option value="{{ $priceList->id }}">
                                    {{ $priceList->from_price }}--{{ $priceList->to_price }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Project Address -->
                    <div class="flex flex-col w-full md:w-1/2">
                        <label for="project-address" class="mb-1 text-gray-700 font-medium">Project Address</label>
                        <input type="text" id="project-address" class="border border-gray-300 rounded p-2"
                            placeholder="Enter project address">

                    </div>

                    <!-- checkbox customer address address -->
                    <div class="flex flex-row items-center w-full md:w-1/2 mt-4">
                        <input type="checkbox" id="same-as-project-address"
                            class="border border-gray-300 rounded p-2">
                        <label for="same-as-project-address" class="mb-1 text-gray-700 font-medium ml-2">
                            Same as Customer Address
                        </label>
                    </div>




                </div>

                <h2 class="text-lg">Referrer Information</h2>
                <hr class="mt-2">
                <div class="flex justify-between mt-3">
                    <label for="" class="w-1/2">Referral Source</label>
                    <select name="referralSource" class="w-1/2 rounded" id="referralSource"
                        onchange="referralSources()">
                        <option value="">---select---</option>
                        <option value="existingReferralSource">Add Existing</option>
                        <option value="addNewReferralSource">Add New</option>
                    </select>
                </div>

                <div class="referralSourceList flex justify-between mt-2 hidden">
                    <label for="" class="w-1/2">Select Referral Source</label>
                    <select name="referral_source_id" class="w-1/2 rounded" id="">
                        <option value="">---select one---</option>
                        @foreach ($raferrerInfos as $raferrerInfo)
                            <option value="{{ $raferrerInfo->id }}">{{ $raferrerInfo->organization_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="createReferralSource mt-2 hidden">
                    <label for="">Create New</label>
                    <div class="flex justify-between gap-3 mt-1 p-2">

                        <!-- Organisation Name -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="contact-organisation-name" class="mb-1 text-gray-700 font-medium">Organisation
                                Name</label>
                            <input type="text" id="contact-organisation-name" name="referrer_organisation_name"
                                class="border border-gray-300 rounded p-2" placeholder="Enter organisation name">
                        </div>

                        <!-- Contact First Name -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="contact-first-name" class="mb-1 text-gray-700 font-medium">Contact first
                                Name</label>
                            <input type="text" id="contact-first-name" name="referrer_organisation_name"
                                class="border border-gray-300 rounded p-2" placeholder="Enter first name">
                        </div>
                        <!-- Contact Last Name -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="contact-last-name" class="mb-1 text-gray-700 font-medium">Contact Last
                                Name</label>
                            <input type="text" id="contact-last-name" name="referrer_organisation_name"
                                class="border border-gray-300 rounded p-2" placeholder="Enter last name">
                        </div>

                    </div>

                    <div class="flex justify-between gap-3 mt-1 p-2">
                        <!-- Phone Number -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="phone-number" class="mb-1 text-gray-700 font-medium">Phone Number</label>
                            <input type="text" id="phone-number" name="referrer_phone_number"
                                class="border border-gray-300 rounded p-2" placeholder="Enter phone number">
                        </div>
                        <!-- Email -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="email" class="mb-1 text-gray-700 font-medium">Email</label>
                            <input type="email" id="email" name="referrer_email"
                                class="border border-gray-300 rounded p-2" placeholder="Enter email address">
                        </div>
                        <!-- Organisation -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="organization" class="mb-1 text-gray-700 font-medium">Organization</label>
                            <select name="referrer_organization_id" id="">
                                <option value="">---select one---</option>
                                @foreach ($organizations as $organization)
                                    <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                @endforeach

                            </select>
                        </div>
                    </div>

                    <div class="flex justify-between gap-3 mt-1 p-2">
                        <!-- Parent Organisation -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="parent-organization" class="mb-1 text-gray-700 font-medium">Parent
                                Organisation</label>
                            <select name="referrer_parent_organization_id" id="">
                                <option value="">---select one---</option>
                                @foreach ($organizations as $organization)
                                    <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Referral Source -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="referral-source" class="mb-1 text-gray-700 font-medium">Referral
                                Source</label>
                            <input type="text" id="referral-source" name="referrer_source"
                                class="border border-gray-300 rounded p-2" placeholder="Enter referral source">
                        </div>

                        <!-- Sales Person -->
                        <div class="flex flex-col w-full md:w-1/2">
                            <label for="sales-person" class="mb-1 text-gray-700 font-medium">Sales Person</label>
                            <select name="referrer_sales_person_id" id="">
                                <option value="">---Select Sales Person---</option>
                                @foreach ($staffs as $staff)
                                    <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                </div>
                <h2 class="text-lg">Assigned Staff</h2>
                <hr class="mt-2">
                <div class=" flex justify-between mt-2">
                    <label for="" class="w-1/2">Staff</label>
                    <select name="assigned_staff" class="w-1/2 rounded" id="">
                        <option value="">---Select Assigned Staff---</option>
                        <option value="all_staff">All Staff</option>
                        <option value="admin">Admin</option>
                        <option value="field_technicians">Field Technicians</option>
                        @foreach ($staffs as $staff)
                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
    </form>
</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const projectTypeSelect = document.getElementById('project-type');
        const serviceTypeSelect = document.getElementById('service-type');

        const fetchServiceType = (projectTypeId, serviceTypeId = null) => {
            const url = projectTypeSelect.dataset.url.replace(':id', projectTypeId);
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    serviceTypeSelect.innerHTML = '<option value="">Select Service Type</option>';
                    Object.entries(data).forEach(([id, name]) => {
                        serviceTypeSelect.insertAdjacentHTML(
                            'beforeend',
                            `<option value="${id}" ${id == serviceTypeId ? 'selected' : ''}>${name}</option>`
                        );
                    });
                })
                .catch(error => console.error('Error Fetching Service Type:', error));
        };

        const initializeServiceType = () => {
            const selectedProjectTypeId = projectTypeSelect.value;
            const selectedServiceTypeId = serviceTypeSelect.value;

            serviceTypeSelect.innerHTML = '<option value="">Select Service Type</option>';
            if (selectedProjectTypeId) {
                fetchServiceType(selectedProjectTypeId, selectedServiceTypeId);
            }
        };

        initializeServiceType();

        projectTypeSelect.addEventListener('change', initializeServiceType);
    });

    function showSaveIconAndSave(input) {
        const saveIcon = document.getElementById('save-icon');
        const inputValue = input.value.trim();

        if (inputValue !== "") {

            saveIcon.textContent = "💾";

            saveIcon.classList.remove('hidden');

            saveToServer(inputValue)
                .then(() => {
                    saveIcon.textContent = "✅"; // Success icon
                })
                .catch(() => {
                    saveIcon.textContent = "❌"; // Error icon
                });
        } else {
            saveIcon.classList.add('hidden'); // Hide icon
        }
    }


    function inTheCustomers() {
        let inTheCustomer = document.getElementById('inTheCustomer');
        let selectedValue = inTheCustomer.value;

        if (selectedValue === "existing") {
            const customerList = document.querySelector('.customerList');
            const createCustomer = document.querySelector('.createCustomer');

            if (customerList.classList.contains('hidden')) {
                customerList.classList.remove('hidden');
            }
            if (!createCustomer.classList.contains('hidden')) {
                createCustomer.classList.add('hidden');
            }

        } else if (selectedValue === "createNew") {
            const customerList = document.querySelector('.customerList');
            const createCustomer = document.querySelector('.createCustomer');

            if (!customerList.classList.contains('hidden')) {
                customerList.classList.add('hidden');
            }
            if (createCustomer.classList.contains('hidden')) {
                createCustomer.classList.remove('hidden');
            }
        } else {
            const customerList = document.querySelector('.customerList');

            const createCustomer = document.querySelector('.createCustomer');
            if (!createCustomer.classList.contains('hidden')) {
                createCustomer.classList.add('hidden');
            }
            if (!customerList.classList.contains('hidden')) {
                customerList.classList.add('hidden');
            }
        }

    }

    function referralSources() {
        let referralSource = document.getElementById('referralSource');
        let selectedValue = referralSource.value;

        if (selectedValue === "existingReferralSource") {
            const referralSourceList = document.querySelector('.referralSourceList');
            const createReferralSource = document.querySelector('.createReferralSource');

            if (referralSourceList.classList.contains('hidden')) {
                referralSourceList.classList.remove('hidden');
            }
            if (!createReferralSource.classList.contains('hidden')) {
                createReferralSource.classList.add('hidden');
            }

        } else if (selectedValue === "addNewReferralSource") {
            const referralSourceList = document.querySelector('.referralSourceList');
            const createReferralSource = document.querySelector('.createReferralSource');

            if (!referralSourceList.classList.contains('hidden')) {
                referralSourceList.classList.add('hidden');
            }
            if (createReferralSource.classList.contains('hidden')) {
                createReferralSource.classList.remove('hidden');
            }
        } else {
            const referralSourceList = document.querySelector('.referralSourceList');

            const createReferralSource = document.querySelector('.createReferralSource');
            if (!createReferralSource.classList.contains('hidden')) {
                createReferralSource.classList.add('hidden');
            }
            if (!referralSourceList.classList.contains('hidden')) {
                referralSourceList.classList.add('hidden');
            }
        }

    }

    function insuranceInformation() {
        let insuranceInformation = document.getElementById('insurance-information');
        let selectedValue = insuranceInformation.value;

        if (selectedValue === "1") {
            const insuranceInformations = document.querySelector('.insuranceInformations');

            if (insuranceInformations.classList.contains('hidden')) {
                insuranceInformations.classList.remove('hidden');
            }

        } else if (selectedValue === "0") {
            const insuranceInformations = document.querySelector('.insuranceInformations');

            if (!insuranceInformations.classList.contains('hidden')) {
                insuranceInformations.classList.add('hidden');
            }
        } else {

            const insuranceInformations = document.querySelector('.insuranceInformations');

            if (!insuranceInformations.classList.contains('hidden')) {
                insuranceInformations.classList.add('hidden');
            }
        }

    }
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

@section('script')
@vite('resources/js/pages/gallery.js')
@endsection
