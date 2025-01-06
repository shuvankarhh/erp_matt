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

    #item1, #select {
        cursor: pointer;
    }

    #item1:active ,#select:active {
        cursor: grabbing; 
    }

</style>




<meta name="csrf-token" content="{{ csrf_token() }}">


<div class="flex flex-row gap-4 border border-gray-300 p-4">
    <!-- Left section with Basic Fields -->
    <div class="flex-grow-0 bg-gray-100 p-4 w-1/4 ">
        <div class="border border-gray-300">
            <div class="flex flex-row gap-6 bg-gray-300 rounded-sm cursor-pointer" onclick="toggleCollapse('basic-fields-content')">
                <div class="flex-1 p-2 text-l text-black">Basic Fields</div>
                <div class="flex-1 text-right">
                    <span id="collapse-icon" class="text-2xl">&#9662;</span>
                </div>
            </div>
            <div id="basic-fields-content" class="overflow-hidden transition-all duration-300" style="max-height: 0;">
                <div class="p-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-slate-100 rounded text-black font-semibold border border-l-4 border-gray-300 p-2 hover:border-l-4 hover:border-blue-500"
                             draggable="true" ondragstart="drag(event)" id="item1">
                            <span class="mgc_textbox_line text-xl"></span> Short Answer
                        </div>
                        <div class="bg-slate-100 rounded text-black font-semibold border border-l-4 border-gray-300 p-2 hover:border-l-4 hover:border-blue-500"
                             draggable="true" ondragstart="drag(event)" id="select">
                             Dropdown List
                        </div>
                        <div class="bg-slate-100 rounded text-black font-semibold border border-l-4 border-gray-300 p-2 hover:border-l-4 hover:border-blue-500"
                             draggable="true" ondragstart="drag(event)" id="number">
                            Number
                        </div>
                        <div class="bg-slate-100 rounded text-black font-semibold border border-l-4 border-gray-300 p-2 hover:border-l-4 hover:border-blue-500"
                            draggable="true" ondragstart="drag(event)" id="name">
                            Name
                        </div>                        
                        <div class="bg-slate-100 rounded text-black font-semibold border border-l-4 border-gray-300 p-2 hover:border-l-4 hover:border-blue-500"
                        draggable="true" ondragstart="drag(event)" id="longAnswer">
                            Long Answer
                        </div>                        
                        <div class="bg-slate-100 rounded text-black font-semibold border border-l-4 border-gray-300 p-2 hover:border-l-4 hover:border-blue-500"
                            draggable="true" ondragstart="drag(event)" id="email">
                            Email
                        </div>                         
                        <div class="bg-slate-100 rounded text-black font-semibold border border-l-4 border-gray-300 p-2 hover:border-l-4 hover:border-blue-500"
                            draggable="true" ondragstart="drag(event)" id="address">
                            Address
                        </div> 

                    </div>
                </div>
            </div>
        </div>

        <hr class="mt-3 mb-3" style="border: 0; border-top: 1px solid rgb(102, 102, 102); width: 100%;">
        
        <div class="border border-gray-300">
            <div class="flex flex-row gap-6 bg-gray-300 rounded-sm cursor-pointer" onclick="toggleCollapsePart3('basic-fields-content3')" >
                <div class="flex-1 p-2 text-l text-black">Advance</div>
                <div class="flex-1 text-right">
                    <span id="collapse-icon-part3" class="text-2xl">&#9662;</span>
                </div>
            </div>
            <div id="basic-fields-content3" class="overflow-hidden transition-all duration-300 max-h-0">
                <div class="p-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-slate-100 rounded text-black font-semibold border border-l-4 border-gray-300 p-2 hover:border-l-4 hover:border-blue-500"
                            draggable="true" ondragstart="drag(event)" id="attachment">
                            File Attachments
                        </div>
                        <div class="bg-slate-100 rounded text-black font-semibold border border-l-4 border-gray-300 p-2 hover:border-l-4 hover:border-blue-500"
                        draggable="true" ondragstart="drag(event)" id="radio">
                        Radio Button
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-3 mb-3" style="border: 0; border-top: 1px solid rgb(102, 102, 102); width: 100%;">
        
        <div class="border border-gray-300">

            <div class="flex flex-row gap-6 bg-gray-300 rounded-sm cursor-pointer" onclick="toggleCollapsePart2('basic-fields-content2')" >
                <div class="flex-1 p-2 text-l text-black">Layout and Sections</div>
                <div class="flex-1 text-right">
                    <span id="collapse-icon-part2" class="text-2xl">&#9662;</span>
                </div>
            </div>
            <div id="basic-fields-content2" class="overflow-hidden transition-all duration-300 max-h-0">
                <div class="p-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="bg-slate-100 rounded text-black font-semibold border border-l-4 border-gray-300 p-2 hover:border-l-4 hover:border-blue-500"
                             draggable="true" ondragstart="drag(event)" id="section">
                            <span class="mgc_textbox_line text-xl"></span> Section
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Right section with Drop Area -->
    <div class="flex-grow-0 border border-gray-300 p-4 w-3/4 bg-slate-50 flex flex-col">

        <div class="bottom flex-grow flex items-end justify-between w-full mb-2">
            <div class="savebutton bottom text-green-500  mb-2">
                <h1 class="mgc_clock_line text-lg">Changes saved</h1>
            </div>

            <div class="flex flex-row gap-2">

                <div class="settings">
                    <button onclick="openModalForSettings()" class="btn text-blue-400 text-2xl p-2 rounded flex items-center justify-center  hover:text-green-500 transition duration-200 mgc_settings_4_line">
                        
                    </button>

                </div>


                <div class="">

                    <form action="{{ route('custom_show', ['from_name' => $customeform->encrypted_id()]) }}" method="GET" target="_blank">

                        @CSRF

                        <button type="submit" 
                                class="bg-blue-400 text-white p-2 rounded flex items-center justify-center  hover:bg-blue-500 transition duration-200">
                            View live form
                        </button>

                    </form>

                </div>
            </div>



        </div>
        
        <!-- Drop Zone Section -->
        <div id="drop-zone" class="top relative border border-gray-300 h-[40rem] flex flex-col justify-start items-start p-2 mb-5 overflow-y-auto pb-12 grid {{ $customeform->column_number }}">
            @if (!empty($customeform->form_body))
                {!! $customeform->form_body !!}<input type="hidden" class="formId" value="{{ $customeform->id }}">

            @else

                <input type="hidden" class="formId" value="{{ $customeform->id }}"> 

            @endif
        
            <div id="drop-message" class="absolute inset-0 flex items-center justify-center text-gray-500 bg-gray-100 bg-opacity-50  hidden">
                <p class="border-2 border-dotted border-gray-500 p-20">Drop here</p>
            </div>
        </div>
    </div>
    
</div>


