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


<div class="flex flex-row gap-4 border border-gray-300 p-4">
    <!-- Left section with Basic Fields -->
    <div class="flex-grow-0 bg-gray-100 p-4 w-1/4">
        <div class="border border-gray-300">
            <div class="flex flex-row gap-6 bg-gray-300 rounded-sm cursor-pointer" onclick="toggleCollapse('basic-fields-content')" >
                <div class="flex-1 p-2 text-l text-black">Basic Fields</div>
                <div class="flex-1 text-right">
                    <span id="collapse-icon" class="text-2xl">&#9662;</span>
                </div>
            </div>
            <div id="basic-fields-content" class="overflow-hidden transition-all duration-300 max-h-0">
                <div class="p-4">
                    <!-- Grid layout for 2 items per row -->
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
                             draggable="true" ondragstart="drag(event)" id="item3">
                            Small Div 3
                        </div>
                        <div class="bg-slate-100 rounded text-black font-semibold border border-l-4 border-gray-300 p-2 hover:border-l-4 hover:border-blue-500"
                             draggable="true" ondragstart="drag(event)" id="item4">
                            Small Div 4
                        </div>
                        <div class="bg-slate-100 rounded text-black font-semibold border border-l-4 border-gray-300 p-2 hover:border-l-4 hover:border-blue-500"
                             draggable="true" ondragstart="drag(event)" id="item5">
                            Small Div 5
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right section with Drop Area -->
    <div class="flex-grow-0 border border-gray-300 p-4 w-3/4 bg-slate-50 flex flex-col">

        <div id="drop-zone" class="top relative border border-gray-300 min-h-80 flex flex-col justify-start items-start p-2">
            
            @if (!empty($customeform->form_body))
                {!! $customeform->form_body !!}
            @else
                <input type="hidden" value="{{ $customeform->id }}">
            @endif
            
            <div id="drop-message" class="absolute inset-0 flex items-center justify-center text-gray-500 bg-gray-100 bg-opacity-50 hidden">
                Drop here
            </div>
        </div>
        <div class="bottom flex-grow flex items-end w-full mt-3">
            <button class="bg-green-500 text-white p-3 rounded flex items-center justify-center mx-auto">
                Submit
            </button>
        </div>

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
            placeholder="Enter your placeholder"
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

<div id="modal-select" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded shadow-lg w-1/2">
        <h2 class="text-xl font-bold mb-4">Edit Dropdown</h2>

        <!-- Label Input -->
        <label class="block text-gray-700 font-semibold mb-2">Label</label>
        <input
            type="text"
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




<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function toggleCollapse(id) {
        const content = document.getElementById(id);
        const icon = document.getElementById('collapse-icon');
        if (content.style.maxHeight === '0px' || !content.style.maxHeight) {
            content.style.maxHeight = content.scrollHeight + 'px';
            icon.innerHTML = '&#9656;'; // Up arrow
        } else {
            content.style.maxHeight = '0px';
            icon.innerHTML = '&#9662;'; // Down arrow
        }
    }

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

const dropZone = document.getElementById('drop-zone');
const dropMessage = document.getElementById('drop-message');

// Enable dragover for drop zone
dropZone.addEventListener('dragover', function (event) {
    event.preventDefault();
    dropZone.style.backgroundColor = "#f0f0f0"; // Highlight drop zone
});

// Handle drop action
dropZone.addEventListener('drop', function (event) {
    event.preventDefault();
    dropZone.style.backgroundColor = ""; // Reset background color

    const data = event.dataTransfer.getData("text");
    const draggedElement = document.getElementById(data);

    if (draggedElement) {
        // Create wrapper for the dropped item
        const wrapper = document.createElement('div');
        wrapper.classList.add(
            'field-container',
            'flex',
            'flex-col',
            'border',
            'border-gray-500',
            'p-2',
            'full-width',
            'mt-2',
            'w-full'
        );

        if (draggedElement.id === "item1") {
            wrapper.innerHTML = `
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
        } else if (draggedElement.id === "select") {
            wrapper.innerHTML = `
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
                        <option>--select--<option>
                    </select>
                </div>
            `;
        } else {
            wrapper.innerHTML = `
                <div class="controls flex justify-end">
                    <button
                        class="btn bg-red-50 mb-2 border border-red-500 hover:bg-red-500 hover:text-white transition duration-200 ease-in-out rounded-md"
                        onclick="Delete(event)">
                        Delete
                    </button>
                </div>
                ${draggedElement.outerHTML}
            `;
        }

        // Append to drop zone
        dropZone.appendChild(wrapper);

        // Update drop message visibility
        checkDropZone();
    }
});

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
        textInput.value = currentInput.value.trim();
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
        currentInput.value = textInput;
    }

    closeModal();
}

// select
let currentDropdown; // Tracks the currently selected dropdown for editing

function openModalForSelect(event) {
    const modal = document.getElementById('modal-select');
    currentDropdown = event.target.closest('.field-container'); // Get the dropdown wrapper

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

function removeOptionField(button) {
    const optionField = button.parentElement;
    optionField.remove();
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

    closeModalForSelect();
}



// Check the drop zone for content
function checkDropZone() {
    if (dropZone.children.length === 1) {
        dropMessage.classList.remove('hidden');
    } else {
        dropMessage.classList.add('hidden');
    }
}

function Delete(event) {
    const wrapper = event.target.closest('.field-container');
    if (wrapper) {
        wrapper.remove();
        checkDropZone();
    }
}

// Initialize drop zone check
checkDropZone();



</script>

<script>
    // Check if dropZone and dropMessage are already defined before declaring them
    let dropZones, dropMessages;

    if (!dropZones) {
        dropZones = document.getElementById('drop-zone');
    }

    if (!dropMessages) {
        dropMessages = document.getElementById('drop-message');
    }

    const formId = dropZones.querySelector('input[type="hidden"]').value; // Get the form ID from the hidden input

    // Listen for the drop event on the drop zone
    dropZones.addEventListener('drop', async () => {
        dropMessages.classList.add('hidden'); // Hide drop message when something is dropped
        const content = dropZones.innerHTML.trim(); // Get content
        await saveDropZoneContent(content, formId);
    });

    // Optional: Add drag-over event to allow dropping (if necessary)
    dropZones.addEventListener('dragover', (event) => {
        event.preventDefault();
        dropMessages.classList.remove('hidden'); // Show "Drop here" message when dragging over
    });

    // Function to send data to the backend
    async function saveDropZoneContent(content, formId) {
        try {
            const response = await fetch(`/custom-form/${formId}`, {
                method: 'PUT',  // Use PUT method for updating existing records
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: JSON.stringify({
                    drop_zone_content: content,
                }),
            });

            if (response.ok) {
                console.log('Content saved successfully!');
            } else {
                console.log('Failed to save content.');
            }
        } catch (error) {
            console.error('Error:', error);
        }
    }
</script>


@endsection

@section('script')
    @vite('resources/js/pages/gallery.js')
@endsection
