@extends('layouts.vertical', ['title' => 'Sale', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    <style>
        .select2-selection {
            display: flex;
            align-items: center;
            height: 100%;
            padding: 0 8px;
            box-sizing: border-box;
            padding: 0 10px;
        }

        span.select2-selection.select2-selection--single {
            height: 38px;
            /* border: 1px solid red; */
        }
    </style>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">Add Sale</h4>
            </div>
        </div>
        <div class="p-6">
            <form id="add_sale_form" action="{{ route('sales.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                    <x-input label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Sale Name"
                        required />

                    <x-select label="Timezone" name="timezone_id" selected="{{ old('timezone_id') }}" required />

                    <x-select label="Pipeline" name="pipeline_id" :options="$sales_pipelines" placeholder="Select Pipeline"
                        selected="{{ old('pipeline_id') }}" data-url="{{ route('pipeline.stages', ':id') }}" />

                    <x-select label="Pipeline Stage" name="pipeline_stage_id" :options="$sales_pipeline_stages"
                        placeholder="Select Pipeline Stage" selected="{{ old('pipeline_stage_id') }}" />

                    <x-input type="date" label="Close Date" name="close_date" value="{{ old('close_date') }}" required />

                    <x-input type="number" label="Discount Percentage" name="discount_percentage"
                        value="{{ old('discount_percentage') }}" placeholder="Enter Discount Percentage" required />

                    <x-input type="number" label="Price" name="price" value="{{ old('price') }}"
                        placeholder="Enter Price" required readonly />

                    <x-input type="number" label="Final Price" name="final_price" value="{{ old('final_price') }}"
                        placeholder="Enter Final Price" required readonly />

                    <x-select label="Organization" name="organization_id" :options="$organizations"
                        placeholder="Select Organization" selected="{{ old('organization_id') }}" />

                    <x-select label="Sale Owner" name="owner_id" :options="$staffs" placeholder="Select Sale Owner"
                        selected="{{ old('owner_id') }}" />

                    <x-select label="Sale Type" name="sale_type" :options="$sale_types" placeholder="Select Sale Type"
                        selected="{{ old('sale_type') }}" />

                    <x-select label="Priority" name="priority" :options="$priorities" placeholder="Select Priority"
                        selected="{{ old('priority') }}" />

                    <x-select label="Contact" name="contact_id" :options="$contacts" selected="{{ old('contact_id') }}"
                        select2 multiple />

                    <x-select label="Solution" name="solution_id" :options="$solutions" selected="{{ old('solution_id') }}"
                        select2 multiple />

                    <div id="solutionsTableContainer" class="col-span-2 mt-4 hidden">
                    </div>

                    <x-textarea class="col-span-2" label="Description" name="description" rows=2
                        placeholder="Enter Your Description" />
                </div>

                <button type="submit"
                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onclick="storeOrUpdate('add_sale_form', event)">
                    Save
                </button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // $('#contact_id, #solution_id').select2({
        //     width: '100%',
        //     placeholder: "Search for a timezone",
        //     multiple: true,
        // });

        $('#contact_id').select2({
            width: '100%',
            placeholder: "Select Contact",
            multiple: true,
        });


        $('#solution_id').select2({
            width: '100%',
            placeholder: "Select Solution",
            multiple: true,
        });

        $('#timezone_id').select2({
            width: '100%',
            placeholder: "Search for a timezone",
            minimumInputLength: 1,
            ajax: {
                url: '{{ route('timezone.search') }}',
                dataType: 'json',
                delay: 250,
                processResults: function(data) {
                    return {
                        results: data.map(function(timezone) {
                            // results: data.slice(0, 10).map(function(timezone) {
                            return {
                                id: timezone.id,
                                text: timezone.name
                            };
                        })
                    };
                },
                cache: true
            },
            // multiple: true,
            // maximumSelectionLength: 1,
        });

        // document.addEventListener('DOMContentLoaded', function() {
        //     const pipelineSelect = document.getElementById('pipeline_id');
        //     const stagesSelect = document.getElementById('pipeline_stage_id');

        //     // Fetch and populate pipeline stages
        //     const fetchStages = (pipelineId, selectedStageId = null) => {
        //         const url = pipelineSelect.dataset.url.replace(':id', pipelineId);
        //         fetch(url)
        //             .then(response => response.json())
        //             .then(data => {
        //                 stagesSelect.innerHTML = '<option value="">Select Pipeline Stage</option>';
        //                 Object.entries(data).forEach(([id, name]) => {
        //                     stagesSelect.insertAdjacentHTML(
        //                         'beforeend',
        //                         `<option value="${id}" ${id == selectedStageId ? 'selected' : ''}>${name}</option>`
        //                     );
        //                 });
        //             })
        //             .catch(error => console.error('Error fetching stages:', error));
        //     };

        //     // Initialize on page load and pipeline selection change
        //     const initializeStages = () => {
        //         const pipelineId = pipelineSelect.value;
        //         const selectedStageId = stagesSelect.dataset.selected; // Preselected stage ID
        //         stagesSelect.innerHTML = '<option value="">Select Pipeline Stage</option>';
        //         if (pipelineId) fetchStages(pipelineId, selectedStageId);
        //     };

        //     initializeStages(); // Handle preselected pipeline and stage on page load
        //     pipelineSelect.addEventListener('change', initializeStages); // Handle pipeline change
        // });

        // document.addEventListener('DOMContentLoaded', function() {
        //     const pipelineSelect = document.getElementById('pipeline_id');
        //     const stagesSelect = document.getElementById('pipeline_stage_id');

        //     // Fetch and populate pipeline stages
        //     const fetchStages = (pipelineId) => {
        //         const url = pipelineSelect.dataset.url.replace(':id', pipelineId);
        //         fetch(url)
        //             .then(response => response.json())
        //             .then(data => {
        //                 stagesSelect.innerHTML = '<option value="">Select Pipeline Stage</option>';
        //                 Object.entries(data).forEach(([id, name]) => {
        //                     stagesSelect.insertAdjacentHTML(
        //                         'beforeend',
        //                         `<option value="${id}">${name}</option>`
        //                     );
        //                 });
        //             })
        //             .catch(error => console.error('Error fetching stages:', error));
        //     };

        //     // Initialize on page load and pipeline selection change
        //     const initializeStages = () => {
        //         const pipelineId = pipelineSelect.value;
        //         stagesSelect.innerHTML = '<option value="">Select Pipeline Stage</option>';
        //         if (pipelineId) fetchStages(pipelineId);
        //     };

        //     initializeStages(); // Handle preselected pipeline on page load
        //     pipelineSelect.addEventListener('change', initializeStages); // Handle pipeline change
        // });

        // Worked Perfactly
        // document.addEventListener('DOMContentLoaded', function() {
        //     const pipelineSelect = document.getElementById('pipeline_id');
        //     const stagesSelect = document.getElementById('pipeline_stage_id');

        //     console.log('Pipeline Select Input : ', pipelineSelect);

        //     // Function to fetch and populate pipeline stages
        //     const fetchStages = (pipelineId, urlTemplate) => {
        //         if (pipelineId) {
        //             const url = urlTemplate.replace(':id', pipelineId);
        //             fetch(url)
        //                 .then(response => response.json())
        //                 .then(data => {
        //                     stagesSelect.innerHTML = '<option value="">Select Pipeline Stage</option>';
        //                     for (const [id, name] of Object.entries(data)) {
        //                         const option = document.createElement('option');
        //                         option.value = id;
        //                         option.textContent = name;
        //                         stagesSelect.appendChild(option);
        //                     }
        //                 })
        //                 .catch(error => console.error('Error fetching stages:', error));
        //         } else {
        //             stagesSelect.innerHTML = '<option value="">Select Pipeline Stage</option>';
        //         }
        //     };

        //     // Fetch stages on page load if a pipeline is already selected
        //     const initialPipelineId = pipelineSelect.value;
        //     const initialStageId = stagesSelect.value;
        //     const urlTemplate = pipelineSelect.dataset.url;

        //     if (initialPipelineId) {
        //         console.log('Preselected Pipeline ID:', initialPipelineId);
        //         fetchStages(initialPipelineId, urlTemplate);
        //     }

        //     if (initialStageId) {
        //         console.log('Preselected Stage ID:', initialStageId);
        //         fetchStages(initialPipelineId, urlTemplate);
        //     }

        //     // Fetch stages when pipeline selection changes
        //     pipelineSelect.addEventListener('change', function() {
        //         console.log('Pipeline Select Input Option Changed');
        //         const pipelineId = this.value;
        //         console.log('Pipeline ID:', pipelineId);
        //         fetchStages(pipelineId, this.dataset.url);
        //     });
        // });


        // document.addEventListener('DOMContentLoaded', function() {
        //     const pipelineSelect = document.getElementById('pipeline_id');
        //     const stagesSelect = document.getElementById('pipeline_stage_id');

        //     console.log('Pipeline Select Input : ', pipelineSelect);


        //     pipelineSelect.addEventListener('change', function() {
        //         console.log('Pipeline Select Input Option Changed');

        //         console.log(this.dataset.url);


        //         const pipelineId = this.value;

        //         console.log('Piprline Id : ', pipelineId);

        //         const urlTemplate = this.dataset.url;
        //         const url = urlTemplate.replace(':id', pipelineId);

        //         if (pipelineId) {
        //             fetch(url)
        //                 .then(response => response.json())
        //                 .then(data => {
        //                     stagesSelect.innerHTML = '<option value="">Select Pipeline Stage</option>';
        //                     for (const [id, name] of Object.entries(data)) {
        //                         const option = document.createElement('option');
        //                         option.value = id;
        //                         option.textContent = name;
        //                         stagesSelect.appendChild(option);
        //                     }
        //                 })
        //                 .catch(error => console.error('Error fetching stages:', error));
        //         } else {
        //             stagesSelect.innerHTML = '<option value="">Select Pipeline Stage</option>';
        //         }
        //     });
        // });

        document.addEventListener('DOMContentLoaded', function() {

            const pipelineSelect = document.getElementById('pipeline_id');
            const stagesSelect = document.getElementById('pipeline_stage_id');

            console.log(pipelineSelect.offsetHeight);


            const fetchStages = (pipelineId, selectedStageId = null) => {
                const url = pipelineSelect.dataset.url.replace(':id', pipelineId);
                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        stagesSelect.innerHTML = '<option value="">Select Pipeline Stage</option>';
                        Object.entries(data).forEach(([id, name]) => {
                            stagesSelect.insertAdjacentHTML(
                                'beforeend',
                                `<option value="${id}" ${id == selectedStageId ? 'selected' : ''}>${name}</option>`
                            );
                        });
                    })
                    .catch(error => console.error('Error fetching stages:', error));
            };

            const initializeStages = () => {
                const pipelineId = pipelineSelect.value;
                const selectedStageId = stagesSelect.value;
                stagesSelect.innerHTML = '<option value="">Select Pipeline Stage</option>';
                if (pipelineId) {
                    fetchStages(pipelineId, selectedStageId);
                }
            };

            initializeStages();
            pipelineSelect.addEventListener('change', initializeStages);

            // Event listener for selection change
            $('#solution_id').on('change', function() {
                const selectedIds = $(this).val(); // Get selected solution IDs

                console.log('Solution Option Change & IDs As : ', selectedIds);

                if (selectedIds.length > 0) {
                    fetchSolutionsData(selectedIds);
                } else {
                    $('#solutionsTableContainer').addClass(
                        'hidden'); // Hide table if no solution is selected
                    $('#solutionsTableContainer').html(''); // Clear table content
                    updateTotalSalesPrice(0); // Reset total sales price
                }
            });

            function fetchSolutionsData(solutionIds) {
                $.ajax({
                    url: '{{ route('fetch.solutions') }}',
                    type: 'GET',
                    data: {
                        solution_ids: solutionIds
                    },
                    success: function(solutions) {
                        const container = $('#solutionsTableContainer');
                        container.removeClass('hidden'); // Show the container

                        // Clear any existing table
                        container.html('');

                        // Dynamically create the table structure
                        const table = `
                        <table id="solutionsTable" class="table-auto border-collapse border border-gray-300 w-full text-sm">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2">ID</th>
                                    <th class="border border-gray-300 px-4 py-2">Name</th>
                                    <th class="border border-gray-300 px-4 py-2">Price</th>
                                    <th class="border border-gray-300 px-4 py-2">Quantity</th>
                                    <th class="border border-gray-300 px-4 py-2">Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${solutions.map(solution => `
                                                <tr data-solution-id="${solution.id}" data-price="${solution.price}">
                                                    <td class="border border-gray-300 px-4 py-2">${solution.id}</td>
                                                    <td class="border border-gray-300 px-4 py-2">${solution.name}</td>
                                                    <td class="border border-gray-300 px-4 py-2">${solution.price}</td>
                                                    <td class="border border-gray-300 px-4 py-2">
                                                        <input type="number" name="quantities[${solution.id}]" min="1"
                                                            class="quantity-input form-input w-full text-center" value="1">
                                                    </td>
                                                    <td class="amount-cell border border-gray-300 px-4 py-2">${solution.price}</td>
                                                </tr>
                                            `).join('')}
                            </tbody>
                        </table>
                    `;


                        // Add the table to the container
                        container.html(table);

                        // Attach event listeners to quantity inputs
                        attachQuantityInputListeners();
                        calculateTotalSalesPrice();
                    },
                    error: function(error) {
                        console.error('Error fetching solutions:', error);
                    }
                });
            }

            // Attach change listeners to quantity inputs
            function attachQuantityInputListeners() {
                $('.quantity-input').on('input', function() {
                    const row = $(this).closest('tr');
                    const price = parseFloat(row.data('price')); // Get price from row's data attribute
                    const quantity = parseInt($(this).val()) || 0; // Get quantity input value
                    const amountCell = row.find('.amount-cell');

                    // Update the amount for this row
                    const amount = price * quantity;
                    amountCell.text(amount.toFixed(2));

                    // Recalculate total sales price
                    calculateTotalSalesPrice();
                });
            }

            // Calculate and update the total sales price
            function calculateTotalSalesPrice() {
                let total = 0;
                $('.amount-cell').each(function() {
                    total += parseFloat($(this).text()) || 0;
                });
                updateTotalSalesPrice(total);
            }

            // Update the total sales price input field
            function updateTotalSalesPrice(total) {
                // $('#sales_price').val(total.toFixed(2));
                $('#price').val(total.toFixed(2));
            }

            const salesPriceInput = document.getElementById('price');
            const discountPercentageInput = document.getElementById('discount_percentage');
            const finalPriceInput = document.getElementById('final_price');

            // Function to calculate the final price based on sales price and discount
            function calculateFinalPrice() {
                const salesPrice = parseFloat(salesPriceInput.value);
                const discountPercentage = parseFloat(discountPercentageInput.value);

                if (!isNaN(salesPrice) && !isNaN(discountPercentage)) {
                    // Calculate the discount amount
                    const discountAmount = (salesPrice * discountPercentage) / 100;
                    const finalPrice = salesPrice - discountAmount;

                    // Set the final price
                    finalPriceInput.value = finalPrice.toFixed(2); // Show two decimal places
                } else {
                    // If input is invalid or empty, reset the final price
                    finalPriceInput.value = '';
                }
            }

            // Add event listener to discount input to recalculate when the discount percentage changes
            discountPercentageInput.addEventListener('input', calculateFinalPrice);
        });
    </script>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.select2').forEach(function(select) {
                $(select).select2({
                    multiple: true,
                    placeholder: 'All',
                });

                $(select).on('select2:select select2:unselect', fetchContacts);
            });

            const filters = ['stage', 'tags', 'engagement', 'lead_status', 'source_id', 'organization_id'];
            const table = document.getElementById('contacts-table');

            filters.forEach(filter => {
                const element = document.getElementById(filter);

                if (element && !element.classList.contains('select2')) {
                    element.addEventListener('change', fetchContacts);
                }
            });

            fetchContacts();

            function fetchContacts() {
                const filterValues = {};

                filters.forEach(filter => {
                    const element = document.getElementById(filter);

                    if (element.multiple) {
                        filterValues[filter] = Array.from(element.selectedOptions).map(option => option
                            .value);
                    } else {
                        filterValues[filter] = element.value;
                    }
                });

                fetch("{{ route('email.fetch') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(filterValues)
                    })
                    .then(response => response.json())
                    .then(data => {
                        table.innerHTML = '';
                        data.forEach(contact => {
                            table.innerHTML += `
                        <tr>
                            <x-td>${contact.name}</x-td>
                            <x-td>${contact.email}</x-td>
                            <x-td>${contact.phone}</x-td>
                            <x-action-td><button class="text-green-500 hover:text-green-700" title="Send Email" onclick="sendEmail(${contact.id})"><i class="fa fa-paper-plane text-lg"></i></button></x-action-td>
                        </tr>
                    `;
                        });
                    });
            }

            window.sendEmail = function(contactId) {
                fetch("{{ route('email.send') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            contact_id: contactId
                        })
                    })
                    .then(response => response.json())
                    .then(data => notyf.success(data.message));
            };
        });
    </script> --}}
@endsection