<div id="modal-settings" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50">
    <div class="bg-white p-6 rounded shadow-lg w-1/2">
        <form action="{{ route('updateFromSettings', ['form_id' => $customeform->id]) }}" method="POST">
            @CSRF
            @method('PUT')
            
        <div class="flex items-center mb-4">
            <label class="block text-gray-700 font-semibold mr-2 w-1/2">Background color</label>
            <input 
            type="color"
            class="border border-gray-300  rounded mb-4 w-1/2" name="background_color" value="{{ $customeform->background_color }}">
            {{-- <div    
                
                id="gradient-picker"
                class="w-full h-8 rounded cursor-pointer"
                style="background: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet); border: 1px solid #ccc;"
                onclick="openGradientPicker()">
            </div> --}}
        </div>   

        <div class="flex items-center mb-4">
            <label class="block text-gray-700 font-semibold mr-2 w-1/2">Form body color</label>
            <input 
            type="color"
            class="border border-gray-300  rounded mb-4 w-1/2"  name="from_body_color" value="{{ $customeform->from_body_color }}">
        </div>

        <div class="flex items-center mb-4">
            <label class="block text-gray-700 font-semibold mr-2 w-1/2">Font Size</label>
            <select name="font_size" class="border border-gray-300 rounded p-2 w-1/2">
                <option value="8" {{ $customeform->font_size == 8 ? 'selected' : '' }}>8 px</option>
                <option value="12" {{ $customeform->font_size == 12 ? 'selected' : '' }}>12 px</option>
                <option value="16" {{ $customeform->font_size == 16 ? 'selected' : '' }}>16 px</option>
                <option value="20" {{ $customeform->font_size == 20 ? 'selected' : '' }}>20 px</option>
                <option value="24" {{ $customeform->font_size == 24 ? 'selected' : '' }}>24 px</option>
                <option value="32" {{ $customeform->font_size == 32 ? 'selected' : '' }}>32 px</option>
                <option value="48" {{ $customeform->font_size == 48 ? 'selected' : '' }}>48 px</option>
                <option value="72" {{ $customeform->font_size == 72 ? 'selected' : '' }}>72 px</option>
            </select>
        </div>
        

        <div class="flex items-center mb-4">
            <label class="block text-gray-700 font-semibold mr-2 w-1/2">Font style</label>
            <select name="font_style" id="font-style" class="border border-gray-300 rounded p-2 w-1/2">
                <option value="font-sans" {{ $customeform->font_style == 'font-sans' ? 'selected' : '' }}>Sans Serif</option>
                <option value="font-serif" {{ $customeform->font_style == 'font-serif' ? 'selected' : '' }}>Serif</option>
                <option value="font-mono" {{ $customeform->font_style == 'font-mono' ? 'selected' : '' }}>Monospace</option>
                <option value="font-display" {{ $customeform->font_style == 'font-display' ? 'selected' : '' }}>Display</option>
                <option value="font-body" {{ $customeform->font_style == 'font-body' ? 'selected' : '' }}>Body</option>
                <option value="font-heading" {{ $customeform->font_style == 'font-heading' ? 'selected' : '' }}>Heading</option>
            </select>
        </div>

        <div class="flex items-center mb-4">
            <label class="block text-gray-700 font-semibold mr-2 w-1/2">Number of Columns</label>
            <select name="column_number" class="border border-gray-300 rounded p-2 w-1/2">
                
                <option value="grid-cols-1" {{ $customeform->column_number == 'grid-cols-1' ? 'selected' : '' }}>1 Column</option>
                <option value="grid-cols-2" {{ $customeform->column_number == 'grid-cols-2' ? 'selected' : '' }}>2 Columns</option>
                <option value="grid-cols-3" {{ $customeform->column_number == 'grid-cols-3' ? 'selected' : '' }}>3 Columns</option>
            </select>
        </div>
        

        <div class="flex justify-end mt-4">
            <button
            type="button"
                class="btn bg-red-500 text-white p-2 rounded mr-2"
                onclick="closeModalForSettings()">
                Cancel
            </button>
            <button
                type="submit"
                class="btn bg-green-500 text-white p-2 rounded">
                Save
            </button>
        </div>

        </form>
    </div>
</div>

<script>
    function openGradientPicker() {
        const color = prompt("Enter a CSS linear-gradient value (e.g., 'linear-gradient(to right, red, yellow)')");
        if (color) {
            document.getElementById('gradient-picker').style.background = color;
        }
    }
</script>


<div id="itemss" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded shadow-lg w-1/2">
        <h2 class="text-xl font-bold mb-4">Edit Field</h2>
        <label class="block text-gray-700 font-semibold mb-2">Field Label</label>
        <input 
            type="text"
            class="border border-gray-300 p-2 rounded w-full mb-4"
            placeholder="Edit label"
            id="modal-label-input"
        />
        <label class="block text-gray-700 font-semibold mb-2">Field Placeholder</label>
        <input
            type="text"
            class="border border-gray-300 p-2 rounded w-full"
            id="modal-input"
        />
        <div class="flex justify-end mt-4">
            <button
                class="btn bg-red-500 text-white p-2 rounded mr-2"
                onclick="closeModal()">
                Cancel
            </button>
            <button
                class="btn bg-green-500 text-white p-2 rounded"
                onclick="saveModalInput()">
                Save
            </button>
        </div>
        
    </div>
</div>


<div id="open-modal-attachment" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded shadow-lg w-1/2">
        <h2 class="text-xl font-bold mb-4">Edit Attachment</h2>
        <label class="block text-gray-700 font-semibold mb-2">Field Label</label>
        <input 
            type="text"
            class="border border-gray-300 p-2 rounded w-full mb-4"
            placeholder="Edit label"
            id="modal-label-attachment"
        />

        <div class="flex justify-end mt-4">
            <button
                class="btn bg-red-500 text-white p-2 rounded mr-2"
                onclick="closeModalAttachment()">
                Cancel
            </button>
            <button
                class="btn bg-green-500 text-white p-2 rounded"
                onclick="saveModalAttachment()">
                Save
            </button>
        </div>
    </div>
</div>

<div id="open-modal-radio" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded shadow-lg w-1/2">
        <h2 class="text-xl font-bold mb-4">Edit Radio Button</h2>
        
        <!-- Field Label Input -->
        <label class="block text-gray-700 font-semibold mb-2">Field Label</label>
        <input 
            type="text"
            class="border border-gray-300 p-2 rounded w-full mb-4"
            placeholder="Edit label"
            id="modal-label-radio"
        />

        <!-- Options Section -->
        <label class="block text-gray-700 font-semibold mb-2">Options</label>
        <div id="modal-radio-options" class="space-y-2 mb-4">
            <!-- Dynamically added options will appear here -->
        </div>

        <!-- Add Button -->
        <button 
            class="flex items-center text-blue-500 text-xl mb-4"
            onclick="addRadioOptionField()">
            <i class="mgc_add_circle_fill"></i> Add Option
        </button>

        <!-- Modal Buttons -->
        <div class="flex justify-end mt-4">
            <button
                class="btn bg-red-500 text-white p-2 rounded mr-2"
                onclick="closeModalForRadio()">
                Cancel
            </button>
            <button
                class="btn bg-green-500 text-white p-2 rounded"
                onclick="saveModalForRadio()">
                Save
            </button>
        </div>
    </div>
</div>




<div id="modal-number" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded shadow-lg w-1/2">
        <h2 class="text-xl font-bold mb-4">Edit Field</h2>

        <label class="block text-gray-700 font-semibold mb-2">Field Label</label>
        <input 
            type="text"
            class="border border-gray-300 p-2 rounded w-full mb-4"
            id="modal-label-number"
        />
        <label class="block text-gray-700 font-semibold mb-2">Field Placeholder</label>
        <input
            type="text"
            class="border border-gray-300 p-2 rounded w-full"
            id="modal-placeholder-number"
        />
        <div class="flex justify-end mt-4">
            <button
                class="btn bg-red-500 text-white p-2 rounded mr-2"
                onclick="closeModalForNumber()">
                Cancel
            </button>
            <button
                class="btn bg-green-500 text-white p-2 rounded"
                onclick="saveModalnumber()">
                Save
            </button>
        </div>
    </div>
</div>

<div id="modal-select" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50">
    <div class="bg-white p-6 rounded shadow-lg w-1/2">
        <h2 class="text-xl font-bold mb-4">Edit Dropdown</h2>

        <!-- Label Input -->
        <label class="block text-gray-700 font-semibold mb-2">Label</label>
        <input type="text"
            id="modal-select-label"
            class="border border-gray-300 p-2 rounded w-full mb-4"
            placeholder="Enter label"
        />

        <!-- Options Container -->
        <label class="block text-gray-700 font-semibold mb-2">Options</label>
        <div id="options-container" class="space-y-2">
            <!-- Option fields will be added dynamically here -->
        </div>

        <!-- Add More Button -->
        <button
            class="btn bg-blue-500 text-white p-2 rounded mt-2"
            onclick="addOptionField()">
            Add More
        </button>

        <!-- Modal Buttons -->
        <div class="flex justify-end mt-4">
            <button
                class="btn bg-red-500 text-white p-2 rounded mr-2"
                onclick="closeModalForSelect()">
                Cancel
            </button>
            <button
                class="btn bg-green-500 text-white p-2 rounded"
                onclick="saveModalOptions()">
                Save
            </button>
        </div>
    </div>
