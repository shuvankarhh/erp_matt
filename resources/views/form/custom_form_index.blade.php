@extends('layouts.vertical', ['title' => 'Custom Form', 'sub_title' => 'Project', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/glightbox/dist/css/glightbox.min.css'])
@endsection

@section('content')
@section('script')
    @vite('resources/js/pages/main.js')
@endsection
<style>

    .form-input {
        width: 100%;
        padding: 8px;
        padding-right: 2.5rem; /* Space for the icon */
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    #save-icon {
        font-size: 1.2rem;
        color: #4caf50; /* Green color for save indication */
        pointer-events: none; /* Prevent interaction with the icon */
    }

    .hidden {
        display: none;
    }

    .sortable-ghost {
        background-color: #f3f4f6;
        opacity: 0.7;
        border: 2px dashed #ccc;
    }



</style>




<meta name="csrf-token" content="{{ csrf_token() }}">



<div class="flex flex-col gap-4 border border-gray-300 p-4">
    <div class="ml-auto">
        <button class="bg-green-500 text-white font-medium py-2 px-4 rounded-full hover:bg-green-600 menu-icon" onclick="toggleModal()">
            <i class="mgc_add_line font-bold"></i> Add New
        </button>
    </div>
    <div>
        @foreach ($customeforms as $customeform)
            <a href="{{ route('custom-form.show',['custom_form'=>$customeform->id]) }}" class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white justify-center">{{$customeform->form_name }}</h5>
                
            </a>
        @endforeach
    </div>
</div>




<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-start justify-center z-50 ">
    <div class="bg-white rounded-lg p-6 w-1/3 mt-8">
        <form action="{{ route('custom-form.store') }}" method="POST">
            @CSRF
            
            <div >Name</div>
            <div class="flex-1 relative">
                <input type="text" name="name" class="form-input mb-2 bg-black-500 pr-10">

            </div>
            <div class="flex justify-between mt-4">
                <!-- Change Close button type to button to prevent form submission -->
                <button type="button" class="bg-red-500 text-white px-4 py-2 rounded" onclick="toggleModal()">Close</button>
    
                <button class="bg-green-500 text-white px-4 py-2 rounded" type="submit">Save</button>
            </div>
        </form>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    function toggleModal() {
        const modal = document.getElementById('modal');
        modal.classList.toggle('hidden');
        modal.classList.toggle('flex'); 
    }

    function showSaveIconAndSave(input) {
        const saveIcon = document.getElementById('save-icon');
        const inputValue = input.value.trim();

        if (inputValue !== "") {

            saveIcon.textContent = "💾";

            saveIcon.classList.remove('hidden');

            saveToServer(inputValue)
                .then(() => {
                    saveIcon.textContent = "✅"; // Success icon
                })
                .catch(() => {
                    saveIcon.textContent = "❌"; // Error icon
                });
        } else {
            saveIcon.classList.add('hidden'); // Hide icon
        }
    }
</script>

@endsection

@section('script')
    @vite('resources/js/pages/gallery.js')
@endsection
