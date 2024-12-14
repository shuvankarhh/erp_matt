@php
    use App\Services\LocalTime;
    use App\Services\Photo;
@endphp

<x-dashboard-layout pagename="Customer Details">
    <br>
    <div class="row layout-spacing">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-heading">Solution Details</h4>
                    </div>
                </div>
                <div class="user-profile mb-primary">
                    <div class="card-body py-4">
                        <div class="row" style="background-image: {{ asset('storage/' . $solution->image_path ?? 'user.png') }}; background-repeat: no-repeat; background-position: right; height: 100%;">

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5">
                                <div class="media border-right px-5 pr-xl-5 pl-xl-0 user-header-media">
                                    <div class="profile-pic-wrapper">
                                        {{-- <div class="custom-image-upload-wrapper circle mx-xl-auto">
                                            <div class="image-area d-flex ">
                                                <img id="preview_image" class="profile_photo rounded-circle" width="150" height="150" src="" alt="customer">
                                            </a></div>
                                            <div class="input-area">
                                            </div>
                                        </div> --}}
                                    </div>
                                    
                                    <div class="media-body user-info-header">
                                        <h4>
                                            {{$solution->name}}
                                        </h4>
                                        {{-- <br>
                                        @if($customer->user->acting_status == 1)
                                            <span class="badge badge-pill badge-success user-status">Active</span>
                                        @elseif($customer->user->acting_status == 0)
                                            <span class="badge badge-pill badge-danger user-status">Inactive</span>
                                        @endif
                                        <p class="text-muted mt-2 mb-0">{{$customer->user ? $customer->user->email : '-'}}</p>
                                        <p class="text-primary">
                                            {{$customer->user ? $customer->user->user_role->name : '-'}}
                                        </p> --}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-7">
                                <div
                                    class="user-details px-5 px-sm-5 px-md-5 px-lg-0 px-xl-0 mt-5 mt-sm-5 mt-md-0 mt-lg-0 mt-xl-0">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                            <div class="border-right custom">
                                                {{-- <div class="media mb-4 mb-xl-5">
                                                    <div class="align-self-center mr-3"><svg xmlns="" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-phone">
                                                            <path
                                                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                                                            </path>
                                                        </svg></div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-0">Contact:</p>
                                                        <p class="mb-0">
                                                            {{$customer->contact->phone ?? '-'}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="media mb-4 mb-xl-0">
                                                    <div class="align-self-center mr-3"><svg xmlns="" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" class="feather feather-map-pin">
                                                            <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                                            <circle cx="12" cy="10" r="3"></circle>
                                                        </svg></div>
                                                    <div class="media-body">
                                                        <p class="text-muted mb-0">Address:</p>
                                                        <p class="mb-0">
                                                            damo address
                                                        </p>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                            <div class="media mb-4 mb-xl-5">
                                                <div class="align-self-center mr-3"><svg xmlns="" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round" class="feather feather-calendar">
                                                        <rect x="3" y="4" width="18" height="18"
                                                            rx="2" ry="2"></rect>
                                                        <line x1="16" y1="2" x2="16" y2="6">
                                                        </line>
                                                        <line x1="8" y1="2" x2="8" y2="6">
                                                        </line>
                                                        <line x1="3" y1="10" x2="21" y2="10">
                                                        </line>
                                                    </svg></div>
                                                <div class="media-body">
                                                    <p class="text-muted mb-0">Created:</p>
                                                    <p class="mb-0">{{LocalTime::datetime($solution->created_at)}}</p>
                                                </div>
                                            </div>
                                            <div class="media mb-0 mb-xl-0">
                                                <div class="align-self-center mr-3"><span class="flaticon-user-1 fs-20"></span></div>
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
            </div>
        </div>
    </div>

    
</x-dashboard-layout>