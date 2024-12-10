@php
    use App\Services\LocalTime;
    use Illuminate\Support\Facades\auth;
    $user = auth()->user();
@endphp
{{-- <li class="nav-item dropdown notification-dropdown ml-3">
    <a href="javascript:void(0);" class="nav-link dropdown-toggle" id="notificationDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onclick="makeNotificationsSeen('{{ route('make_notifications_seen') }}')">
        <span class="flaticon-bell-4"></span>
        @if($unseen > 0)
            <span class="badge badge-success" id="unseen_notification_number">{{ $unseen }}</span>
        @endif
    </a>
    <div class="dropdown-menu position-absolute" aria-labelledby="notificationDropdown" style="left: -225px;">
        <a class="dropdown-item title" href="javascript:void(0);">
            <i class="flaticon-bell-13 mr-3"></i> <span>You have {{ $unseen }} unseen notifications</span>
        </a>

        <div class="dropdown-item text-center  p-1">
            <div class="notification-list ">
                @foreach($notifications as $notification)
                    <div class="notification-item position-relative  mb-3" @if($notification->is_seen == 0)style="background-color: #edf4fe;"@endif>  
                        <h6 class="mb-1 notification_description">
                            @isset($notification->url)<a href="{{ $notification->url }}">@endif
                                {!! $notification->description !!}
                            @isset($notification->url)</a>@endif
                        </h6>
                        <p><span class="meta-time">{{ LocalTime::datetime($notification->created_at) }}</span></p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</li> --}}
<li class="nav-item dropdown user-profile-dropdown ml-lg-0 mr-lg-2 ml-3 order-lg-0 order-1">
    <p style="padding:10px ;font-weight: 600; margin-top:8px"> Welcome {{$user->name}}<p>
</li>


<li class="nav-item dropdown user-profile-dropdown ml-lg-0 mr-lg-2 ml-3 order-lg-0 order-1">
    
    <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="flaticon-user-6"></span>
    </a>

    <div class="dropdown-menu  position-absolute" aria-labelledby="userProfileDropdown">

        <a class="dropdown-item" href="{{ route('profile.index') }}">
            <i class="mr-1 flaticon-user-6"></i> <span>Profile</span>
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('reset_password.index') }}">
            <i class="mr-1 flaticon-lock-2"></i> <span>Reset Password</span>
        </a>
        <div class="dropdown-divider"></div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <a class="dropdown-item" href="" onclick="event.preventDefault(); this.closest('form').submit();">
                <i class="mr-1 flaticon-power-button"></i> <span>Log Out</span>
            </a>
        </form>
    </div>
</li>