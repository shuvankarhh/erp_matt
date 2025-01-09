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
            <form id="add_invoice_form" action="{{ route('invoices.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                    <x-input type="date" label="Invoice Date" name="invoice_date" value="{{ old('invoice_date') }}" required />

                    <x-input type="date" label="Due Date" name="due_date" value="{{ old('due_date') }}" required />

                    <x-input type="number" label="PO Number" name="po_number" value="{{ old('po_number') }}"
                        placeholder="Enter PO Number" required readonly />

                    <x-select label="Timezone" name="timezone_id" selected="{{ old('timezone_id') }}" required />

                    <x-select label="Sale Owner" name="owner_id" :options="$staffs" placeholder="Select Sale Owner"
                        selected="{{ old('owner_id') }}" />

                    <x-select label="Organization" name="organization_id" :options="$organizations"
                        placeholder="Select Organization" selected="{{ old('organization_id') }}" />

                    <x-select label="Contact" name="contact_id" :options="$contacts" selected="{{ old('contact_id') }}" select2
                        multiple />

                    <x-select label="Solution" name="solution_id" :options="$solutions" selected="{{ old('solution_id') }}"
                        select2 multiple />

                    <div id="solutionsTableContainer" class="col-span-2 hidden">
                    </div>

                    <x-input type="number" label="Price" name="price" value="{{ old('price') }}"
                        placeholder="Enter Price" required readonly />

                    <x-input type="number" label="Discount Percentage" name="discount_percentage"
                        value="{{ old('discount_percentage') }}" placeholder="Enter Discount Percentage" required />

                    <x-input type="number" label="Final Price" name="final_price" value="{{ old('final_price') }}"
                        placeholder="Enter Final Price" required readonly />

                    <x-textarea label="Comment" name="comment" placeholder="Enter Your Comment" />
                </div>

                <button type="submit"
                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onclick="storeOrUpdate('add_invoice_form', event)">
                    Save
                </button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
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

        document.addEventListener('DOMContentLoaded', function() {
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
@endsection
