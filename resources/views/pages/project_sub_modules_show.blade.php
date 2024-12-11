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

    .sortable-ghost {
        background-color: #f3f4f6;
        opacity: 0.7;
        border: 2px dashed #ccc;
    }
/* ----- */
#drop-area {
    display: flex;
    flex-wrap: wrap;
    gap: 10px; /* Spacing between fields */
}

.field-container {
    transition: width 0.3s ease;
    display: flex;  /* Ensure flexbox is applied */
    flex-direction: column; /* Keep fields aligned vertically */
}

.half-width {
    width: 48%; /* Half the width */
    margin-right: 10px; /* Ensure space between half-width fields */
}

.full-width {
    width: 100%; /* Full width */
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
        <div class="border border-gray-300"> 

            <div class="flex flex-row gap-6 bg-gray-300 rounded-sm">
                <div class="flex-1 p-2">From fields</div>
                <div class="flex-1 p-2 flex items-center justify-end">
                    <button class="menu-icon text-green-500" onclick="toggleModal()" ><i class="mgc_add_line"></i> Add New</button>
                </div>
            </div>

            <div class="p-1 gap-6"  id="fields-container">
            
                @foreach ($customefromfields as $item)
                <div class="">

                    <div class=" input bg-black-300 p-2 field"        
                        draggable="true"
                        ondragstart="handleDragStart(event)"
                        data-type="{{ $item->field_type }}"
                        data-name="{{ $item->field_name }}"
                        data-options="{{ $item->field_type === 'select' || $item->field_type === 'radio' ? $item->filedOptions->toJson() : '' }}"
                    >
                        <label for="">{{$item->field_name}}</label>
                        @if ($item->field_type == 'text')
                            <input type="text" class="form-input mb-2">
                        @elseif ($item->field_type == 'textarea')
                            <textarea  class="form-input mb-2"></textarea>
                        @elseif ($item->field_type == 'number')
                            <input type="tel" name="phone_number" class="form-input mb-2" id="phone-input" oninput="validatePhoneNumber(this)">
                        @elseif ($item->field_type == 'select')
                            <select class="form-input mb-2">
                                <option value="">---Select one---</option>
                                @foreach ($item->filedOptions as $option)
                                    <option value="{{ $option->option_value }}">{{ $option->option_name }}</option>
                                @endforeach
                            </select>
                        @elseif ($item->field_type == 'radio')
                            <input type="radio"  class="form-input mb-2"> Hello
                        @elseif ($item->field_type == 'file')
                            <input type="file"  class="form-input mb-2"> Hello
                        @elseif ($item->field_type == 'image')
                            <input type="file" accept="image/*"  class="form-input mb-2"> Hello
                        @elseif ($item->field_type == 'video')
                            <input type="file" accept="video/*" class="form-input mb-2"> Hello
                        @elseif ($item->field_type == 'signature')
                            <input type="text"  class="form-input mb-2"> Signature
                        @endif
                    </div>

                    {{-- <div class="flex w-2/6 justify-center items-center w-full">
                        <button class="p-1"><span> <i class="mgc_edit_2_line text-blue-500 text-xl"></i></span></button>
                        <form action="{{ route('custome-from-field.destroy', ['custome_from_field' => $item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="p-1"><span> <i class="mgc_delete_2_line text-red-500 text-xl"></i></span></button>
                        </form>
                    </div> --}}
                
                </div>
                
                @endforeach

            </div>
        </div>

    </div>

    <div
    class="flex-grow-0 border border-gray-300 p-4 w-3/4 custome_from"
    id="drop-area"
    ondragover="handleDragOver(event)"
    ondrop="handleDrop(event)"
>
</div>


</div>

<div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-start justify-center z-50 ">
    <div class="bg-white rounded-lg p-6 w-1/3 mt-8">
        <form action="{{ route('custome-from-field.store') }}" method="POST">
            @CSRF
            <h2 class="text-xl font-bold mb-4">New Form Field</h2>
            <label for="name" class="mb-2">Name</label>
            <input type="text" name="field_name" id="name" value="" class="form-input mb-2">

            <label for="type" class="mb-2">Type</label>
            <select name="field_type" id="field_type" class="form-input mb-2">
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

            <div id="dropdown-options-container" class="hidden flex flex-col gap-2">
                <label for="dropdown-options" class="mb-2">Dropdown Options</label>
                <div id="dropdown-options-wrapper" class="flex flex-col gap-2">
                    <!-- Default input field -->
                    <div class="flex items-center gap-2">
                        <input type="text" name="dropdown_options[]" class="form-input mb-2 w-full" placeholder="Enter option">
                        <input type="text" name="dropdown_values[]" class="form-input mb-2 w-full" placeholder="Enter value">
                        <button type="button" onclick="removeField(this)"><i class="mgc_delete_2_line text-red-500 text-xl"></i></span></button>
                    </div>
                </div>
                <button type="button" class="bg-blue-500 text-white px-4 py-2 rounded mt-2 mb-2" onclick="addField()">Add Option</button>
            </div>

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

    document.getElementById('field_type').addEventListener('change', function() {
            const dropdownContainer = document.getElementById('dropdown-options-container');
            if (this.value === 'select') {
                dropdownContainer.classList.remove('hidden');
            } else {
                dropdownContainer.classList.add('hidden');
            }
        });

        function addField() {
            const wrapper = document.getElementById('dropdown-options-wrapper');
            const field = document.createElement('div');
            field.className = 'flex items-center gap-2';
            field.innerHTML = `
                <input type="text" name="dropdown_options[]" class="form-input mb-2 w-full" placeholder="Enter option">
                <input type="text" name="dropdown_values[]" class="form-input mb-2 w-full" placeholder="Enter value">
                <button type="button" onclick="removeField(this)"><i class="mgc_delete_2_line text-red-500 text-xl"></i></span></button>
            `;
            wrapper.appendChild(field);
        }

        function removeField(button) {
            button.parentElement.remove();
        }
        function validatePhoneNumber(input) {
            input.value = input.value.replace(/\D/g, '');
        }
</script>



<script>
    let draggedElement = null;

    function handleDragStart(event) {
        draggedElement = event.target;
        event.dataTransfer.setData("text/plain", event.target.outerHTML);
    }

    function handleDragOver(event) {
        event.preventDefault();
    }

    function handleDrop(event) {
        event.preventDefault();

        const dropArea = document.getElementById("drop-area");
        const draggedHtml = event.dataTransfer.getData("text/plain");

        // Wrap the dragged element in a container with controls
        const wrapper = document.createElement('div');
        wrapper.classList.add('field-container', 'flex', 'flex-col',  'p-2', 'full-width');
        wrapper.innerHTML = `
            ${draggedHtml}
            <div class="controls">
                <button class="btn btn-half-width" onclick="setFieldWidth(this, 'half')">Half Width</button>
                <button class="btn btn-full-width" onclick="setFieldWidth(this, 'full')">Full Width</button>
            </div>
        `;

        dropArea.appendChild(wrapper);
    }

    function setFieldWidth(button, widthType) {
    const fieldContainer = button.closest('.field-container');
    
    // Remove existing width classes
    fieldContainer.classList.remove('half-width', 'full-width');

    // Add the selected width class
    if (widthType === 'half') {
        fieldContainer.classList.add('half-width');
    } else if (widthType === 'full') {
        fieldContainer.classList.add('full-width');
    }
}
</script>


@endsection

@section('script')
    @vite('resources/js/pages/gallery.js')
@endsection
