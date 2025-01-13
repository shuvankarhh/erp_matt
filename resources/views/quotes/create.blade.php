@extends('layouts.vertical', ['title' => 'Quotes', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

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
                <h4 class="card-title">Add Quote</h4>
            </div>
        </div>
        <div class="p-6">
            <form id="add_quote_form" action="{{ route('quotes.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                    <x-input label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Name" required />

                    <x-input type="date" label="Expiration Date" name="expiration_date"
                        value="{{ old('expiration_date') }}" required />

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
                    onclick="storeOrUpdate('add_quote_form', event)">
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

        // $('#timezone_id').select2({
        //     width: '100%',
        //     placeholder: "Search for a timezone",
        //     minimumInputLength: 1,
        //     ajax: {
        //         url: '{{ route('timezone.search') }}',
        //         dataType: 'json',
        //         delay: 250,
        //         processResults: function(data) {
        //             return {
        //                 results: data.map(function(timezone) {
        //                     // results: data.slice(0, 10).map(function(timezone) {
        //                     return {
        //                         id: timezone.id,
        //                         text: timezone.name
        //                     };
        //                 })
        //             };
        //         },
        //         cache: true
        //     },
        //     // multiple: true,
        //     // maximumSelectionLength: 1,
        // });

        document.addEventListener('DOMContentLoaded', function() {
            const solutionSelect = document.getElementById('solution_id');
            const selectedSolutions = Array.from(solutionSelect.selectedOptions).map(option => option.value);

            const salesPriceInput = document.getElementById('price');
            const discountPercentageInput = document.getElementById('discount_percentage');
            const finalPriceInput = document.getElementById('final_price');

            console.log('Selected solutions on page load:', selectedSolutions);

            const inputData = {}; // Object to store quantities and discounts

            if (selectedSolutions.length > 0) {
                fetchSolutionsData(selectedSolutions);
            }

            $('#solution_id').on('change', function() {
                const selectedIds = $(this).val();
                console.log('Solution Option Change & IDs As : ', selectedIds);

                if (selectedIds.length > 0) {
                    fetchSolutionsData(selectedIds);
                } else {
                    $('#solutionsTableContainer').addClass('hidden').html('');

                    updateTotalSalesPrice(0);
                    updateFinalPrice(0);
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
                        container.removeClass('hidden');
                        container.html('');

                        const table = `
                <table id="solutionsTable" class="table-auto border-collapse border border-gray-300 w-full text-sm">
                    <thead>
                        <tr class="bg-gray-100">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Discount Percentage</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${solutions.map(solution => {
                            const storedQuantity = inputData[solution.id]?.quantity || 1;
                            const storedDiscount = inputData[solution.id]?.discount || 0;
                            const amount = solution.price * storedQuantity * (1 - storedDiscount / 100);

                            return `
                                    <tr data-solution-id="${solution.id}" data-price="${solution.price}">
                                        <td>${solution.id}</td>
                                        <td>${solution.name}</td>
                                        <td>${solution.price}</td>
                                        <td>
                                            <input type="number" name="quantity[${solution.id}]" min="1"
                                                class="quantity-input form-input w-full text-center"
                                                value="${storedQuantity}">
                                        </td>
                                        <td>
                                            <input type="number" name="discount[${solution.id}]" min="0" max="100"
                                                class="discount-percentage-input form-input w-full text-center"
                                                value="${storedDiscount}">
                                        </td>
                                        <td class="amount-cell">${amount.toFixed(2)}</td>
                                    </tr>
                                    `;
                        }).join('')}
                    </tbody>
                </table>
                `;

                        container.html(table);

                        attachInputListeners();
                        calculateTotalSalesPrice();
                        calculateFinalPrice();
                    },
                    error: function(error) {
                        console.error('Error fetching solutions:', error);
                    }
                });
            }

            function attachInputListeners() {
                $('.quantity-input, .discount-percentage-input').on('input', function() {
                    const row = $(this).closest('tr');
                    const solutionId = row.data('solution-id');
                    const price = parseFloat(row.data('price'));
                    const quantity = parseInt(row.find('.quantity-input').val()) || 0;
                    const discount = parseFloat(row.find('.discount-percentage-input').val()) ||
                        0;
                    const amountCell = row.find('.amount-cell');

                    // Update the inputData
                    inputData[solutionId] = {
                        quantity: quantity,
                        discount: discount,
                    };

                    const discountAmount = (price * discount) / 100;
                    const amount = (price - discountAmount) * quantity;
                    amountCell.text(amount.toFixed(2));

                    calculateTotalSalesPrice();
                    calculateFinalPrice();
                });
            }

            function calculateTotalSalesPrice() {
                let total = 0;
                $('.amount-cell').each(function() {
                    total += parseFloat($(this).text()) || 0;
                });
                updateTotalSalesPrice(total);
            }

            function updateTotalSalesPrice(total) {
                salesPriceInput.value = total.toFixed(2);
            }

            function calculateFinalPrice() {
                const salesPrice = parseFloat(salesPriceInput.value) || 0;
                const discountPercentage = parseFloat(discountPercentageInput.value) || 0;

                const discountAmount = (salesPrice * discountPercentage) / 100;
                const finalPrice = salesPrice - discountAmount;

                finalPriceInput.value = finalPrice.toFixed(2);
            }

            discountPercentageInput.addEventListener('input', calculateFinalPrice);
        });
    </script>
@endsection
