@php
    use App\Services\LocalTime;
    use App\Services\Photo;
@endphp

<x-dashboard-layout pagename="Organization Details">


    <x-slot name='css'>

        {{-- BEGIN PAGE LEVEL CUSTOM STYLES --}}
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">

        {{-- END PAGE LEVEL CUSTOM STYLES --}}

        {{-- BEGIN UMTT CUSTOM STYLES --}}
        <link rel="stylesheet" type="text/css" href="/css/umtt/datatable.css" />
        {{-- END UMTT CUSTOM STYLES --}}

        <style>
            .table-scrollable {
                max-height: 296px;
                overflow-y: auto;
            }
        </style>

    </x-slot>

    <br>

    <div class="row layout-spacing">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-heading">Organization Details</h4>
                    </div>
                </div>
                <div class="user-profile mb-primary">
                    <div class="card-body py-4">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5">
                                <div class="media px-5 pr-xl-5 pl-xl-0 user-header-media">
                                    {{-- <div class="profile-pic-wrapper">
                                        <div class="custom-image-upload-wrapper circle mx-xl-auto">
                                            <div class="image-area d-flex "><img id="imageResult"
                                                    src=""
                                                    alt class="img-fluid mx-auto my-auto"></div>
                                            <div class="input-area">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="media-body user-info-header">
                                        <h4>
                                            {{ $organization ? $organization->name : '-' }}
                                        </h4>
                                        {{-- @if ($contact->status == 1)
                                            <span class="badge badge-pill badge-success user-status">Active</span>
                                        @elseif($contact->status == 0)
                                            <span class="badge badge-pill badge-danger user-status">Inactive</span>
                                        @endif --}}
                                        {{-- <p class="text-muted mt-2 mb-0">{{$customer->user ? $customer->user->email : '-'}}</p> --}}
                                        <p class="text-primary">
                                            {{-- {{$customer->user ? $customer->user->user_role->name : '-'}} --}}
                                            {{ $organization ? $organization->domain_name : '-' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-7">
                                <div
                                    class="user-details px-5 px-sm-5 px-md-5 px-lg-0 px-xl-0 mt-5 mt-sm-5 mt-md-0 mt-lg-0 mt-xl-0">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                            <div class="custom">
                                                <div class="media mb-4 mb-xl-5">
                                                    <div class="align-self-center mr-3"><svg xmlns=""
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-phone">
                                                            <path
                                                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                            </path>
                                                        </svg></div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-0">Contact:</p>
                                                        <p class="mb-0">
                                                            {{ $organization ? $organization->phone_code : '' }}{{ $organization ? $organization->phone : '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="media mb-4 mb-xl-0">
                                                    <div class="align-self-center mr-3"><svg xmlns=""
                                                            width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-map-pin">
                                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z">
                                                            </path>
                                                            <circle cx="12" cy="10" r="3"></circle>
                                                        </svg>
                                                    </div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-0">Address:</p>
                                                        <p class="mb-0">
                                                            {{ $organization->address ? $organization->address->address_line_1  . ', ' : '' }} {{ $organization->address ? $organization->address->address_line_2 : '' }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                            <div class="media mb-4 mb-xl-5">
                                                <div class="align-self-center mr-3"><svg xmlns="" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-calendar">
                                                        <rect x="3" y="4" width="18" height="18" rx="2"
                                                            ry="2"></rect>
                                                        <line x1="16" y1="2" x2="16"
                                                            y2="6">
                                                        </line>
                                                        <line x1="8" y1="2" x2="8"
                                                            y2="6">
                                                        </line>
                                                        <line x1="3" y1="10" x2="21"
                                                            y2="10">
                                                        </line>
                                                    </svg></div>
                                                <div class="media-body">
                                                    <p class="text-muted mb-0">Created:</p>
                                                    <p class="mb-0">
                                                        {{ LocalTime::datetime($organization->created_at ?? null) }}</p>
                                                </div>
                                            </div>
                                            <div class="media mb-0 mb-xl-0">
                                                <div class="align-self-center mr-3"><span
                                                        class="flaticon-user-1 fs-20"></span></div>
                                                <div class="media-body">
                                                    <p class="text-muted mb-0">Stakeholder Type:</p>
                                                    <p class="mb-0">
                                                        {{-- {{ $organization ? $organization->stakeholder_type : '' }} --}}
                                                        @isset($organization->stakeholder_type)
                                                            @if ($organization->stakeholder_type == 1)
                                                                <span> Prospect </span>
                                                            @elseif($organization->stakeholder_type == 2)
                                                                <span> Partner </span>
                                                            @elseif($organization->stakeholder_type == 3)
                                                                <span> Reseller </span>
                                                            @elseif($organization->stakeholder_type == 4)
                                                                <span> Vendor </span>
                                                            @elseif($organization->stakeholder_type == 5)
                                                                <span> Other </span>
                                                            @else
                                                                <span>No Data</span>
                                                            @endif
                                                        @endisset
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="">
                    <div class="card-body ">
                        <div class="col-md-12 pl-md-3 pt-md-0 pt-sm-4 pt-4">
                            <div class="tab-content px-primary">
                                <div id="Personal Details-0" class="tab-pane fade active show">
                                    <div class="d-flex justify-content-between">
                                        <h5
                                            class="d-flex align-items-center text-capitalize mb-0 title tab-content-header">
                                            Details</h5>
                                    </div>
                                    <hr>
                                    <div class="content py-primary">

                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="phone"
                                                    class="col-3 col-form-label float-start"><strong> Name
                                                    </strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $organization->name ?? null }}</span>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="name"
                                                    class="col-3 col-form-label float-start"><strong> Domain
                                                        Name </strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $organization->domain_name ?? null }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="email"
                                                    class="col-3 col-form-label float-start"><strong> Email
                                                    </strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $organization->email ?? null }}</span>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="phone"
                                                    class="col-3 col-form-label float-start"><strong> Phone
                                                    </strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $organization->phone_code ?? null }}{{ $organization->phone ?? null }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="owner_id"
                                                    class="col-3 col-form-label float-start"><strong> Owner
                                                    </strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $organization->owner->name ?? null }}</span>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="industry_id"
                                                    class="col-3 col-form-label float-start"><strong> Industry
                                                    </strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $organization->industry->name ?? null }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="address"
                                                    class="col-3 col-form-label float-start"><strong>Number of
                                                        Employees</strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $organization->number_of_employees ?? null }}</span>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="address"
                                                    class="col-3 col-form-label float-start"><strong>Annual
                                                        Revenue</strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $organization->annual_revenue ?? null }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="address"
                                                    class="col-3 col-form-label float-start"><strong> Stakeholder Type
                                                    </strong></label>
                                                <div class="col-8 float-start">
                                                    @isset($organization->stakeholder_type)
                                                        @if ($organization->stakeholder_type == 1)
                                                            <span> Prospect </span>
                                                        @elseif($organization->stakeholder_type == 2)
                                                            <span> Partner </span>
                                                        @elseif($organization->stakeholder_type == 3)
                                                            <span> Reseller </span>
                                                        @elseif($organization->stakeholder_type == 4)
                                                            <span> Vendor </span>
                                                        @elseif($organization->stakeholder_type == 5)
                                                            <span> Other </span>
                                                        @else
                                                            <span>No Data</span>
                                                        @endif
                                                    @endisset
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="address"
                                                    class="col-3 col-form-label float-start"><strong>Time
                                                        Zone</strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $organization->timezone->name ?? null }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <label for="address"
                                                    class="col-3 col-form-label float-start"><strong>Description</strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $organization->description ?? null }}</span>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row layout-spacing mt-5">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div
                            class="col-xl-12 col-md-12 col-sm-12 col-12 d-flex justify-content-between align-items-lg-center p-3">
                            <h4 class="card-heading"> Contacts </h4>
                            <div class="buttons">
                                <a class="btn btn-info"
                                    href="{{ route('contacts.index', ['organization' => $organization->encrypted_id()]) }}">
                                    View All
                                </a>
                                <a class="btn btn-info"
                                href="{{ route('contacts.create', ['organization' => $organization->encrypted_id()]) }}">
                                Add Contact
                            </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="widget-content widget-content-area">

                    <div class="table-responsive mb-4 style-1">

                        <table id="contactTable" class="table style-1  table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Phone </th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($contacts->isEmpty())
                                    <tr>
                                        <td class="text-center font-weight-bold" colspan="5"> No Data Available...
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($contacts as $key => $contact)
                                        <tr>
                                            <td> {{ ++$key }} </td>
                                            <td>
                                                <a
                                                    href="{{ route('contacts.show', ['contact' => $contact->encrypted_id()]) }}">
                                                    {{ $contact->name ?? null }}
                                                </a>
                                            </td>
                                            <td> {{ $contact->email ?? null }} </td>
                                            <td> {{ $contact->phone_code ?? null }}{{ $contact->phone ?? null }} </td>
                                            <td>
                                                <div class="dropleft" style="text-align: center;">
                                                    <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="flaticon-dot-three"
                                                            style="font-size: 17px;color: #1a73e9;">
                                                        </i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('contacts.show', ['contact' => $contact->encrypted_id()]) }}">
                                                            Show
                                                        </a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('contacts.edit', ['contact' => $contact->encrypted_id()]) }}">
                                                            Edit
                                                        </a>
                                                        <button class="dropdown-item"
                                                            onclick="simpleResourceDelete('{{ $contact->name }}', '{{ route('contacts.destroy', ['contact' => $contact->encrypted_id()]) }}')">
                                                            Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    {{-- {!! $pagination !!} --}}
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row layout-spacing">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-4">
                    <div class="d-flex justify-content-between align-items-center p-1">
                        <h4 class="card-heading">Contacts</h4>
                        <a class="btn btn-info"
                            onclick="createContactModal('{{ route('organizations.contacts.createModal', ['organization' => $organization->encrypted_id()]) }}')">
                            Add Contact </a>
                    </div>
                </div>
                <div class="card-body ">

                    <div class="table-responsive mb-4 style-1 table-scrollable">

                        <table class="table style-1  table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> No </th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td> {{ App\Services\Datatable::serialNum() }} </td>

                                        <td>
                                            <a
                                                href="{{ route('contacts.show', ['contact' => $contact->encrypted_id()]) }}">
                                                {{ $contact->name ?? null }}
                                            </a>
                                        </td>

                                        <td> {{ $contact->email ?? null }} </td>

                                        <td>
                                            <div class="dropleft" style="text-align: center;">
                                                <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="flaticon-dot-three"
                                                        style="font-size: 17px;color: #1a73e9;"></i>
                                                </a>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        onclick="editContactModal('{{ route('organizations.contacts.editModal', ['contact' => $contact->encrypted_id()]) }}')">
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item"
                                                        href="{{ route('contacts.show', ['contact' => $contact->encrypted_id()]) }}">
                                                        Show
                                                    </a>
                                                    <button class="dropdown-item"
                                                        onclick="simpleResourceDelete('{{ $contact->name }}', '{{ route('contacts.destroy', ['contact' => $contact->encrypted_id()]) }}')">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <x-slot name='scripts'>
        <script src="/js/umtt/biddings.js"></script>

        <script>
            $('#contactTable').DataTable({
                paging: false,
                searching: false,
                info: false,
            });
        </script>

        <script>
            let createOrganization = async (url) => {
                hideAllNotification();
                fetch(url, {
                        method: "GET",
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                    })
                    .then(response => response.text())
                    .then(responseText => {
                        let responseJson = JSON.parse(responseText);
                        console.log(responseJson);
                        if (responseJson.response_type == 0) {
                            showErrorsInNotifi(responseJson.response_error);
                        } else {
                            document.getElementById('generalModalTop').innerHTML = responseJson.response_body;
                            displayModalTop();

                        }
                    });
            };
        </script>

        <script>
            let createContactModal = async (url) => {
                hideAllNotification();
                fetch(url, {
                        method: "GET",
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                    })
                    .then(response => response.text())
                    .then(responseText => {
                        let responseJson = JSON.parse(responseText);
                        if (responseJson.response_type == 0) {
                            showErrorsInNotifi(responseJson.response_error);
                        } else {
                            document.getElementById('generalModalTop').innerHTML = responseJson.response_body;
                            displayModalTop();

                            // $('#contact_tags').select2({
                            //     multiple: true,
                            // });
                            $('#contact_tags').select2({
                                dropdownParent: $('#generalModalTop'),
                                multiple: true,
                            });
                            $('body').on('shown.bs.modal', '.modal', function() {
                                $(this).find('select').each(function() {
                                    var dropdownParent = $(document.body);
                                    if ($(this).parents('.modal.in:first').length !== 0)
                                        dropdownParent = $(this).parents('.modal.in:first');
                                    $(this).select2({
                                        dropdownParent: dropdownParent
                                    });
                                });
                            });
                        }
                    });
            };

            let editContactModal = async (url) => {
                hideAllNotification();
                fetch(url, {
                        method: "GET",
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                    })
                    .then(response => response.text())
                    .then(responseText => {
                        let responseJson = JSON.parse(responseText);
                        if (responseJson.response_type == 0) {
                            showErrorsInNotifi(responseJson.response_error);
                        } else {
                            document.getElementById('generalModalTop').innerHTML = responseJson.response_body;
                            displayModalTop();

                            $('#contact_tags').select2({
                                multiple: true,
                            });
                        }
                    });
            };
        </script>
    </x-slot>
</x-dashboard-layout>
