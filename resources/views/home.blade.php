<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

    <link rel="icon" href="{{ asset('storage/images/' . $website_settings->favicon) }}">

    <link rel="logo" type="/image/png" href="{{ asset('storage/images/' . $website_settings->company_logo) }}">

    <meta name="referrer" content="origin-when-cross-origin">

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <meta name="description" content="{{ $website_settings->seo_description }}">

    <meta property="og:site_name" content="{{ $website_settings->company_name }}">
    <meta property="og:type" content="website" />
    <meta property="og:description" content="{{ $website_settings->seo_description }}" />

    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="{{ $website_settings->seo_description }}">

    <meta name=”robots” content=”none”>

    <title> Home - {{ $website_settings->company_name }} </title>

    {{-- BEGIN GLOBAL MANDATORY STYLES --}}
    <link rel="stylesheet" type="text/css" href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700'>

    @vite(['resources/scss/app.scss', 'resources/scss/icons.scss'])
    @vite(['resources/js/head.js', 'resources/js/config.js'])
</head>

{{-- <body style="background-color: #c7f9ed"> --}}

<body>
    <div class="flex justify-between items-center" style="background-color: white">
        {{--
        <div class="p-4 ml-4">
            <img src="{{ asset('storage/images/' . $website_settings->company_logo) }}" alt="Logo" --}}
        {{-- style="max-height: 60px; max-width: 200px; margin-bottom: 10px; margin-right: 15px;" --}}
        {{-- >
        </div> --}}

        <div class="p-4 pl-8">
            <img src="{{ asset('storage/images/' . $website_settings->company_logo) }}" alt="Logo"
                class="h-8 w-auto">
        </div>

        <div class="p-4">
            <a class="bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-700"
                href="{{ route('login') }}">Login</a>
            {{-- <a class="btn btn-primary" href="{{ route('login') }}">Login</a> --}}
            <a class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-700"
                href="{{ route('registration') }}">Registration</a>
            {{-- <a class="btn btn-primary" href="{{ route('registration') }}">Registration</a> --}}
        </div>
    </div>


    <div class="flex justify-center">
        <p style="weight:90%;font-size:100%;padding:18%"> <b>*Under Construction*</b><br>
            Thank you for visiting our website. We're currently working to develop all the features <br>of this website.
            Exciting changes are on the way!</p>
    </div>



</body>

</html>
