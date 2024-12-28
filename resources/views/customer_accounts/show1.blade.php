@php
    use App\Services\LocalTime;
    use App\Services\Photo;
@endphp

<x-dashboard-layout pagename="Add Customer Account">
    <br>
    <div class="row layout-spacing">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-heading">Customer Account Details</h4>
                    </div>
                </div>
                <div class="user-profile mb-primary">
                    <div class="card-body py-4">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5">
                                <div class="media border-right px-5 pr-xl-5 pl-xl-0 user-header-media">
                                    <div class="profile-pic-wrapper">
                                        <div class="custom-image-upload-wrapper circle mx-xl-auto">
                                            <div class="image-area d-flex ">
                                                <img id="preview_image" class="profile_photo rounded-circle"
                                                    width="150" height="150" src="{{ asset('storage/user.png') }}"
                                                    alt="customer">
                                                </a>
                                            </div>
                                            <div class="input-area">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="media-body user-info-header">
                                        <h4>
                                            {{ $customer->contact->name }}
                                        </h4>
                                        <br>
                                        @if ($customer->user->acting_status == 1)
                                            <span class="badge badge-pill badge-success user-status">Active</span>
                                        @elseif($customer->user->acting_status == 0)
                                            <span class="badge badge-pill badge-danger user-status">Inactive</span>
                                        @endif
                                        <p class="text-muted mt-2 mb-0">
                                            {{ $customer->user ? $customer->user->email : '-' }}</p>
                                        <p class="text-primary">
                                            {{ $customer->user ? $customer->user->user_role->name : '-' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-7">
                                <div
                                    class="user-details px-5 px-sm-5 px-md-5 px-lg-0 px-xl-0 mt-5 mt-sm-5 mt-md-0 mt-lg-0 mt-xl-0">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                            <div class="border-right custom">
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
                                                            {{ $customer->contact->phone ?? '-' }}
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
                                                        </svg></div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-0">Address:</p>
                                                        <p class="mb-0">
                                                            damo address
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
                                                    <p class="mb-0">{{ LocalTime::datetime($customer->created_at) }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="media mb-0 mb-xl-0">
                                                <div class="align-self-center mr-3"><span
                                                        class="flaticon-user-1 fs-20"></span></div>
                                                <div class="media-body">
                                                    <p class="text-muted mb-0">Customer Group:</p>
                                                    <p class="mb-0">
                                                        VIP
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
                <div class="widget-content widget-content-area" style="height:100%">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-12">

                            <div class="d-flex justify-content-center mt-4">
                                <img id="preview_image" class="profile_photo rounded-circle" width="150" height="150" src="{{ asset('storage/user.png') }}" alt="customer">
                            </div>

                            <div class="d-flex justify-content-center mt-1">
                                <p id="coustomer_name_center">{{ $customer->contact->name }}</p>
                            </div>

                            <div class="d-flex justify-content-center" >
                                <p>{{ $customer->contact->job_title }}</p>
                            </div>

                            <div class="d-flex justify-content-center" >
                                <div class="rounded-circle p-2 border border-dark" style="background: rgb(255, 255, 255)"><span class="ti-email" style="color: black"></span></div>
                                <div class="rounded-circle p-2 ml-3 border border-dark" style="background: rgb(255, 255, 255)"><span class="flaticon-telephone" style="color: black"></span></div>
                                <div class="rounded-circle p-2 ml-3 border border-dark" style="background: rgb(255, 255, 255)"><span class="flaticon-left-dot-menu" style="color: black"></span></div>
                            </div>

                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12"  style="background: rgb(241, 241, 241)">








                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-12">
                            <p class="mt-4 font-weight-bold">Company</p>
                            <div class="m-2">
                                <p class="font-weight-normal text-primary">{{ $customer->contact->organization->name ?? null }}</p>
                                <a href="{{ $customer->contact->organization->domain_name ?? null }}">{{ $customer->contact->organization->domain_name ?? null }}</a>
                            </div>
                            <div class="m-2 p-3 border border-dark rounded">
                                <span class="flaticon-email" style="color: black"> {{ $customer->contact->organization->email ?? null }}</span><br>
                                <span class="flaticon-telephone" style="color: black"> {{ $customer->contact->organization->phone ?? null }}</span><br>
                            </div>
                            <br>
                            <div class="deals border-bottom ">

                                <div class="d-flex justify-content-between">
                                    <div class="font-weight-bold">Sales <span class="font-weight-bold text-success"> {{ $sales_count}}  </span></div>
                                    <div>
                                        <p type="button" id="myText" style="cursor: pointer;" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample2">Close</p>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col">
                                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                                            <div class="card card-body">
                                                <a href="{{ route('sales.create') }}">
                                                <div class="btn create d-flex justify-content-center border border-dark rounded mb-3"  >
                                                    <span class="ti-plus p-2 display-6"> Create One</span>
                                                </div></a>
                                                <div class="mb-3" style="max-height: 250px; overflow-y: auto;">
                                                    @foreach ($sales as $sale)
                                                        <div  class="border border-dark rounded mt-2 mb-2">
                                                            <p class="pt-2 pl-2">{{\Carbon\Carbon::parse($sale->created_at)->format('d-M-Y')}}</p>
                                                            <p class="pl-2"> <span>{{$sale->sale->name}}</span> <span class="pr-2" style="float: right; color:red">Final Price: {{$sale->sale->final_price}}</span></p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="deals border-bottom ">
                                <div class="d-flex justify-content-between">
                                    <div class="font-weight-bold">Tickets <span class="font-weight-bold text-success"> {{ $tickets_count}}  </span></div>
                                    <div>
                                        <p type="button" id="myText" style="cursor: pointer;" data-toggle="collapse" data-target="#multiCollapseTicket" aria-expanded="false" aria-controls="multiCollapseExample2">Close</p>
                                    </div>
                                </div>
                                <div class="row m-1">
                                    <div class="col">
                                        <div class="collapse multi-collapse " id="multiCollapseTicket">
                                            <div class="card card-body">
                                                <a href="{{ route('tickets.index') }}">
                                                <div class="btn create d-flex justify-content-center border border-dark rounded mb-3"  >
                                                    <span class="ti-plus p-2 display-6"> Create One</span>
                                                </div></a>
                                                <div class="mb-3" style="max-height: 250px; overflow-y: auto;">
                                                    @foreach ($tickets as $ticket)
                                                        <div  class="border border-dark rounded mt-2 mb-2">
                                                            <p class="pt-2 pl-2">{{\Carbon\Carbon::parse($ticket->created_at)->format('d-M-Y')}}</p>
                                                            <p class="pl-2"> <span>{{$ticket->ticket->name}}</span> </p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="status">
                                
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
                                            Personal Details</h5>
                                    </div>
                                    <hr>
                                    <div class="content py-primary">
                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="name"
                                                    class="col-3 col-form-label float-start">Name</label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $customer->contact->name }}</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="phone" class="col-3 col-form-label float-start">Phone
                                                    Number</label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $customer->contact->phone }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="address"
                                                    class="col-3 col-form-label float-start">Country</label>
                                                <div class="col-8 float-start">
                                                    <span>Demo Country</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="timezone"
                                                    class="col-3 col-form-label float-start">State</label>
                                                <div class="col-8 float-start">
                                                    <span>Demo State</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="address"
                                                    class="col-3 col-form-label float-start">City</label>
                                                <div class="col-8 float-start">
                                                    <span>Demo City</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="photo" class="col-3 col-form-label float-start">Zip
                                                    Code</label>
                                                <div class="col-8 float-start">
                                                    <span>5632</span>
                                                </div>
                                            </div>
                                        </div>
                                        @include('vendor._errors')
                                        
                                    </div>

            var textOptions = ['View', 'Close'];

                </div>
            </div>
        </div>
        <div class="col-12 mt-3">
            <div class="card">
                <div class="">
                    <div class="card-body ">
                        <div class="col-md-12 pl-md-3 pt-md-0 pt-sm-4 pt-4">
                            <div class="tab-content px-primary">
                                <div id="Personal Details-0" class="tab-pane fade active show">
                                    <div class="d-flex justify-content-between">
                                        <h5
                                            class="d-flex align-items-center text-capitalize mb-0 title tab-content-header">
                                            Billing Details</h5>
                                    </div>
                                    <hr>
                                    <div class="content py-primary">
                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="name"
                                                    class="col-3 col-form-label float-start">Name</label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $customer->user->name }}</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="phone" class="col-3 col-form-label float-start">Phone
                                                    Number</label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $customer->user->phone }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="address"
                                                    class="col-3 col-form-label float-start">Country</label>
                                                <div class="col-8 float-start">
                                                    <span>Demo Country</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="timezone"
                                                    class="col-3 col-form-label float-start">State</label>
                                                <div class="col-8 float-start">
                                                    <span>Demo State</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="address"
                                                    class="col-3 col-form-label float-start">City</label>
                                                <div class="col-8 float-start">
                                                    <span>Demo City</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="photo" class="col-3 col-form-label float-start">Zip
                                                    Code</label>
                                                <div class="col-8 float-start">
                                                    <span>5632</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

            // Add click event listener to the element
            myText.addEventListener('click', function() {
                // Change the text content based on the current index
                this.textContent = textOptions[currentIndex];

                // Toggle index between 0 and 1
                currentIndex = (currentIndex + 1) % textOptions.length;
            });
        </script>
    </x-slot>
</x-dashboard-layout>

                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>

