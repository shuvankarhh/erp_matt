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


<div class="flex flex-col gap-2 border border-gray-300 p-4 bg-slate-50">

    <div class="flex justify-between items-center">
        <h3 class="font-bold text-xl text-gray-500">Create Custom Form</h3>
        <div class="flex gap-2 items-center">
            <a href="" class="flex items-center gap-1">
                Learn more
                <i class="text-2xl mgc_question_line font-bold text-green-500"></i>
            </a>
        </div>
    </div>
    

    <div class="flex-grow-0  p-4">
        <div class="">
            <label for="search" class="text-l font-semibold ">Form name <span class="text-red-500 ">*</span></label>
            <input type="text" id="search" class="form-input mt-2  w-1/4" placeholder="Search">
        </div>

        <div class="mt-4">
            <label for="search" class="text-l font-semibold">Visibility <span class="text-red-500">*</span></label>
            <p class="text-xs mt-2 mb-2">Who would you like your Form to be visible to?</p>
            <select name="" id="" class="form-input mt-2 w-1/4">
                <option value="1">Public</option>
                <option value="2">Private</option>
            </select>
        </div>

        <div class="mt-4">
            <label for="search" class="text-l font-semibold">Display at </label>
            <p class="text-xs  mt-2 mb-2">Select if you want the Form to be seen at Check In or Check Out or Customer Satisfaction.</p>
            <select name="" id="" class="form-input mt-2  w-1/4">
                <option value="1">Public</option>
                <option value="2">Private</option>
            </select>
        </div>

    </div>

    <hr>

    <div class="flex justify-between items-center">
        <h3 class="font-bold text-xl text-gray-500 mt-2">Form Elements</h3>
        <div class="flex justify-end items-center mt-4">
            <div class="flex gap-2 items-center mr-2">
                <button class="bg-red-500 text-white font-medium py-2 px-4 rounded-full hover:bg-red-600 menu-icon">
                    <i class="mgc_add_line font-bold"></i> Cancel
                </button>
            </div>
            <div class="flex gap-2 items-center">
                <button class="bg-green-500 text-white font-medium py-2 px-4 rounded-full hover:bg-green-600 menu-icon">
                    <i class="mgc_add_line font-bold"></i> Save
                </button>
            </div>
        </div>
    </div>
    

    
    <div class="flex-grow-0 flex flex-col">

        <div class="field_zone">

        </div>


        <div class="mt-4">
            <button class="bg-green-500 text-white font-medium py-2 px-4 rounded-full hover:bg-green-600 menu-icon" onclick="openFieldModal()">
                <i class="mgc_add_line font-bold"></i> Create New field
            </button>
        </div>

    </div>
    
</div>
<div id="modal" class="fixed inset-0 flex items-start justify-center bg-gray-900 bg-opacity-50 hidden z-50 ">
    
    <div class="bg-white rounded-lg p-6 w-1/2 mt-8">
        <p class="font-bold text-xl mb-2">Create new field</p>
        <hr class="mb-2">
        <form action="{{ route('custom-form.store') }}" method="POST">
            @CSRF
            <div class="flex justify-between items-start mb-2">
                <label for="name" class="text-sm font-medium w-1/3 ">Field <span class="text-red-500">*</span></label>
                {{-- <input 
                    type="text" 
                    id="name" 
                    name="name" 
                    class="form-input  text-black pr-10 py-1 px-2 border border-gray-300 rounded  " 
                    required> --}}
                
                <textarea name="" id="" cols="30" rows="4" class="w-2/3"></textarea>

            </div>

            <div class="flex justify-between items-center mt-4">
                <label for="name" class="text-sm font-medium w-1/3">Field type <span class="text-red-500">*</span></label>
                <select name="" id="" class="form-input  text-black pr-10 py-1 px-2 border border-gray-300 rounded  w-2/3">
                    <option value="">dwa</option>
                </select>

            </div>

            <div class="flex justify-between items-center mt-4">
                <label for="name" class="text-sm font-medium w-1/3">Mandatory <span class="text-red-500">*</span></label>
                <label class="inline-flex items-center cursor-pointer w-2/3">
                    <input type="checkbox" value="" class="sr-only peer" >
                    <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Disabled</span>
                </label>
            </div>

            
            <div class="flex justify-between items-center mt-4">
                <label for="name" class="text-sm font-medium w-1/3">Show upload photos? <span class="text-red-500">*</span></label>
                <label class="inline-flex items-center cursor-pointer w-2/3">
                    <input type="checkbox" value="" class="sr-only peer" >
                    <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Disabled</span>
                </label>
            </div>

            
            <div class="flex justify-between items-center mt-4">
                <label for="name" class="text-sm font-medium w-1/3">Are photos mandatory? <span class="text-red-500">*</span></label>
                <label class="inline-flex items-center cursor-pointer w-2/3">
                    <input type="checkbox" value="" class="sr-only peer" >
                    <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Disabled</span>
                </label>
            </div>
            <hr class="mt-4">
            <div class="flex justify-between mt-4">
                <!-- Change Close button type to button to prevent form submission -->
                <button type="button" class="bg-red-500 text-white px-4 py-2 rounded" onclick="closeFieldModal()">Close</button>
    
                <button class="bg-green-500 text-white px-4 py-2 rounded" type="submit">Save</button>
            </div>
        </form>

    </div>
</div>

<script>
    function openFieldModal() {
        const modal = document.getElementById('modal');

        // Determine the clicked element
        // const container = event.currentTarget;

        

        // Show the modal
        modal.classList.remove('hidden');
    }

    function closeFieldModal() {
        const modal = document.getElementById('modal');
        modal.classList.add('hidden');
    }

</script>


@endsection

@section('script')
    @vite('resources/js/pages/gallery.js')
@endsection
