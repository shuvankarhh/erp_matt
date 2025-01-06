@extends('layouts.vertical', ['title' => 'Custom Form', 'sub_title' => 'Project', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/glightbox/dist/css/glightbox.min.css'])
@endsection

@section('content')
@section('script')
    @vite('resources/js/pages/main.js')
@endsection

<style>


</style>




<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="flex flex-row gap-4 border border-gray-300 p-4">
    <!-- Left section with Basic Fields -->
    <div class="flex-grow-0 bg-gray-100 p-4 w-1/4 ">
        
    </div>

    <!-- Right section with Drop Area -->
    <div class="flex-grow-0 border border-gray-300 p-4 w-3/4 bg-slate-50 flex flex-col">

        
    </div>
    
</div>


@endsection

@section('script')
    @vite('resources/js/pages/gallery.js')
@endsection
