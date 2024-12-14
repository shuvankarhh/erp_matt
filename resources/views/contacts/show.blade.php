@php
    use App\Services\LocalTime;
    use App\Services\Photo;
@endphp

<x-dashboard-layout pagename="Contact Details">
    <br>
    <div class="row layout-spacing">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-heading">Contact Details</h4>
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
                                        <p style="color:rgb(0, 213, 255);font-size: 150%; font-weight: 900;">
                                            {{$contact?$contact->name : '' }}
                                        </p>
                                        {{-- @if ($contact->status == 1)
                                            <span class="badge badge-pill badge-success user-status">Active</span>
                                        @elseif($contact->status == 0)
                                            <span class="badge badge-pill badge-danger user-status">Inactive</span>
                                        @endif --}}
                                        {{-- <p class="text-muted mt-2 mb-0">{{$customer->user ? $customer->user->email : '-'}}</p> --}}
                                        <p>
                                            {{-- {{$customer->user ? $customer->user->user_role->name : '-'}} --}}
                                            {{ $contact ? $contact->job_title : '' }}
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
                                                            {{ $contact->phone_code ?? null }}{{ $contact->phone ?? null }}
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
                                                            {{ $contact->address ? $contact->address->address_line_1 : '' }},
                                                            {{ $contact->address ? $contact->address->address_line_2 : '' }}
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
                                                        {{ LocalTime::datetime($contact->created_at ?? null) }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="media mb-0 mb-xl-0">
                                                <div class="align-self-center mr-3"><span
                                                        class="flaticon-user-1 fs-20"></span></div>
                                                <div class="media-body">
                                                    <a href="{{ route('organizations.index') }}">
                                                        <p class="text-muted mb-0">Organization:</p>
                                                        <p class="mb-0">
                                                            {{ $contact->organization->name ?? null }}
                                                        </p>
                                                    </a>
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
                                                <label for="name"
                                                    class="col-3 col-form-label float-start"><strong>Name</strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $contact->name ?? null }}</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="owner"
                                                    class="col-3 col-form-label float-start"><strong>Owner</strong></label>
                                                <div class="col-8 float-start">
                                                    <span> {{ $contact->owner->name ?? null }} </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="email"
                                                    class="col-3 col-form-label float-start"><strong>Email</strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $contact->email ?? null }}</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="phone"
                                                    class="col-3 col-form-label float-start"><strong>Phone</strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $contact->phone_code ?? null }}{{ $contact->phone ?? null }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="address"
                                                    class="col-3 col-form-label float-start"><strong>Country</strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $country->name ?? null }}</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="timezone"
                                                    class="col-3 col-form-label float-start"><strong>State</strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $state->name ?? null }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="address"
                                                    class="col-3 col-form-label float-start"><strong>City</strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $city->name ?? null }}</span>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="photo"
                                                    class="col-3 col-form-label float-start"><strong>
                                                        Postal Code
                                                    </strong></label>
                                                <div class="col-8 float-start">
                                                    <span>{{ $address->postal_code ?? null }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="photo"
                                                    class="col-3 col-form-label float-start"><strong>Life Cycle
                                                        Stage</strong></label>
                                                <div class="col-8 float-start">
                                                    @isset($contact->stage)
                                                        @if ($contact->stage == 1)
                                                            <span>Subscriber</span>
                                                        @elseif($contact->stage == 2)
                                                            <span>Lead</span>
                                                        @elseif($contact->stage == 3)
                                                            <span>Opportunity</span>
                                                        @elseif($contact->stage == 4)
                                                            <span>Customer</span>
                                                        @elseif($contact->stage == 5)
                                                            <span>Evangelist</span>
                                                        @elseif($contact->stage == 6)
                                                            <span>Other</span>
                                                        @else
                                                            <span> No Data </span>
                                                        @endif
                                                    @endisset

                                                </div>
                                            </div>

                                            @if ($contact)
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                    <label for="engagement"
                                                        class="col-3 col-form-label float-start"><strong>Engagement</strong></label>
                                                    <div class="col-8 float-start">
                                                        @isset($contact->engagement)
                                                            @if ($contact->engagement == 1)
                                                                <span>Hot</span>
                                                            @elseif($contact->engagement == 2)
                                                                <span>Warm</span>
                                                            @elseif($contact->engagement == 3)
                                                                <span>Cold</span>
                                                            @else
                                                                <span>No Data</span>
                                                            @endif
                                                        @endisset
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="mb-3 row">
                                            @if ($contact)
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                    <label for="lead_status"
                                                        class="col-3 col-form-label float-start"><strong>Lead
                                                            Status</strong></label>
                                                    <div class="col-8 float-start">
                                                        @isset($contact->lead_status)
                                                            @if ($contact->lead_status == 1)
                                                                <span>New</span>
                                                            @elseif($contact->lead_status == 2)
                                                                <span>Contacted</span>
                                                            @elseif($contact->lead_status == 3)
                                                                <span>In Progress</span>
                                                            @elseif($contact->lead_status == 4)
                                                                <span>Qualified</span>
                                                            @elseif($contact->lead_status == 5)
                                                                <span>Unqualified</span>
                                                            @elseif($contact->lead_status == 6)
                                                                <span>Attempted to contact</span>
                                                            @else
                                                                <span>No Data</span>
                                                            @endif
                                                        @endisset
                                                    </div>
                                                </div>
                                            @endif

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="source"
                                                    class="col-3 col-form-label float-start"><strong>Source</strong></label>
                                                <div class="col-8 float-start">
                                                    {{ $contact->source->name ?? null }}
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="tags"
                                                    class="col-3 col-form-label float-start"><strong> Tags
                                                    </strong></label>
                                                <div class="col-8 float-start">
                                                    @if ($tags->isNotEmpty())
                                                        @foreach ($tags as $tag)
                                                            {{ $tag->name }}
                                                            @if (!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        No Tags
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-6">
                                                <label for="acting_status"
                                                    class="col-3 col-form-label float-start"><strong>Archive
                                                        Status</strong></label>
                                                <div class="col-8 float-start">
                                                        @isset($contact->acting_status)
                                                            @if($contact->acting_status == 1)
                                                                <span>Active</span>
                                                            @elseif($contact->acting_status == 2)
                                                                <span>Archived</span>
                                                            @else
                                                                <span>  </span>
                                                            @endif
                                                        @endisset
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
