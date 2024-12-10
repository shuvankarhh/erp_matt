@php
    use Illuminate\Support\Facades\auth;
    $user = auth()->user();
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <link rel="icon" href="{{ asset('storage/images/' . $website_settings->favicon) }}">

    <link rel="logo" type="/image/png" href="{{ asset('storage/images/' . $website_settings->company_logo) }}">

    <meta name="referrer" content="origin-when-cross-origin">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="description" content="{{ $website_settings->seo_description }}">

    <meta property="og:site_name" content="{{ $website_settings->company_name }}">
    <meta property="og:type"          content="website" />
    <meta property="og:description"   content="{{ $website_settings->seo_description }}" />

    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="{{ $website_settings->seo_description }}">

    <meta name=”robots” content=”none”>

    <title>{{ $pagename }} - {{ $website_settings->company_name }} </title>

    {{-- BEGIN GLOBAL MANDATORY STYLES --}}
    <link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700'>
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/bootstrap/bootstrap.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="/css/plugins.css" />
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/users/login-1.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/ui-kit/custom-modal.css')}}" />
    {{-- END GLOBAL MANDATORY STYLES --}}

    
    {{-- BEGIN CUSTOM STYLE FILE --}}
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/ui-kit/notification/notify.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/umtt/dashboard-layout.css')}}" />


    
</head>
<body class="login">

    <form action="{{ $action }}" method="POST" class="form-login">
        @csrf
        
        <div class="row">
            <div class="col-md-12 text-center mb-4">
                <img alt="logo" src="{{ asset('storage/images/' . $website_settings->company_logo) }}" class="theme-logo" style="max-height: 50px;">
            </div>

            @if(Route::currentRouteName() == 'forgot_password.index')
                <div class="col-md-12">
                    <h4 style="font-weight: 600;color: #000;font-size: 1.125rem;">Recover Password</h4>
                    <p style="color: #000;">If you forgot your password, enter your email. A verification code will be sent to you.</p>
                </div>
            @endif

            @include('vendor._errors')
                {{ $slot }}
        </div>
    </form>
    
    {{-- BEGIN GLOBAL MANDATORY SCRIPTS --}}
    <script src="/js/libs/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap/popper.min.js"></script>
    <script src="/js/bootstrap/bootstrap.min.js"></script>
    {{-- END GLOBAL MANDATORY SCRIPTS --}}

    {{-- BEGIN CUSTOM SCRIPTS FILE --}}
    <script src="/js/ui-kit/notification/notify.js"></script>
    <script src="{{ mix('/js/umtt/common.js')}}"></script>
    <script src="{{ mix('/js/umtt/vendor/tauhid/time/time.js')}}"></script>
    {{-- END CUSTOM SCRIPTS FILE --}}

    @isset ($scripts)
        {{ $scripts }}
    @endisset
</body>
</html>