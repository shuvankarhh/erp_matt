@php
    use Illuminate\Support\Facades\auth;
    $user1 = auth()->user();
@endphp

<x-dashboard-layout pagename="Profile">
    <x-slot name='css'>

        <style>

        </style>

    </x-slot>

    <br>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;">Profile</h4>
                        </div>
                    </div>
                </div>



                <div class="widget-content widget-content-area ">
                    <br>
                    <div class=" row justify-content-md-center" >
                        <div class="row "  style="width: 100%">
                            <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4" style="">
                                <div class="row justify-content-md-center col-12 m-4" >
                                    <div class="rounded-circle">
                                        <img id="preview_image" class="profile_photo rounded-circle" width="150" height="150" src="{{ $user_profile_photo_url }}" alt="image">
                                    </div>
                                    <div class="d-flex flex-column m-4">
                                        <div >
                                            <p style="color:rgb(0, 213, 255);font-size: 150%; font-weight: 900;">{{$user->name ?? null}}</p>
                                        </div>
                                        <div>
                                            @if ($user->user_role_id == 2)
                                                <p>{{$contact->contact->job_title ?? null}}</p>
                                            @elseif($user->user_role_id == 3)
                                                <p>{{$staff->designation->name ?? null}}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                              
                                <div class="card text-center mb-2">
                                    <div class="card-header">
                                      <ul class="nav nav-tabs card-header-tabs">
                                        <li class="nav-item">
                                          <a class="nav-link active" id="option1" href="#">Personal Info</a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link" id="option2" href="#">Address</a>
                                        </li>
                                        <li class="nav-item">
                                          <a class="nav-link" id="option3" href="#">Change Password</a>
                                        </li>
                                      </ul>
                                    </div>
                                    <div class="card-body">
                                        <div id="body1">
                                        @include('vendor._errors')
                                        <form action="{{ route('profile.update',['profile' => $user->encrypted_id()]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row m-2">

                                                <div class="col-sm-3 col-6 text_align_left">
                                                    Name
                                                </div>
                                                <div class="col-sm-1 col-6">
                                                    :
                                                </div>
                                                <div class="col-sm-8 col-12">
                                                    <input class="form-control mb-2" name="name" type="text" value="{{$user->name ?? null}}">
                                                </div>
                                            </div>
                                            <div class="row m-2">
                                                <div class="col-sm-3 col-6  text_align_left">
                                                    Email
                                                </div>
                                                <div class="col-sm-1 col-6" >
                                                    :
                                                </div>
                                                <div class="col-sm-8 col-12">
                                                     <input  class="form-control mb-2" name="email"  type="text" value="{{$user->email ?? null}}">
                                                </div>
                                            </div>

                                            @if ( $user->user_role_id == 2 )
                                                <div class="row m-2">
                                                    <div class="col-sm-3 col-6 text_align_left">
                                                        Phone
                                                    </div>
                                                    <div class="col-sm-1 col-6" >
                                                        :
                                                    </div>
                                                    <div class="col-sm-8 col-12">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend" style="width: 25%;">
                                                                <select class="form-control" name="phone_code">
                                                                    @foreach ($countries as $country)
                                                                        <option value="{{ json_decode($country->phone_codes)[0] }}"
                                                                            {{ $contact->contact->phone_code == json_decode($country->phone_codes)[0] ? 'selected' : '' }}>
                                                                            {{ $country->cca3 }}
                                                                            &nbsp;
                                                                            {{ json_decode($country->phone_codes)[0] }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                    
                                                            <input type="phone" class="form-control" placeholder="Phone" name="phone"
                                                                value="{{$contact->contact->phone}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                

                                                <div class="row m-2">
                                                    <div class="col-sm-3 col-6 text_align_left" >
                                                        Organization
                                                    </div>
                                                    <div class="col-sm-1 col-6" >
                                                        :
                                                    </div>
                                                    <div class="col-sm-8 col-12">
                                                        <select name="organization_id" id=""class="form-control mb-2" >
                                                            
                                                            @foreach ($organizations as $organization)
                                                                @if ($contact->contact->organization_id == $organization->id)
                                                                    <option value="{{ $organization->id }}" selected>{{ $organization->name }}</option>
                                                                @else
                                                                    <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="row m-2">
                                                    <div class="col-sm-3 col-6 text_align_left">
                                                        Job Title
                                                    </div>
                                                    <div class="col-sm-1 col-6" >
                                                        :
                                                    </div>
                                                    <div class="col-sm-8 col-12">
                                                        <input  class="form-control mb-2" name="job_title"  type="text" value="{{$contact->contact->job_title ?? null}}">
                                                    </div>
                                                </div>
                                            @endif

                                        @if ( $user->user_role_id == 3 )
                                        <div class="row m-2">
                                            <div class="col-sm-3 col-6 text_align_left">
                                                Phone
                                            </div>
                                            <div class="col-sm-1 col-6" >
                                                :
                                            </div>
                                            <div class="col-sm-8 col-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend" style="width: 25%;">
                                                        <select class="form-control" name="phone_code">
                                                            @foreach ($countries as $country)
                                                                <option value="{{ json_decode($country->phone_codes)[0] }}"
                                                                    {{ $staff->phone_code == json_decode($country->phone_codes)[0] ? 'selected' : '' }}>
                                                                    {{ $country->cca3 }}
                                                                    &nbsp;
                                                                    {{ json_decode($country->phone_codes)[0] }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
            
                                                    <input type="phone" class="form-control" placeholder="Phone" name="phone"
                                                        value="{{$staff->phone}}">
                                                </div>
                                            </div>
                                        </div>

                                        @endif


                                                
                                                <div class="row m-2">
                                                    <div class="col-sm-3 col-6 text_align_left">
                                                        Photo
                                                    </div>
                                                    <div class="col-sm-1 col-6">
                                                        :
                                                    </div>
                                                    <div class="col-sm-8 col-12">
                                                        <input  class="form-control mb-2" name="photo" type="file">
                                                    </div>
                                                </div>

                                            @if ( $user->user_role_id == 3 )
                                                
                                            @endif
                                            <div class="d-flex flex-row-reverse">
                                                <div class="m-4">
                                                    <button class="btn btn-success" type="submit" >Save</button>
                                                </div>
                                            </div>

                                        </form>
                                        </div>

                                        <div id="body2">

                                        </div>

                                        <div id="body3">
                                        <form action="{{ route('change_password',['id' => $user->encrypted_id() ]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row m-2">
                                                <div class="col-sm-3 col-6 text_align_left">
                                                    Old Password
                                                </div>
                                                <div class="col-sm-1 col-6" >
                                                    :
                                                </div>
                                                <div class="col-sm-8 col-12">
                                                    <input type="password" placeholder="Enter old password" class="form-control mb-2" name="old_password" >
                                                </div>
                                            </div>

                                            <div class="row m-2">
                                                <div class="col-sm-3 col-6 text_align_left">
                                                    New Password
                                                </div>
                                                <div class="col-sm-1 col-6" >
                                                    :
                                                </div>
                                                <div class="col-sm-8 col-12">
                                                    <input type="password"  placeholder="Enter new password" class="form-control mb-2" name="new_password"  >
                                                </div>
                                            </div>

                                            <div class="row m-2">
                                                <div class="col-sm-3 col-6 text_align_left">
                                                    Confirm Password
                                                </div>
                                                <div class="col-sm-1 col-6" >
                                                    :
                                                </div>
                                                <div class="col-sm-8 col-12">
                                                    <input type="password"  placeholder="Enter confirm password" class="form-control mb-2" name="con_password"  >
                                                </div>
                                            </div>

                                            
                                            <div class="d-flex flex-row-reverse">
                                                <div class="">
                                                    <button type="submit" class="btn btn-success">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- <div class="widget-content widget-content-area">
                    <div class=" row justify-content-md-center col-12" >
                        @include('vendor._errors')
                        <form action="{{ route('profile.update',['profile' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="d-flex flex-column col-12 mb-4">
                                
                                <div class="d-flex justify-content-center mb-4">
                                    <a class="rounded-circle">
                                        <img id="preview_image" class="profile_photo rounded-circle" width="150" height="150" src="storage/{{$user->scheme_user_photos->path ?? 'user.png'}}" alt="product">
                                    </a>
                                </div>

                                <div class="d-flex justify-content-center ">
                                    <input type="file" name="photo" id="photo_input" style="display: none;">
                                    <button type="button" class="btn btn-primary"  onclick="document.getElementById('photo_input').click()">Change Photo</button>
                                    <span id="photo_name_output" style="margin-left: 10px;"></span>
                                </div>

                            </div>

                            <div class=" row justify-content-md-center col-12 mb-4">
                                <div class="justify-content-start col-12">
                                    <label>Full Name <span  style="color:red" >*</span></label>
                                </div>
                                <input type="text" class="form-control" placeholder="Full Name" name="full_name" value="{{ old('full_name') ?? $user->full_name }}" >
                            </div>
                            @php

                                $string = "$user->username";
                                $pos = strpos($string,"_");
                                $prefix = substr($string, 0, $pos + 1);
                                $suffix = substr($string, $pos + 1);
                                
                            @endphp

                            <div class=" row justify-content-md-center col-12 mb-4">
                                <div class="justify-content-start col-12">
                                    <label>Username <span  style="color:red" >*</span></label>
                                </div>

                                <input type="text" style="width: 20%" name="user_name_code" id="inputFIDetails" class="form-control" value="{{ old('user_name_code') ?? $prefix }}" required readonly>
                                <input type="text" style="width: 80%" name="username" id="userName2" class="form-control" placeholder="Username" value="{{ old('username') ?? $suffix }}" required>

                            </div>

                            @if ( $user1->user_role_id != 1)
                                <div class=" row justify-content-md-center col-12 mb-4">
                                    <div class="justify-content-start col-12">
                                        <label>Organization <span  style="color:red" >*</span></label>
                                    </div>
                                    <input  class="form-control" placeholder="Organization" value="{{ $user->scheme_fi?->fi_full_name  }}" readonly>
                                </div>
                            @endif

                            

                            <div class=" row justify-content-md-center col-12 mb-4">
                                <div class="justify-content-start col-12">
                                    <label>Email <span  style="color:red" >*</span></label>
                                </div>
                                <input  class="form-control" placeholder="Email" name="email" value="{{ old('email') ?? $user->email }}" required>
                            </div>

                            <div class=" row justify-content-md-center col-12 mb-4">
                                <div class="justify-content-start col-12">
                                    <label>Phone<span  style="color:red" >*</span></label>
                                </div>
                                <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ old('phone') ?? $user->phone ?? null }}">
                            </div>

                            <div class=" row justify-content-md-center col-12 mb-4">
                                <div class="justify-content-start col-12">
                                    <label>Phone<span  style="color:red" >*</span></label>
                                </div>
                                <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{ old('phone') ?? $user->phone ?? null }}" >
                            </div>



                            <div class="d-flex justify-content-center ">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </form>
                    </div> 
                </div>--}}
            </div>
        </div>
    </div>

    <x-slot name='scripts'>
        <script src='/js/profile.js'></script>

    </x-slot>
</x-dashboard-layout>