</div>


<div id="openModalforsectionProperties" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50">
    <div class="bg-white p-6 rounded shadow-lg w-1/2">
        <h2 class="text-xl font-bold mb-4">Edit Section</h2>

        <!-- Label Input -->
        <label class="block text-gray-700 font-semibold mb-2">Title</label>
        <input type="text" id="modal-section-input" class="p-2 mb-3 border border-gray-300 rounded w-full">

        
        <h2 class="block text-gray-700 font-semibold mb-2 text-lg">Advance Setting</h2>
        <hr class="mb-4">
        <label class="block text-gray-700 font-semibold mb-4">Number of Columns</label>
        <div class="column_options pl-4 mb-4 ">
            <input type="radio" id="col1" name="col2"> 1 Columns
            <input type="radio" id="col2" name="col2"> 2 Columns
            <input type="radio" id="col3" name="col2"> 3 Columns

        </div>

        <!-- Modal Buttons -->
        <div class="flex justify-end mt-4">
            <button
                class="btn bg-red-500 text-white p-2 rounded mr-2"
                onclick="closeModalsection()">
                Cancel
            </button>
            <button
                class="btn bg-green-500 text-white p-2 rounded"
                onclick="saveModalInputsection()">
                Save
            </button>
        </div>
    </div>
</div>
{{-- 
<div id="openModalforsectionProperties" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-1/3">
        <div>
            <label for="modal-label-input">Title:</label>
            <input type="text" id="modal-section-input" class="p-2 mb-3 border border-gray-300 rounded w-full">
        </div>
        <div>
            <button onclick="saveModalInputsection()" class="btn bg-green-500 text-white p-2 rounded w-full">Save</button>
            <button onclick="closeModalsection()" class="btn bg-gray-500 text-white p-2 rounded w-full mt-2">Cancel</button>
        </div>
    </div>
</div> --}}

<div id="ModalName" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50">
    <div class="bg-white p-6 rounded shadow-lg w-1/2">
        <h2 class="text-xl font-bold mb-4">Edit Field</h2>
        
        {{-- <hr class="mt-3 mb-3" style="border: 0; border-top: 1px solid rgb(102, 102, 102); width: 100%;"><br> --}}

        <label class="block text-gray-700 font-semibold mb-2">Field Label</label>
        <input 
            type="text"
            class="border border-gray-300 p-2 rounded w-full mb-4"
            placeholder="Edit label"
            id="modal-label-name"
        />

        <!-- Checkbox and Middle Field -->
        <label class="block text-gray-700 font-semibold mb-2">Optional Sub-fields</label>

        <input type="checkbox" id="middleFieldCheckbox" name="middleField"> Middel Field

        <div class="flex justify-end mt-4">
            <button
                class="btn bg-red-500 text-white p-2 rounded mr-2"
                onclick="closeModalName()">
                Cancel
            </button>
            <button
                class="btn bg-green-500 text-white p-2 rounded"
                onclick="saveModalName()">
                Save
            </button>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

function 

    openModalForSettings(event) {
        const modal = document.getElementById('modal-settings');



        modal.classList.remove('hidden');
    }

    function closeModalForSettings() {
        const modal = document.getElementById('modal-settings');
        modal.classList.add('hidden');
    }



    function toggleCollapse(id) {
        const content = document.getElementById(id);
        const icon = document.getElementById('collapse-icon');
        if (content.style.maxHeight === '0px' || content.style.maxHeight === '') {
            content.style.maxHeight = content.scrollHeight + 'px';
            icon.innerHTML = '&#9656;'; // Up arrow
        } else {
            content.style.maxHeight = '0px';
            icon.innerHTML = '&#9662;'; // Down arrow
        }
    }

    // Ensure initial state is set to open
    document.addEventListener("DOMContentLoaded", () => {
        const content = document.getElementById('basic-fields-content');
        content.style.maxHeight = content.scrollHeight + 'px'; // Open by default
    });

    function toggleCollapsePart2(id) {
        const content = document.getElementById(id);
        const icon = document.getElementById('collapse-icon-part2');
        if (content.style.maxHeight === '0px' || !content.style.maxHeight) {
            content.style.maxHeight = content.scrollHeight + 'px';
            icon.innerHTML = '&#9656;'; // Up arrow
        } else {
            content.style.maxHeight = '0px';
            icon.innerHTML = '&#9662;'; // Down arrow
        }
    }

    function toggleCollapsePart3(id) {
        const content = document.getElementById(id);
        const icon = document.getElementById('collapse-icon-part3');
        if (content.style.maxHeight === '0px' || !content.style.maxHeight) {
            content.style.maxHeight = content.scrollHeight + 'px';
            icon.innerHTML = '&#9656;'; // Up arrow
        } else {
            content.style.maxHeight = '0px';
            icon.innerHTML = '&#9662;'; // Down arrow
        }
    }
</script>


