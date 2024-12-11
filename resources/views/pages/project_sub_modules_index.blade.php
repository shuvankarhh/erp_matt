@extends('layouts.vertical', ['title' => 'Custom Sub Module Index', 'sub_title' => 'Project', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
        <form action="{{ route('custom-sub-module.store') }}" method="POST">
            @CSRF
            <div class="flex flex-col gap-1 bg-white-300 rounded-sm">
                <div >Name</div>
                <div class="flex-1 relative">

                    <input type="text" name="name" id="name" class="form-input mb-2 bg-black-500 pr-10" oninput="showSaveIconAndSave(this)">
                    <span id="save-icon" class="absolute top-2 right-2 hidden">

                        <i class="mgc_round_line text-xl"></i>

                    </span>
                    <input type="hidden"  name="save" value="true">
                    <button type="submit" class="save_name bg-gray-500 text-white px-4 py-2 rounded" disabled>Submit</button>
                </div>
            </div>
        </form>

    </div>

    <div class="flex-grow-0 bg-gray-300 p-4 w-3/4 ">
        <div class="flex flex-row gap-4">
            <div class="w-1/3" >
                <h3>Active</h3>
                <div>
                    @foreach ($customeSubModule_active as $item)
                        <a href="{{ route('custom-sub-module.show', $item->id) }}">
                            <div class="card">
                                <div class="card-body    mb-2">
                                    <h2 class="justify-center items-center h-6 ">{{ $item->name }}</h2>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="w-1/3" >
                <h3>Inctive</h3>
                <div>
                    @foreach ($customeSubModule_inactive as $item)
                        
                        <div class="card">
                            <div class="card-body p-3">
                                <h2>{{ $item->name }}</h2>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
            <div class="w-1/3" >
                Incomplete
            </div>
        </div>

    </div>

</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

function showSaveIconAndSave(input) {
    const saveIcon = document.getElementById('save-icon');
    const inputValue = input.value.trim();
    const submitButton = document.querySelector('button.save_name'); // Select the button

    if (inputValue !== "") {
        saveIcon.textContent = "💾";

        saveIcon.classList.remove('hidden');

        saveToServer(inputValue)
            .then(() => {
                saveIcon.textContent = "✅"; // Success icon
                
                // Change button background to green and enable it
                submitButton.classList.remove('bg-gray-500');
                submitButton.classList.add('bg-green-500');
                submitButton.removeAttribute('disabled');
            })
            .catch(() => {
                saveIcon.textContent = "❌"; // Error icon
                submitButton.classList.remove('bg-green-500');
                submitButton.classList.add('bg-gray-500');
                submitButton.setAttribute('disabled', 'disabled');
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
