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
                <h4 class="card-title">Edit Quote</h4>
            </div>
        </div>
        <div class="p-6">
            <form id="edit_quote_form" action="{{ route('quotes.update', ['quote' => $quote->encrypted_id()]) }}"
                method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                    <x-input label="Name" name="name" value="{{ old('name') ?? $quote->name }}" placeholder="Enter Name"
                        required />

                    <x-input type="date" label="Expiration Date" name="expiration_date"
                        value="{{ old('expiration_date') ?? $quote->expiration_date->format('Y-m-d') }}" required />

                    <x-select label="Sale Owner" name="owner_id" :options="$staffs" placeholder="Select Sale Owner"
                        selected="{{ old('owner_id') ?? $quote->owner_id }}" />

                    <x-select label="Organization" name="organization_id" :options="$organizations"
                        placeholder="Select Organization"
                        selected="{{ old('organization_id') ?? $quote->organization_id }}" />

                    {{-- Previous Code --}}
                    {{-- <x-select label="Contact" name="contact_id" :options="$contacts" selected="{{ old('contact_id') ?? $quote->contact_id }}" select2
                        multiple />

                    <x-select label="Solution" name="solution_id" :options="$solutions" selected="{{ old('solution_id') ?? $quote->solution_id }}"
                        select2 multiple /> --}}

                    {{-- New Updated Code --}}
                    <x-select label="Contact" name="contact_id" :options="$contacts" :selected="old('contact_id', $quote->contacts->pluck('id')->toArray())" multiple />

                    <x-select label="Solution" name="solution_id" :options="$solutions" :selected="old('solution_id', $quote->solutions->pluck('id')->toArray())" multiple />

                    <div id="solutionsTableContainer" class="col-span-2 hidden">
                    </div>

                    <x-input type="number" label="Price" name="price" value="{{ old('price') ?? $quote->price }}"
                        placeholder="Enter Price" required readonly />

                    <x-input type="number" label="Discount Percentage" name="discount_percentage"
                        value="{{ old('discount_percentage') ?? $quote->discount_percentage }}"
                        placeholder="Enter Discount Percentage" required />

                    <x-input type="number" label="Final Price" name="final_price"
                        value="{{ old('final_price') ?? $quote->final_price }}" placeholder="Enter Final Price" required
                        readonly />

                    <x-textarea label="Comment" name="comment" value="{{ $quote->comment }}"
                        placeholder="Enter Your Comment" />
                </div>

                <button type="submit"
                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    onclick="storeOrUpdate('edit_quote_form', event)">
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

        document.addEventListener('DOMContentLoaded', function() {
            const quoteId = @json($quote->id);

            const solutionSelect = document.getElementById('solution_id');
            const selectedSolutions = Array.from(solutionSelect.selectedOptions).map(option => option.value);

            const salesPriceInput = document.getElementById('price');
            const discountPercentageInput = document.getElementById('discount_percentage');
            const finalPriceInput = document.getElementById('final_price');

            if (selectedSolutions.length > 0) {
                if (quoteId) {
                    fetchSolutionsData(selectedSolutions, quoteId);
                } else {
                    console.error('Quote ID is missing.');
                }
            }

            $('#solution_id').on('change', function() {
                const selectedIds = $(this).val();

                if (selectedIds.length > 0) {
                    fetchSolutionsData(selectedIds, quoteId);
                } else {
                    $('#solutionsTableContainer').addClass('hidden').html('');

                    updateTotalSalesPrice(0);

                    calculateFinalPrice();
                }
            });

            function fetchSolutionsData(solutionIds, quoteId) {
                $.ajax({
                    url: `/fetch/quote/${quoteId}/solutions`,
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
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">#</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Name</th>
                            <th class="border border-gray-300 px-4 py-2">Price</th>
                            <th class="border border-gray-300 px-4 py-2">Quantity</th>
                            <th class="border border-gray-300 px-4 py-2">Discount (%)</th>
                            <th class="border border-gray-300 px-4 py-2">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        ${solutions.map((solution, index) =>  {

                            return `
                                            <tr data-solution-id="${solution.id}" data-price="${solution.price}">
                                                <td class="border border-gray-300 px-4 py-2 text-center">${index + 1}</td> <!-- Display serial number -->
                                                <td class="border border-gray-300 px-4 py-2">${solution.name}</td>
                                                <td class="border border-gray-300 px-4 py-2 text-center">${solution.price}</td>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    <input type="number" name="quantity[${solution.id}]" min="1"
                                                        class="quantity-input form-input w-full text-center" value="${solution.quantity ?? 1}">
                                                </td>
                                                <td class="border border-gray-300 px-4 py-2">
                                                    <input type="number" name="discount[${solution.id}]" min="0" max="100"
                                                        class="discount-percentage-input form-input w-full text-center" value="${solution.discount_percentage ?? 0}">
                                                </td>
                                                <td class="amount-cell border border-gray-300 px-4 py-2 text-center">${((solution.price * (solution.quantity ?? 1)) * (1 - solution.discount_percentage / 100)).toFixed(2)}</td>
                                            </tr>`;
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