<script>

    function drag(event) {
        event.dataTransfer.setData("text", event.target.id);
    }

    function createWrapperElement(draggedElement) {
        
        const wrapper = document.createElement('div');
        let content = '';
        if(draggedElement.id == "section"){
            wrapper.classList.add(
                'field-container',
                'flex',
                'flex-col',
                'border-4',
                'border-blue-300',
                'p-2',
                'full-width',
                'mt-2',
                'w-full','mb-2'
            );

            content = `
                    <div class="controls flex justify-end">                       
                        <button
                            class="btn w-0.5 mb-2 mr-2 border border-blue-500 border-2 hover:bg-blue-500 text-blue-500 text-l font-bold hover:text-white mgc_edit_2_line transition duration-200 ease-in-out rounded-md"
                            onclick="openModalsectionProperties(event)">
                        </button>
        
                        <button
                            class="btn bg-red-50 mb-2 border border-red-500 hover:bg-red-500 hover:text-white transition duration-200 ease-in-out rounded-md"
                            onclick="Delete(event)">
                            Delete
                        </button>
                    </div>
                    <div class="w-full flex justify-start w-full mb-5">
                        <h1 class="text-lg" id="editable-title">Original Title</h1>
                    </div>
                    <div class="nested-drop-zone min-h-40"></div>
                `;

        }else{
            wrapper.classList.add(
                'field-container',
                'flex',
                'flex-col',
                'border-4',
                'border-gray-300',
                'p-2',
                'full-width',
                'mt-2',
                'w-full','mb-4'
            );


            switch (draggedElement.id) {
                case "item1":

                    const shortAnswerdropzone = document.getElementById('drop-zone');
                    const shortAnswerInputs = shortAnswerdropzone.querySelectorAll('.shortAnswersQuestion');
                    let shortAnswerName =null;
                    if (shortAnswerInputs.length != 0) {
                        // Find the last input with class RadioQuestionName
                        const lastshortAnswer = shortAnswerdropzone.querySelectorAll('.shortAnswersQuestion');
                        if (lastshortAnswer.length > 0) {
                            const lastshortAnswerInput = lastshortAnswer[lastshortAnswer.length - 1]; // Get the last element
                            const lastshortAnswerInputName= lastshortAnswerInput.name;
                            const currentNumber = parseInt(lastshortAnswerInputName.replace('shortAnswerQuestion', ''), 10);
                            shortAnswerName = `shortAnswerQuestion${currentNumber + 1}`;
                        }
                    } else {
                        shortAnswerName = `shortAnswerQuestion${shortAnswerInputs.length + 1}`;
                    }

                    content = `
                        <div onclick="openModal1(event)">
                            <div class="controls flex justify-end">                       
                                <button
                                    class="btn w-0.5 mb-2 mr-2 border border-blue-500 border-2 hover:bg-blue-500 text-blue-500 text-l font-bold hover:text-white mgc_edit_2_line transition duration-200 ease-in-out rounded-md"
                                    onclick="openModal1(event)">
                                </button>
                                <button
                                    class="btn mb-2 border border-2 text-l border-red-500 hover:bg-red-500 hover:text-white text-red-500  font-bold  mgc_delete_2_line transition duration-200 ease-in-out rounded-md "
                                    onclick="Delete(event)">
                                </button>
                            </div>
                            <input 
                                type="hidden" 
                                class="shortAnswersQuestion"
                                name="${shortAnswerName}"/>

                            <label class="text-gray-700 font-semibold mb-2">Short Answer</label>
                            <input
                                type="text"
                                class="border border-gray-300 p-2 rounded w-full"
                                placeholder="Enter your answer"
                                name="${shortAnswerName}"
                            />
                        </div>
                    `;
                    break;
                case "radio":
                    const dropzone = document.getElementById('drop-zone');
                    const radioInputs = dropzone.querySelectorAll('.options');
                    let name =null;
                    if (radioInputs.length != 0) {
                        // Find the last input with class RadioQuestionName
                        const lastRadio = dropzone.querySelectorAll('.RadioQuestionName');
                        if (lastRadio.length > 0) {
                            const lastRadioInput = lastRadio[lastRadio.length - 1]; // Get the last element
                            const lastRadioInputName= lastRadioInput.name;
                            const currentNumber = parseInt(lastRadioInputName.replace('RadioQuestion', ''), 10);
                            name = `RadioQuestion${currentNumber + 1}`;
                        }

                    } else {
                        name = `RadioQuestion${radioInputs.length + 1}`;
                        
                    }
                    

                    content = `
                        <div onclick="openModalRadio(event)">
                            <div class="controls flex justify-end">                       
                                <button
                                    class="btn w-0.5 mb-2 mr-2 border border-blue-500 border-2 hover:bg-blue-500 text-blue-500 text-l font-bold hover:text-white mgc_edit_2_line transition duration-200 ease-in-out rounded-md"
                                    onclick="openModalRadio(event)">
                                </button>
                                <button
                                    class="btn mb-2 border border-2 text-l border-red-500 hover:bg-red-500 hover:text-white text-red-500  font-bold  mgc_delete_2_line transition duration-200 ease-in-out rounded-md "
                                    onclick="Delete(event)">
                                </button>
                            </div>

                            <label class="text-gray-700 font-semibold mb-2">Radio Button</label>
                            <br/>
                               <input 
                                    type="hidden" 
                                    class="RadioQuestionName" 
                                    name="${name}"
                                />
                            <div class="options grid grid-cols-2 gap-2 mb-2 pl-4">
 
                                <div class="option justify-start">
                                    <input 
                                        type="radio" 
                                        class="dynamic-radio border border-gray-300 rounded" 
                                        onclick="toggleRadio(event)" 
                                        data-toggled="false"
                                    />&nbsp; <span>Option 1</span>
                                </div>
                            </div>
                        </div>
                    `;
                    break;
                case "longAnswer":
                    
                    const longAnswerdropzone = document.getElementById('drop-zone');
                    const longAnswerInputs = longAnswerdropzone.querySelectorAll('.longAnswersQuestion');
                    let longAnswerName =null;
                    if (longAnswerInputs.length != 0) {
                        // Find the last input with class RadioQuestionName
                        const lastlongAnswer = longAnswerdropzone.querySelectorAll('.longAnswersQuestion');
                        if (lastlongAnswer.length > 0) {
                            const lastlongAnswerInput = lastlongAnswer[lastlongAnswer.length - 1]; // Get the last element
                            const lastlongAnswerInputName= lastlongAnswerInput.name;
                            const currentNumber = parseInt(lastlongAnswerInputName.replace('longAnswerQuestion', ''), 10);
                            longAnswerName = `longAnswerQuestion${currentNumber + 1}`;
                        }

                    } else {

                        longAnswerName = `longAnswerQuestion${longAnswerInputs.length + 1}`;

                    }

                    content = `
                        <div onclick="openModal1(event)">
                            <div class="controls flex justify-end">                       
                                <button
                                    class="btn w-0.5 mb-2 mr-2 border border-blue-500 border-2 hover:bg-blue-500 text-blue-500 text-l font-bold hover:text-white mgc_edit_2_line transition duration-200 ease-in-out rounded-md"
                                    onclick="openModal1(event)">
                                </button>
                                <button
                                    class="btn mb-2 border border-2 text-l border-red-500 hover:bg-red-500 hover:text-white text-red-500  font-bold  mgc_delete_2_line transition duration-200 ease-in-out rounded-md "
                                    onclick="Delete(event)">
                                </button>
                            </div>
                            <input 
                                type="hidden" 
                                class="longAnswersQuestion"
                                name="${longAnswerName}"/>

                            <label class="text-gray-700 font-semibold mb-2">Long Answer</label>
                            <textarea
                                class="border border-gray-300 p-2 rounded w-full"
                                placeholder="Enter your answer"
                                name="${longAnswerName}"
                            ></textarea>
                        </div>
                    `;
                    break;
                
                case "email":

                    const emaildropzone = document.getElementById('drop-zone');
                    const emailInputs = emaildropzone.querySelectorAll('.emailsQuestion');
                    let emailName =null;
                    if (emailInputs.length != 0) {
                        // Find the last input with class RadioQuestionName
                        const lastEmail = emaildropzone.querySelectorAll('.emailsQuestion');
                        if (lastEmail.length > 0) {
                            const lastEmailInput = lastEmail[lastEmail.length - 1]; // Get the last element
                            const lastEmailInputName= lastEmailInput.name;
                            const currentNumber = parseInt(lastEmailInputName.replace('emailQuestion', ''), 10);
                            emailName = `emailQuestion${currentNumber + 1}`;
                        }

                    } else {
                        emailName = `emailQuestion${emailInputs.length + 1}`;
                    }

                    content = `
                        <div onclick="openModal1(event)">
                            <div class="controls flex justify-end">                       
                                <button
                                    class="btn w-0.5 mb-2 mr-2 border border-blue-500 border-2 hover:bg-blue-500 text-blue-500 text-l font-bold hover:text-white mgc_edit_2_line transition duration-200 ease-in-out rounded-md"
                                    onclick="openModal1(event)">
                                </button>
                                <button
                                    class="btn mb-2 border border-2 text-l border-red-500 hover:bg-red-500 hover:text-white text-red-500  font-bold  mgc_delete_2_line transition duration-200 ease-in-out rounded-md "
                                    onclick="Delete(event)">
                                </button>
                            </div>
                               <input 
                                    type="hidden" 
                                    class="emailsQuestion"
                                    name="${emailName}"
                                />
                            <label class="text-gray-700 font-semibold mb-2">Email</label>
                            <input
                                type="email"
                                class="border border-gray-300 p-2 rounded w-full"
                                placeholder="Enter Email"
                                validateEmail(this)
                                name="${emailName}"
                            />
                        </div>
                    `;
                    break;
                case "address":
                    const addressdropzone = document.getElementById('drop-zone');
                    const addressInputs = addressdropzone.querySelectorAll('.addressesQuestion');
                    let addressName =null;
                    if (addressInputs.length != 0) {
                        // Find the last input with class RadioQuestionName
                        const lastaddress = addressdropzone.querySelectorAll('.addressesQuestion');
                        if (lastaddress.length > 0) {
                            const lastaddressInput = lastaddress[lastaddress.length - 1]; // Get the last element
                            const lastaddressInputName= lastaddressInput.name;
                            const currentNumber = parseInt(lastaddressInputName.replace('addressQuestion', ''), 10);
                            addressName = `addressQuestion${currentNumber + 1}`;
                        }
                    } else {
                        addressName = `addressQuestion${addressInputs.length + 1}`;
                    }

                    content = `
                        <div onclick="openModal1(event)">
                            <div class="controls flex justify-end">
                                <button
                                    class="btn mb-2 border border-2 text-l border-red-500 hover:bg-red-500 hover:text-white text-red-500  font-bold  mgc_delete_2_line transition duration-200 ease-in-out rounded-md "
                                    onclick="Delete(event)">
                                </button>
                            </div>
                            <input 
                                type="hidden" 
                                class="addressesQuestion"
                                name="${addressName}" />

                            <label class="text-gray-700 font-semibold mb-2">Address</label>
                            <textarea
                                class="border border-gray-300 p-2 rounded w-full"
                                placeholder="Enter your Address"
                                name="${addressName}"
                            ></textarea>
                        </div>
                    `;
                    break;
                case "attachment":
                    const attachmentdropzone = document.getElementById('drop-zone');
                    const attachmentInputs = attachmentdropzone.querySelectorAll('.attachmentsQuestion');
                    let attachmentName =null;
                    if (attachmentInputs.length != 0) {
                        // Find the last input with class RadioQuestionName
                        const lastattachment = attachmentdropzone.querySelectorAll('.attachmentsQuestion');
                        if (lastattachment.length > 0) {
                            const lastattachmentInput = lastattachment[lastattachment.length - 1]; // Get the last element
                            const lastattachmentInputName= lastattachmentInput.name;
                            const currentNumber = parseInt(lastattachmentInputName.replace('attachmentQuestion', ''), 10);
                            attachmentName = `attachmentQuestion${currentNumber + 1}`;
                        }
                    } else {
                        attachmentName = `attachmentQuestion${attachmentInputs.length + 1}`;
                    }
                    content = `
                        <div onclick="openModalAttachment(event)">
                            <div class="controls flex justify-end">
                                
                                <button
                                    class="btn mb-2 border border-2 text-l border-red-500 hover:bg-red-500 hover:text-white text-red-500  font-bold  mgc_delete_2_line transition duration-200 ease-in-out rounded-md "
                                    onclick="Delete(event)">
                                </button>
                            </div>
                            <input 
                                type="hidden" 
                                class="attachmentsQuestion"
                                name="${attachmentName}" />

                            <label class="text-gray-700 font-semibold mb-2">Attachment</label>
                            <div class="flex items-center w-full cursor-pointer mt-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                                </svg>
                                <span class="text-gray-700">&nbsp; <input type="file"  class="" alt="Submit" name="${attachmentName}" /></span>
                            </div>
                        </div>
                    `;
                    break;
                case "name":
                    const namedropzone = document.getElementById('drop-zone');
                    const nameInputs = namedropzone.querySelectorAll('.namesQuestion');
                    let nameName =null;
                    if (nameInputs.length != 0) {
                        // Find the last input with class RadioQuestionName
                        const lastname = namedropzone.querySelectorAll('.namesQuestion');
                        if (lastname.length > 0) {
                            const lastnameInput = lastname[lastname.length - 1]; // Get the last element
                            const lastnameInputName= lastnameInput.name;
                            const currentNumber = parseInt(lastnameInputName.replace('nameQuestion', ''), 10);
                            nameName = `nameQuestion${currentNumber + 1}`;
                        }
                    } else {
                        nameName = `nameQuestion${nameInputs.length + 1}`;
                    }
                    content = `
                        <div onclick="openModalName(event)">
                            <div class="controls flex justify-end">
                                <button
                                    class="btn mb-2 border border-2 text-l border-red-500 hover:bg-red-500 hover:text-white text-red-500  font-bold  mgc_delete_2_line transition duration-200 ease-in-out rounded-md "
                                    onclick="Delete(event)">
                                </button>
                            </div>

                            <label class="text-gray-700 font-semibold mb-2">Name</label>
                            <br>
                            <input 
                                type="hidden" 
                                class="namesQuestion"
                                name="${nameName}" />

                            <div class="controls flex justify-between">
                                <div class="flex-1 mr-2">
                                    <input
                                        type="text"
                                        class="border border-gray-300 p-2 rounded w-full"
                                        placeholder="First name"
                                        name="First${nameName}"
                                    />  
                                    
                                    <p class="text-gray-700 mb-2">&nbsp;First Name</p>
                                </div>
                                <div id="middelFieldCheck" class="flex-1 ml-2" hidden>
                                    <input
                                        type="text"
                                        class="border border-gray-300 p-2 rounded w-full"
                                        placeholder="Middel name"
                                        name="Middel${nameName}"
                                    />  
                                    <p class="text-gray-700 mb-2">&nbsp;Middel Name</p>
                                </div>
                                <div class="flex-1 ml-2">
                                    <input
                                        type="text"
                                        class="border border-gray-300 p-2 rounded w-full"
                                        placeholder="Last name"
                                        name="Last${nameName}"
                                    /> 
                                    <p class="text-gray-700 mb-2">&nbsp;Last Name</p> 
                                </div>
                            </div>

                        </div>
                    `;
                    break;
                case "select":
                    const selectdropzone = document.getElementById('drop-zone');
                    const selectInputs = selectdropzone.querySelectorAll('.selectsQuestion');
                    let selectName =null;
                    if (selectInputs.length != 0) {
                        // Find the last input with class RadioQuestionName
                        const lastselect = selectdropzone.querySelectorAll('.selectsQuestion');
                        if (lastselect.length > 0) {
                            const lastselectInput = lastselect[lastselect.length - 1]; // Get the last element
                            const lastselectInputName= lastselectInput.name;
                            const currentNumber = parseInt(lastselectInputName.replace('selectQuestion', ''), 10);
                            selectName = `selectQuestion${currentNumber + 1}`;
                        }
                    } else {
                        selectName = `selectQuestion${selectInputs.length + 1}`;
                    }

                    content = `
                        <div onclick="openModalForSelect(event)">
                            <div class="controls flex justify-end">
                                <button
                                    class="btn mb-2 border border-2 text-l border-red-500 hover:bg-red-500 hover:text-white text-red-500  font-bold  mgc_delete_2_line transition duration-200 ease-in-out rounded-md "
                                    onclick="Delete(event)">
                                </button>
                            </div>
                            <input 
                                type="hidden" 
                                class="selectsQuestion"
                                name="${selectName}" />
                            <label class="text-gray-700 font-semibold mb-2">Dropdown List</label>
                            <select class="border border-gray-300 p-2 rounded w-full  " name="${selectName}"   disabled>
                            </select>
                        </div>
                    `;
                    break;
                case "number":
                    const numberdropzone = document.getElementById('drop-zone');
                    const numberInputs = numberdropzone.querySelectorAll('.numbersQuestion');
                    let numberName =null;
                    
                    if (numberInputs.length != 0) {
                        // Find the last input with class RadioQuestionName
                        const lastnumber = numberdropzone.querySelectorAll('.numbersQuestion');
                        if (lastnumber.length > 0) {
                            const lastnumberInput = lastnumber[lastnumber.length - 1]; // Get the last element
                            const lastnumberInputName= lastnumberInput.name;
                            const currentNumber = parseInt(lastnumberInputName.replace('numberQuestion', ''), 10);
                            
                            numberName = `numberQuestion${currentNumber + 1}`;
                        }
                    } else {
                        numberName = `numberQuestion${numberInputs.length + 1}`;
                    }

                    content = `
                        <div onclick="openModalForNumber(event)">
                            <div class="controls flex justify-end">
                                <button
                                    class="btn mb-2 border border-2 text-l border-red-500 hover:bg-red-500 hover:text-white text-red-500  font-bold  mgc_delete_2_line transition duration-200 ease-in-out rounded-md "
                                    onclick="Delete(event)">
                                </button>
                            </div>
                            <input 
                                type="hidden" 
                                class="numbersQuestion"
                                name="${numberName}"
                                />
                            <label class="text-gray-700 font-semibold mb-2">Number</label>
                            <input
                                type="text"
                                class="border border-gray-300 p-2 rounded w-full"
                                placeholder="Enter your answer"
                                oninput="validatePhoneNumber(this)"
                                name="${numberName}"
                            />
                        </div>
                    `;
                    
                    break;
                
                default:
                    content = `
                        <div class="controls flex justify-end">
                            <button
                                class="btn mb-2 border border-2 text-l border-red-500 hover:bg-red-500 hover:text-white text-red-500  font-bold  mgc_delete_2_line transition duration-200 ease-in-out rounded-md "
                                onclick="Delete(event)">
                            </button>
                        </div>
                        ${draggedElement.outerHTML}
                    `;
                    break;
            }
        }

        wrapper.innerHTML = content;
        
        return wrapper;
    }

    const dropZone = document.getElementById('drop-zone');
    const dropMessage = document.getElementById('drop-message');
    

    dropZone.addEventListener('dragover', function (event) {
        event.preventDefault();
        dropZone.style.backgroundColor = "#f0f0f0"; 
    });



    dropZone.addEventListener('drop', function (event) {
        event.preventDefault();
        dropZone.style.backgroundColor = ""; 

        const data = event.dataTransfer.getData("text");
        const draggedElement = document.getElementById(data);

        if (draggedElement) {
            const wrapper = createWrapperElement(draggedElement);
            dropZone.appendChild(wrapper);
            
        }

        let dropZones1 = document.getElementById('drop-zone');
        const content1 = dropZones1.innerHTML.trim(); // Get content
        const formId1 = dropZones1.querySelector('input[class="formId"]').value;
        
        saveDropZoneContents(formId1, content1);

        const nestedDropZones = document.querySelectorAll('.nested-drop-zone'); // Select all elements with the class 'nested-drop-zone'


        nestedDropZones.forEach(nesteddropZone => {
            nesteddropZone.addEventListener('dragover', function (event) {
                event.preventDefault();
                nesteddropZone.style.backgroundColor = "#f0f0f0"; // Highlight drop zone
            });

            nesteddropZone.addEventListener('dragleave', function () {
                nesteddropZone.style.backgroundColor = ""; // Reset background color when dragging out
            });

            nesteddropZone.addEventListener('drop', function (event) {
                event.preventDefault();
                event.stopPropagation(); // Prevent the event from propagating to the parent drop zone
                event.stopImmediatePropagation(); // Ensure only one handler is executed
                nesteddropZone.style.backgroundColor = ""; // Reset background color

                const data = event.dataTransfer.getData("text");
                const draggedElement = document.getElementById(data);

                if (draggedElement) {
                    // Check if the dragged element is already inside the drop zone
                    const isAlreadyDropped = Array.from(nesteddropZone.children).some(child => child.id === draggedElement.id);
                    if (!isAlreadyDropped) {
                        const wrapper = createWrapperElement(draggedElement);
                        nesteddropZone.appendChild(wrapper);
                    }
                }

                const dropZones1 = document.getElementById('drop-zone');
                const formId1 = dropZones1.querySelector('input[class="formId"]').value;
                const content1 = dropZones1.innerHTML.trim();
                saveDropZoneContents(formId1, content1);
                
            });
        });
        checkDropZone();
    });




    function saveDropZoneContents(formId, content) {
        const statusDiv = document.querySelector('.savebutton.bottom.mb-2.text-green-500 h1');

        if (statusDiv) {
            statusDiv.classList.remove('mgc_clock_line');
            statusDiv.classList.add('mgc_loading_4_fill');
            statusDiv.textContent = "Saving changes...";
        }

        const tempDiv = document.createElement('div');  

        const tempDiv2 = document.createElement('div');
        

        tempDiv.innerHTML = content;
        tempDiv2.innerHTML = content;



        const elementsToClear = tempDiv.querySelectorAll('.border-4.border-gray-300');
        elementsToClear.forEach((element) => {
            element.classList.remove('border-4', 'border-gray-300');
        });

        const containers = tempDiv.querySelectorAll('.field-container');

        containers.forEach((element) => {
            element.classList.remove('mt-2');
        });

        const minh = tempDiv.querySelectorAll('.min-h-40');

        minh.forEach((element) => {
            element.classList.remove('min-h-40');
        });

        const mbs = tempDiv.querySelectorAll('.mb-5');

        mbs.forEach((element) => {
            element.classList.remove('mb-5');
        });

        const mb8s = tempDiv.querySelectorAll('.mb-8');

        mb8s.forEach((element) => {
            element.classList.remove('mb-8');
        });

        const mb4s = tempDiv.querySelectorAll('.mb-4');

        mb4s.forEach((element) => {
            element.classList.remove('mb-4'); // Replace 'mb-4' with 'mb-2'
        });

        const elementsToClears = tempDiv.querySelectorAll('.border-4.border-blue-300');
        elementsToClears.forEach((element) => {
            element.classList.remove('border-4', 'border-blue-300');
        });
        
        const elementsWithOnClick = tempDiv.querySelectorAll('[onclick]');
        elementsWithOnClick.forEach(element => {
            if (
                element.getAttribute('onclick') === 'toggleRadio(event)' 
            ) {
                return;
            }
            element.removeAttribute('onclick');
        });

        const buttons = tempDiv.querySelectorAll('button');
        buttons.forEach((button) => button.remove());

        const controlsDivs = tempDiv.querySelectorAll('.controls.flex.justify-end');
        controlsDivs.forEach((controlsDiv) => controlsDiv.remove());

        const selectElements = tempDiv.querySelectorAll('select');
        selectElements.forEach((element) => {
            element.removeAttribute('disabled');
        });

        const dropDivs = tempDiv.querySelectorAll('#drop-message');
        dropDivs.forEach((dropDiv) => dropDiv.remove());

        
        const dropDiv2s = tempDiv2.querySelectorAll('#drop-message');
        dropDiv2s.forEach((dropDiv) => dropDiv.remove());

        const hiddenInputs = tempDiv.querySelectorAll('input[type="hidden"]');
        hiddenInputs.forEach(input => {
               
            if (!input.classList.contains('RadioQuestionName')) {
                input.remove();
            }  
        });

        const hiddenInputss = tempDiv2.querySelectorAll('input[type="hidden"]');
        hiddenInputss.forEach(input => {
            if (!input.classList.contains('numbersQuestion') && !input.classList.contains('selectsQuestion') && !input.classList.contains('namesQuestion') && !input.classList.contains('attachmentsQuestion') && !input.classList.contains('addressesQuestion') && !input.classList.contains('emailsQuestion') && !input.classList.contains('longAnswersQuestion') && !input.classList.contains('shortAnswersQuestion')) {
                input.remove();
            }
        });


        let form_view = tempDiv.innerHTML.trim();
        
        let form_views = tempDiv2.innerHTML.trim();


        return fetch(`/custom-form/${formId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({
                drop_zone_content: form_views,
                
                form_view: form_view,
            }),
        })
        .then(response => {
            if (response.ok) {
                if (statusDiv) {
                    statusDiv.classList.remove('mgc_loading_4_fill');
                    statusDiv.classList.add('mgc_clock_line');
                    statusDiv.textContent = "Changes saved successfully!"; // Update the text after successful save
                }
                console.log('Content saved successfully!');
            } else {
                if (statusDiv) {
                    statusDiv.textContent = "Failed to save changes."; // Update the text if saving fails
                }
                console.error('Failed to save content.');
            }
        })
        .catch(error => {
            if (statusDiv) {

                statusDiv.textContent = "Error occurred while saving."; // Update the text in case of an error
            }
            console.error('Error:', error);
        });

    }


    let currentInput;
    let currentLabelElement;

    function openModal1(event) {
        const modal = document.getElementById('itemss');

        // Determine the clicked element
        const container = event.currentTarget;

        // Find the label and input elements within the clicked container
        currentLabelElement = container.querySelector('label');
        currentInput = container.querySelector('input');
        
        // Populate the modal fields with the current label and input values
        const labelInput = document.getElementById('modal-label-input');
        const textInput = document.getElementById('modal-input');

        if (currentLabelElement) {
            labelInput.value = currentLabelElement.textContent.trim();
        }

        if (currentInput) {
            textInput.value = currentInput.placeholder.trim();
        }

        // Show the modal
        modal.classList.remove('hidden');
    }

    function closeModal() {
        const modal = document.getElementById('itemss');
        modal.classList.add('hidden');
    }

    function saveModalInput() {
        const labelInput = document.getElementById('modal-label-input').value;
        const textInput = document.getElementById('modal-input').value;

        if (currentLabelElement) {
            currentLabelElement.textContent = labelInput;
        }
        if (currentInput) {
            currentInput.placeholder = textInput;
        }

        let dropZones1 = document.getElementById('drop-zone');
        const content1 = dropZones1.innerHTML.trim(); // Get content
        const formId1 = dropZones1.querySelector('input[class="formId"]').value;

        saveDropZoneContents(formId1, content1);
        closeModal();
    }

    //attachment
    
    function openModalAttachment(event) {
        const modal = document.getElementById('open-modal-attachment');

        const container = event.currentTarget;

        currentLabelElement = container.querySelector('label');

        const labelInput = document.getElementById('modal-label-attachment');


        if (currentLabelElement) {
            labelInput.value = currentLabelElement.textContent.trim();
        }

        modal.classList.remove('hidden');
    }

    function closeModalAttachment() {
        const modal = document.getElementById('open-modal-attachment');
        modal.classList.add('hidden');
    }

    function saveModalAttachment() {
        const labelInput = document.getElementById('modal-label-attachment').value;

        if (currentLabelElement) {
            currentLabelElement.textContent = labelInput;
        }

        let dropZones1 = document.getElementById('drop-zone');
        const content1 = dropZones1.innerHTML.trim();
        const formId1 = dropZones1.querySelector('input[class="formId"]').value;
        
        saveDropZoneContents(formId1, content1);

        closeModalAttachment();
    }

    //radio
    let currentRadioField = null;

function openModalRadio(event) {

    const modal = document.getElementById('open-modal-radio');
    currentRadioField = event.target.closest('.field-container'); 

    // Set the modal label input
    const labelElement = currentRadioField.querySelector('label');
    document.getElementById('modal-label-radio').value = labelElement ? labelElement.textContent.trim() : '';

    // Populate options container
    const radioOptions = currentRadioField.querySelectorAll('input[type="radio"]');
    const optionsContainer = document.getElementById('modal-radio-options');

    optionsContainer.innerHTML = ''; // Clear existing options
    radioOptions.forEach(radio => {
        const optionText = radio.nextElementSibling ? radio.nextElementSibling.textContent.trim() : '';
        addRadioOptionField(optionText);
    });

    // Show modal
    modal.classList.remove('hidden');
}

function closeModalForRadio() {

    const modal = document.getElementById('open-modal-radio');
    modal.classList.add('hidden');

}

function addRadioOptionField(optionText = '') {
    const optionsContainer = document.getElementById('modal-radio-options');

    const optionField = document.createElement('div');
    optionField.classList.add('flex', 'items-center', 'space-x-2');

    optionField.innerHTML = `
        <input 
            type="text" 
            class="border border-gray-300 p-2 rounded w-full" 
            value="${optionText}" 
            placeholder="Enter option"
        />
        <button 
            class="btn bg-red-500 text-white p-2 rounded" 
            onclick="removeOptionField(this)">
            Delete
        </button>
    `;

    optionsContainer.appendChild(optionField);

}

function removeRadioOptionField(button) {
    const optionField = button.parentElement;
    optionField.remove();
}
let currentFieldContainer = null;


function saveModalForRadio() {
    const labelInput = document.getElementById('modal-label-radio').value;
    const optionsContainer = document.getElementById('modal-radio-options');
    const options = optionsContainer.querySelectorAll('input[type="text"]');

    // Update field container
    if (currentRadioField) {
        const labelElement = currentRadioField.querySelector('label');
        const labelOptions = currentRadioField.querySelector('.options');

        if (labelElement) {
            labelElement.textContent = labelInput;
        }

        
        const dropzone = document.getElementById('drop-zone');
        const radioInputs = dropzone.querySelectorAll('.options');
        
        const QuestionName = currentRadioField.querySelector('.RadioQuestionName');

        const Name = QuestionName.name;
        

        // Clear existing options before appending new ones
        labelOptions.innerHTML = ''; // Clear existing options

        options.forEach(option => {
            const optionText = option.value;

            // Create new option element
            const optionElement = document.createElement('div');
            optionElement.classList.add('option', 'justify-start');
            
            // Append input with value to the option element
            optionElement.innerHTML = `
                <input 
                    type="radio" 
                    class="dynamic-radio border border-gray-300 rounded" 
                    data-toggled="false"
                    onclick="toggleRadio(event)"
                    value="${optionText}"
                    name="${Name}"
                />&nbsp;
                <span>${optionText}</span>
            `;
            
            // Append new option to the options container
            labelOptions.appendChild(optionElement);
        });
    }

        let dropZones1 = document.getElementById('drop-zone');
        const content1 = dropZones1.innerHTML.trim(); // Get content
        const formId1 = dropZones1.querySelector('input[class="formId"]').value;
        
        saveDropZoneContents(formId1, content1);

    closeModalForRadio();
}





    // number
    function openModalForNumber(event) {
        const modal = document.getElementById('modal-number');

        const container = event.currentTarget;

        currentLabelElement = container.querySelector('label');
        currentInput = container.querySelector('input');

        const labelInput = document.getElementById('modal-label-number');
        const textInput = document.getElementById('modal-placeholder-number');
        
        if (currentLabelElement) {
            labelInput.value = currentLabelElement.textContent.trim();
        }

        if (currentInput) {
            textInput.value = currentInput.placeholder.trim();
        }

        modal.classList.remove('hidden');
    }

    function closeModalForNumber() {
        const modal = document.getElementById('modal-number');
        modal.classList.add('hidden');
    }


    function saveModalnumber() {
        const labelInput = document.getElementById('modal-label-number').value;
        const textInput = document.getElementById('modal-placeholder-number').value;

        // Update the current label and input values
        if (currentLabelElement) {
            currentLabelElement.textContent = labelInput;
        }
        if (currentInput) {
            currentInput.placeholder = textInput;
        }

        let dropZones1 = document.getElementById('drop-zone');
        const content1 = dropZones1.innerHTML.trim();
        const formId1 = dropZones1.querySelector('input[class="formId"]').value;
        
        saveDropZoneContents(formId1, content1);

        closeModalForNumber();
    }

    function validatePhoneNumber(input) {
            input.value = input.value.replace(/\D/g, '');
        }

    let currentDropdown; 

    function openModalForSelect(event) {
        const modal = document.getElementById('modal-select');
        currentDropdown = event.target.closest('.field-container'); 

        // Set the modal label input
        const labelElement = currentDropdown.querySelector('label');
        document.getElementById('modal-select-label').value = labelElement ? labelElement.textContent : '';

        // Populate options container
        const selectElement = currentDropdown.querySelector('select');
        const optionsContainer = document.getElementById('options-container');
        optionsContainer.innerHTML = ''; // Clear existing fields

        Array.from(selectElement.options).forEach(option => {
            addOptionField(option.textContent);
        });

        // Show modal
        modal.classList.remove('hidden');
    }

    function closeModalForSelect() {
        const modal = document.getElementById('modal-select');
        modal.classList.add('hidden');
    }

    function addOptionField(optionText = '') {
        const optionsContainer = document.getElementById('options-container');

        const optionField = document.createElement('div');
        optionField.classList.add('flex', 'items-center', 'space-x-1');

        optionField.innerHTML = `
            <input
                type="text"
                class="border border-gray-300 p-2 rounded w-full"
                value="${optionText}"
                placeholder="Enter option"
            />
            <button
                class="btn bg-red-500 text-white p-2 rounded"
                onclick="removeOptionField(this)">
                Delete
            </button>
        `;

        optionsContainer.appendChild(optionField);
    }

    function removeOptionField(button) {
        const optionField = button.parentElement;
        optionField.remove();

        let dropZones1 = document.getElementById('drop-zone');
        const content1 = dropZones1.innerHTML.trim(); // Get content
        const formId1 = dropZones1.querySelector('input[class="formId"]').value;
        saveDropZoneContents(formId1, content1);
    }

    function saveModalOptions() {

        const modalLabel = document.getElementById('modal-select-label').value;
        const optionsContainer = document.getElementById('options-container');
        const optionFields = optionsContainer.querySelectorAll('input');

        if (currentDropdown) {
            // Update the label
            const labelElement = currentDropdown.querySelector('label');
            if (labelElement) {
                labelElement.textContent = modalLabel;
            }

            // Update the dropdown options
            const selectElement = currentDropdown.querySelector('select');
            if (selectElement) {
                selectElement.innerHTML = ''; // Clear existing options
                optionFields.forEach(input => {
                    const optionValue = input.value.trim();
                    if (optionValue) {
                        const optionElement = document.createElement('option');
                        optionElement.textContent = optionValue;
                        selectElement.appendChild(optionElement);
                    }
                });
            }
        }
        let dropZones1 = document.getElementById('drop-zone');
        const content1 = dropZones1.innerHTML.trim(); // Get content
        const formId1 = dropZones1.querySelector('input[class="formId"]').value;
        
        saveDropZoneContents(formId1, content1);

        closeModalForSelect();
    }

    function closeModal() {
        const modal = document.getElementById('itemss');
        modal.classList.add('hidden');
    }

    function saveModalInput() {
        const labelInput = document.getElementById('modal-label-input').value;
        const textInput = document.getElementById('modal-input').value;

        if (currentLabelElement) {
            currentLabelElement.textContent = labelInput;
        }
        if (currentInput) {
            currentInput.placeholder = textInput;
        }

        let dropZones1 = document.getElementById('drop-zone');
        const content1 = dropZones1.innerHTML.trim();
        const formId1 = dropZones1.querySelector('input[class="formId"]').value;
        
        saveDropZoneContents(formId1, content1);

        closeModal();
    }

    // section

    let currentSection = null;

    function openModalsectionProperties(event) {
        const modal = document.getElementById('openModalforsectionProperties');
        const container = event.currentTarget.closest('.field-container'); 
        currentSection = container; 

        const currentLabelElement = container.querySelector('#editable-title');

        const labelInput = document.getElementById('modal-section-input'); 

        if (currentLabelElement) {
            labelInput.value = currentLabelElement.textContent.trim(); 
        }

        const col1 = modal.querySelector('#col1');
        const col2 = modal.querySelector('#col2');
        const col3 = modal.querySelector('#col3'); 

        const grid = currentSection.querySelector('.nested-drop-zone');

        if (grid) {
            if (grid.classList.contains('grid') && grid.classList.contains('grid-cols-1')) {
                col1.checked = true; // Select the radio for 1 column
            } else if (grid.classList.contains('grid') && grid.classList.contains('grid-cols-2')) {
                col2.checked = true; // Select the radio for 2 columns
            } else if (grid.classList.contains('grid') && grid.classList.contains('grid-cols-3')) {
                col3.checked = true; // Select the radio for 3 columns
            }
        }




        modal.classList.remove('hidden'); // Show the modal
    }
    function closeModalsection() {
        const modal = document.getElementById('openModalforsectionProperties');
        modal.classList.add('hidden');
    }

    function saveModalInputsection() {
        const labelInputValue = document.getElementById('modal-section-input').value;
        const col1 = document.getElementById('col1');
        const col2 = document.getElementById('col2');
        const col3 = document.getElementById('col3');
        let dropZonesAll = document.getElementById('drop-zone');
        if (currentSection) {
            const currentLabelElement = currentSection.querySelector('#editable-title');
            if (currentLabelElement) {
                currentLabelElement.textContent = labelInputValue.trim();
            }
        }

        const nestedDropZone = currentSection.querySelector('.nested-drop-zone');
        if (nestedDropZone) {

            nestedDropZone.classList.remove('grid', 'grid-cols-1', 'grid-cols-2', 'grid-cols-3', 'gap-4');

            if (col1.checked) {
                nestedDropZone.classList.add('grid', 'grid-cols-1', 'gap-4');
            } else if (col2.checked) {
                nestedDropZone.classList.add('grid', 'grid-cols-2', 'gap-4');
            } else if (col3.checked) {
                nestedDropZone.classList.add('grid', 'grid-cols-3', 'gap-4');
            }
        }
        const content = currentSection.innerHTML.trim();

        let dropZones1 = document.getElementById('drop-zone');
        const content1 = dropZones1.innerHTML.trim();
        const formId1 = dropZones1.querySelector('input[class="formId"]').value;
        saveDropZoneContents(formId1, content1);

        closeModalsection();
    }

    //

    function toggleMiddleField() {
        const checkbox = document.getElementById('middleFieldCheckbox');
        const middleFieldContainer = document.getElementById('middleFieldContainer');
        
        if (checkbox.checked) {
            middleFieldContainer.classList.remove('hidden'); // Show the middle field
        } else {
            middleFieldContainer.classList.add('hidden'); // Hide the middle field
        }
    }



    // Call this function whenever the modal is opened
    function openModalName(event) {
        const modal = document.getElementById('ModalName');
        const container = event.currentTarget.closest('.field-container'); // Locate the field-container
        currentSection = container; // Set the current section dynamically

        const labelElement = currentSection.querySelector('label');
        const labelInput = document.getElementById('modal-label-name');

        const middleFieldCheckbox = document.getElementById('middleFieldCheckbox');
        const middleFieldCheck = currentSection.querySelector('#middelFieldCheck'); // Locate within currentSection

        if (middleFieldCheck) {
            if (middleFieldCheck.hasAttribute('hidden')) {
                middleFieldCheckbox.checked = false; // Unchecked if hidden
            } else {
                middleFieldCheckbox.checked = true; // Checked if visible
            }
        }

        if (labelElement) {
            labelInput.value = labelElement.textContent.trim();
        }

        // Show the modal
        modal.classList.remove('hidden');
    }


    function closeModalName() {
        const modal = document.getElementById('ModalName');
        modal.classList.add('hidden');
    }


    function saveModalName() {
        const labelInputValue = document.getElementById('modal-label-name').value;
        const textInputValue = document.getElementById('modal-input').value;
        if (currentSection) {
            const currentLabelElement = currentSection.querySelector('label');
            const currentInput = currentSection.querySelector('input[type="text"]');

            if (currentLabelElement) {
                currentLabelElement.textContent = labelInputValue.trim();
            }
            if (currentInput) {
                currentInput.placeholder = textInputValue.trim();
            }

            const middleFieldCheck = currentSection.querySelector('#middelFieldCheck');
            const middleFieldCheckbox = document.getElementById('middleFieldCheckbox');

            if (middleFieldCheck) {
                if (middleFieldCheckbox.checked) {
                    middleFieldCheck.removeAttribute('hidden');
                } else {
                    middleFieldCheck.setAttribute('hidden', 'true');
                }
            }
            const content = currentSection.innerHTML.trim();

            let dropZones1 = document.getElementById('drop-zone');
            const content1 = dropZones1.innerHTML.trim(); // Get content
            const formId1 = dropZones1.querySelector('input[class="formId"]').value;
            saveDropZoneContents(formId1, content1);

        }
        closeModalName();
    }

    function checkDropZone() {
        if (dropZone.children.length === 2) {
            dropMessage.classList.remove('hidden');
        } else {
            dropMessage.classList.add('hidden');
        }
    }

    function Delete(event) {
        event.stopPropagation();
        const wrapper = event.target.closest('.field-container');

        if (wrapper) {
            
            wrapper.remove();
            checkDropZone();
        } 

        let dropZones1 = document.getElementById('drop-zone');
        const content1 = dropZones1.innerHTML.trim(); // Get content
        const formId1 = dropZones1.querySelector('input[class="formId"]').value;


        saveDropZoneContents(formId1, content1);

    }

    checkDropZone();
</script>

@endsection

@section('script')
    @vite('resources/js/pages/gallery.js')
@endsection
