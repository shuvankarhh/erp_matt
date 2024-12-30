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
    <div class="flex-grow-0 bg-gray-100 p-4 w-1/4">
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
            <div class="flex flex-row gap-6 bg-gray-300 rounded-sm cursor-pointer" onclick="toggleCollapsePart2('basic-fields-content2')" >
                <div class="flex-1 p-2 text-l text-black">Layout and Sections</div>
                <div class="flex-1 text-right">
                    <span id="collapse-icon-part2" class="text-2xl">&#9662;</span>
                </div>
            </div>
            <div id="basic-fields-content2" class="overflow-hidden transition-all duration-300 max-h-0">
                <div class="p-4">
                    <!-- Grid layout for 2 items per row -->
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
            <form action="{{ route('custom_show', ['from_name' => $customeform->encrypted_id()]) }}" method="GET" target="_blank">
                @CSRF
                <button type="submit" 
                        class="bg-blue-400 text-white p-2 rounded flex items-center justify-center  hover:bg-blue-500 transition duration-200">
                    View live form
                </button>
            </form>
        </div>
        
        
        <div id="drop-zone" class="top relative border border-gray-300 min-h-[40rem] flex flex-col justify-start items-start p-2 mb-5">
            @if (!empty($customeform->form_body))
                {!! $customeform->form_body !!}<input type="hidden" value="{{ $customeform->id }}">
            @endif
            <input type="hidden" value="{{ $customeform->id }}"> 
        
            <div id="drop-message" class="absolute inset-0 flex items-center justify-center text-gray-500 bg-gray-00 bg-opacity-50 hidden">
                Drop here
            </div>
        </div>
        
        {{-- <div class="bottom flex-grow flex items-end w-full mt-5">
            <button class="bg-green-500 text-white p-3 rounded flex items-center justify-center mx-auto">
                Submit
            </button>
        </div> --}}

    </div>
</div>




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

<div id="modal-select" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
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


