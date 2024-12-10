@extends('layouts.vertical', ['title' => 'Custom Sub Module', 'sub_title' => 'Project', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="flex flex-row gap-4">
    <div class="flex-grow-0 bg-gray-00 p-4 w-1/4 ">
        
        <div class="flex flex-col gap-1 bg-white-300 rounded-sm">
            <div >Name</div>
            <div class="flex-1 relative">
                <input type="text" id="name" value="{{$customeSubModule->name}}" class="form-input mb-2 bg-black-500 pr-10" oninput="showSaveIconAndSave(this)">
                <span id="save-icon" class="absolute top-2 right-2 hidden">
                    <i class="mgc_round_line text-xl"></i>
                </span>
            </div>
        </div>

        <br>
        <div class="flex flex-row gap-6 bg-gray-300 rounded-sm">
            <div class="flex-1 p-2">Buttons</div>
            <div class="flex-1 p-2 flex items-center justify-end">
                <button class="menu-icon text-green-500"><i class="mgc_add_line"></i> Add New</button>
            </div>
        </div>


        <br>

        <div class="flex flex-row gap-6 bg-gray-300 rounded-sm">
            <div class="flex-1 p-2">From fields</div>
            <div class="flex-1 p-2 flex items-center justify-end">
                <button class="menu-icon text-green-500" onclick="toggleModal()" ><i class="mgc_add_line"></i> Add New</button>
            </div>
        </div>
    </div>

    <div class="flex-grow-0 bg-gray-300 p-4 w-3/4 ">
        

    </div>

</div>

<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-start justify-center z-50 ">
    <div class="bg-white rounded-lg p-6 w-1/3 mt-8">
        <form action="{{ route('custome-from-field.store') }}" method="POST">
            @CSRF
            <h2 class="text-xl font-bold mb-4">New Form Field</h2>
            <label for="name" class="mb-2">Name</label>
            <input type="text" id="name" value="" class="form-input mb-2">

            <label for="type" class="mb-2">Type</label>
            <select name="field_type" id="" class="form-input mb-2">
                <option value="text">Text</option>
                <option value="textarea">Paragraph </option>
                <option value="number">Number</option>
                <option value="select">Dropdown Menus </option>
                <option value="radio">Radio Buttons </option>
                <option value="checkbox">Multiple Choice</option>
                <option value="time">Date Picker</option>
                <option value="file">File Upload</option>
                <option value="image">Image Upload</option>
                <option value="video">Video Upload</option>
                <option value="signature">Signatures</option>
            </select>

            <label for="name" class="mb-2">Is Required</label>
            <select name="is_required" id="" class="form-input mb-2">
                <option value="0">No</option>
                <option value="1">Yes</option>
            </select>
            
            <label for="default_value" class="mb-2">Default Value</label>
            <input type="text" name="default_value" id="default_value" value="" class="form-input mb-2">
            
            <label for="name" class="mb-2"> </label>
            <input type="checkbox"  name="is_global" id="is_global" value="" > &nbsp;Reusable

            <div class="flex justify-between mt-4">
                <button class="bg-red-500 text-white px-4 py-2 rounded" onclick="toggleModal()">Close</button>

                <button class="bg-green-500 text-white px-4 py-2 rounded" type="submit" onclick="">Save</button>
            </div>
        </form>

    </div>
</div>

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

    function saveToServer(value) {
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        
        return new Promise((resolve, reject) => { // Ensure the function returns a Promise
            $.ajax({
                url: '/custom-sub-module',  // URL to make the request to
                method: 'POST',             // Use POST for saving data
                headers: {
                    'X-CSRF-TOKEN': csrfToken,  // CSRF token for security
                    'Content-Type': 'application/json',
                },
                data: JSON.stringify({ name: value }), // Send data in JSON format
                success: function(response) {
                    resolve(response); // Resolve the promise on success
                },
                error: function(xhr, status, error) {
                    reject(error); // Reject the promise on error
                }
            });
        });
    }

</script>



@endsection

@section('script')
    @vite('resources/js/pages/gallery.js')
@endsection