<div id="openModalforsectionProperties" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded shadow-lg w-1/2">
        <h2 class="text-xl font-bold mb-4">Edit Section</h2>

        <!-- Label Input -->
        <label class="block text-gray-700 font-semibold mb-2">Title</label>
        <input type="text" id="modal-section-input" class="p-2 mb-3 border border-gray-300 rounded w-full">

        
        <label class="block text-gray-700 font-semibold mb-2">Advance Setting</label>

        <input type="checkbox" id="col2" name="col2"> 2 Column

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
            'mt-4',
            'w-full','mb-8'
        );

        content = `
                <div class="controls flex justify-end">                       
                    <button
                        class="btn bg-red-50 mb-2 mr-2 border border-red-500 hover:bg-red-500 hover:text-white transition duration-200 ease-in-out rounded-md"
                        onclick="openModalsectionProperties(event)">
                        Field properties
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
                content = `
                    <div onclick="openModal1(event)">
                        <div class="controls flex justify-end">
                            <button
                                class="btn bg-red-50 mb-2 border border-red-500 hover:bg-red-500 hover:text-white transition duration-200 ease-in-out rounded-md"
                                onclick="Delete(event)">
                                Delete
                            </button>
                        </div>

                        <label class="text-gray-700 font-semibold mb-2">Short Answer</label>
                        <input
                            type="text"
                            class="border border-gray-300 p-2 rounded w-full"
                            placeholder="Enter your answer"
                        />
                    </div>
                `;
                break;
            case "longAnswer":
                content = `
                    <div onclick="openModal1(event)">
                        <div class="controls flex justify-end">
                            <button
                                class="btn bg-red-50 mb-2 border border-red-500 hover:bg-red-500 hover:text-white transition duration-200 ease-in-out rounded-md"
                                onclick="Delete(event)">
                                Delete
                            </button>
                        </div>

                        <label class="text-gray-700 font-semibold mb-2">Long Answer</label>
                        <textarea
                            class="border border-gray-300 p-2 rounded w-full"
                            placeholder="Enter your answer"
                        ></textarea>
                    </div>
                `;
                break;
            
            case "email":
                content = `
                    <div onclick="openModal1(event)">
                        <div class="controls flex justify-end">
                            <button
                                class="btn bg-red-50 mb-2 border border-red-500 hover:bg-red-500 hover:text-white transition duration-200 ease-in-out rounded-md"
                                onclick="Delete(event)">
                                Delete
                            </button>
                        </div>

                        <label class="text-gray-700 font-semibold mb-2">Email</label>
                        <input
                            type="text"
                            class="border border-gray-300 p-2 rounded w-full"
                            placeholder="Enter Email"
                        />
                    </div>
                `;
                break;
            case "address":
                content = `
                    <div onclick="openModal1(event)">
                        <div class="controls flex justify-end">
                            <button
                                class="btn bg-red-50 mb-2 border border-red-500 hover:bg-red-500 hover:text-white transition duration-200 ease-in-out rounded-md"
                                onclick="Delete(event)">
                                Delete
                            </button>
                        </div>

                        <label class="text-gray-700 font-semibold mb-2">Address</label>
                        <textarea
                            class="border border-gray-300 p-2 rounded w-full"
                            placeholder="Enter your Address"
                        ></textarea>
                    </div>
                `;
                break;
            case "name":
                content = `
                    <div onclick="openModalName(event)">
                        <div class="controls flex justify-end">
                            <button
                                class="btn bg-red-50 mb-2 border border-red-500 hover:bg-red-500 hover:text-white transition duration-200 ease-in-out rounded-md"
                                onclick="Delete(event)">
                                Delete
                            </button>
                        </div>

                        <label class="text-gray-700 font-semibold mb-2">Name</label>
                        <br>

                        <div class="controls flex justify-between">
                            <div class="flex-1 mr-2">
                                <input
                                    type="text"
                                    class="border border-gray-300 p-2 rounded w-full"
                                    placeholder="First name"
                                />  
                                
                                <p class="text-gray-700 mb-2">&nbsp;First Name</p>
                            </div>
                            <div id="middelFieldCheck" class="flex-1 ml-2" hidden>
                                <input
                                    type="text"
                                    class="border border-gray-300 p-2 rounded w-full"
                                    placeholder="Enter your answer"
                                />  
                                <p class="text-gray-700 mb-2">&nbsp;Middel Name</p>
                            </div>
                            <div class="flex-1 ml-2">
                                <input
                                    type="text"
                                    class="border border-gray-300 p-2 rounded w-full"
                                    placeholder="Enter your answer"
                                /> 
                                <p class="text-gray-700 mb-2">&nbsp;Last Name</p> 
                            </div>
                        </div>

                    </div>
                `;
                break;
            case "select":
                content = `
                    <div onclick="openModalForSelect(event)">
                        <div class="controls flex justify-end">
                            <button
                                class="btn bg-red-50 mb-2 border border-red-500 hover:bg-red-500 hover:text-white transition duration-200 ease-in-out rounded-md"
                                onclick="Delete(event)">
                                Delete
                            </button>
                        </div>
                        <label class="text-gray-700 font-semibold mb-2">Dropdown List</label>
                        <select class="border border-gray-300 p-2 rounded w-full " disabled>
                        </select>
                    </div>
                `;
                break;
            case "number":
                content = `
                    <div onclick="openModalForNumber(event)">
                        <div class="controls flex justify-end">
                            <button
                                class="btn bg-red-50 mb-2 border border-red-500 hover:bg-red-500 hover:text-white transition duration-200 ease-in-out rounded-md"
                                onclick="Delete(event)">
                                Delete
                            </button>
                        </div>
                        <label class="text-gray-700 font-semibold mb-2">Number</label>
                        <input
                            type="text"
                            class="border border-gray-300 p-2 rounded w-full"
                            placeholder="Enter your answer"
                            oninput="validatePhoneNumber(this)"
                        />
                    </div>
                `;
                break;
            
            default:
                content = `
                    <div class="controls flex justify-end">
                        <button
                            class="btn bg-red-50 mb-2 border border-red-500 hover:bg-red-500 hover:text-white transition duration-200 ease-in-out rounded-md"
                            onclick="Delete(event)">
                            Delete
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
        const formId1 = dropZones1.querySelector('input[type="hidden"]').value;
        
        saveDropZoneContents(formId1, content1);

        const nestedDropZones = document.querySelectorAll('.nested-drop-zone'); // Select all elements with the class 'nested-drop-zone'

        // console.log(nestedDropZones);

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
                const formId1 = dropZones1.querySelector('input[type="hidden"]').value;
                const content1 = dropZones1.innerHTML.trim();
                saveDropZoneContents(formId1, content1);
                checkDropZone();
            });
        });

    });




    function saveDropZoneContents(formId, content) {
        const statusDiv = document.querySelector('.savebutton.bottom.mb-2.text-green-500 h1');
        if (statusDiv) {
            statusDiv.classList.remove('mgc_clock_line');
            statusDiv.classList.add('mgc_loading_4_fill');
            statusDiv.textContent = "Saving changes...";
        }

        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = content;
        const hiddenInputs = tempDiv.querySelectorAll('input[type="hidden"]');
        hiddenInputs.forEach(input => input.remove());

        const elementsToClear = tempDiv.querySelectorAll('.border-4.border-gray-300');
        elementsToClear.forEach((element) => {
            element.classList.remove('border-4', 'border-gray-300');
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
            element.classList.replace('mb-4', 'mb-2'); // Replace 'mb-4' with 'mb-2'
        });

        const elementsToClears = tempDiv.querySelectorAll('.border-4.border-blue-300');
        elementsToClears.forEach((element) => {
            element.classList.remove('border-4', 'border-blue-300');
        });

        const elementsWithOnClick = tempDiv.querySelectorAll('[onclick]');
        elementsWithOnClick.forEach(element => {
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

        let form_view = tempDiv.innerHTML.trim();

        return fetch(`/custom-form/${formId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({
                drop_zone_content: content,
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


    function saveDropZoneContentsDelete(formId, content) {

        
        
        return fetch(`/custom-form/${formId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify({
                drop_zone_content: content,
            }),
        })
        .then(response => {
            if (response.ok) {
                console.log('Content saved successfully!');
            } else {
                console.error('Failed to save content.');
            }
        })
        .catch(error => {
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

        // Update the current label and input values
        if (currentLabelElement) {
            currentLabelElement.textContent = labelInput;
        }
        if (currentInput) {
            currentInput.placeholder = textInput;
        }

        let dropZones1 = document.getElementById('drop-zone');
        const content1 = dropZones1.innerHTML.trim(); // Get content
        const formId1 = dropZones1.querySelector('input[type="hidden"]').value;
        
        saveDropZoneContents(formId1, content1);

        closeModal();
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
        const content1 = dropZones1.innerHTML.trim(); // Get content
        const formId1 = dropZones1.querySelector('input[type="hidden"]').value;
        
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
        const formId1 = dropZones1.querySelector('input[type="hidden"]').value;
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
        const formId1 = dropZones1.querySelector('input[type="hidden"]').value;
        
        saveDropZoneContents(formId1, content1);

        closeModalForSelect();
    }


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

        // Update the current label and input values
        if (currentLabelElement) {
            currentLabelElement.textContent = labelInput;
        }
        if (currentInput) {
            currentInput.placeholder = textInput;
        }

        let dropZones1 = document.getElementById('drop-zone');
        const content1 = dropZones1.innerHTML.trim(); // Get content
        const formId1 = dropZones1.querySelector('input[type="hidden"]').value;
        
        saveDropZoneContents(formId1, content1);

        closeModal();
    }

    // section

    let currentSection = null; // Variable to store the current section being edited

    function openModalsectionProperties(event) {
        const modal = document.getElementById('openModalforsectionProperties');
        const container = event.currentTarget.closest('.field-container'); // Get the parent section
        currentSection = container; // Store the current section being edited

        const currentLabelElement = container.querySelector('#editable-title'); // Find the title in the current section

        const labelInput = document.getElementById('modal-section-input'); // Modal input field

        if (currentLabelElement) {
            labelInput.value = currentLabelElement.textContent.trim(); // Populate input with the current title
        }

        const col2 = modal.querySelector('#col2'); // Locate within currentSection

        const grid = currentSection.querySelector('.nested-drop-zone'); // Locate within currentSection

        if (grid) {
            // Check if the nested-drop-zone has both grid and grid-cols-2 classes
            if (grid.classList.contains('grid') && grid.classList.contains('grid-cols-2')) {
                col2.checked = true; // Check the checkbox
            } else {
                col2.checked = false; // Uncheck the checkbox
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
        const col2 = document.getElementById('col2');
        let dropZonesAll = document.getElementById('drop-zone');
        if (currentSection) {
            const currentLabelElement = currentSection.querySelector('#editable-title');
            if (currentLabelElement) {
                currentLabelElement.textContent = labelInputValue.trim();
            }
        }

        const nestedDropZone = currentSection.querySelector('.nested-drop-zone');
        if (nestedDropZone) {
            if (col2.checked) {
                nestedDropZone.classList.add('grid', 'grid-cols-2', 'gap-4');
            } else {
                nestedDropZone.classList.remove('grid', 'grid-cols-2', 'gap-4');
            }
        }
        const content = currentSection.innerHTML.trim();

        let dropZones1 = document.getElementById('drop-zone');
        const content1 = dropZones1.innerHTML.trim(); // Get content
        const formId1 = dropZones1.querySelector('input[type="hidden"]').value;
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

        const currentLabelElement = currentSection.querySelector('#editable-title');
        if (currentLabelElement) {
            labelInput.value = currentLabelElement.textContent.trim();
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
            const currentLabelElement = currentSection.querySelector('#editable-title');
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
            const formId1 = dropZones1.querySelector('input[type="hidden"]').value;
            saveDropZoneContents(formId1, content1);

        }
        closeModalName();
    }

    function checkDropZone() {
        
        if (dropZone.children.length === 1) {
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
        const formId1 = dropZones1.querySelector('input[type="hidden"]').value;


        saveDropZoneContents(formId1, content1);

    }

    checkDropZone();
</script>

@endsection

@section('script')
    @vite('resources/js/pages/gallery.js')
@endsection
