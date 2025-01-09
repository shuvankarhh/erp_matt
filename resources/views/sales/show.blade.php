@extends('layouts.vertical', ['title' => 'Sale', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-white border-b px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Sale Details</h2>
            <div class="flex items-center">
                <a href="{{ route('sale.invoice.download', $sale->id) }}"
                    class="flex items-center bg-blue-500 text-white hover:bg-blue-700 font-semibold text-sm p-2 rounded-lg dark:bg-slate-700 dark:text-gray-400 dark:hover:text-white"
                    title="Add">
                    <i class="fa fa-plus text-md"></i>
                    <span class="ml-1">Download Invoice</span>
                </a>
            </div>
        </div>
        <div class="p-6">
            <div class="p-8 bg-white border rounded shadow-lg">
                <!-- Invoice Header -->
                <div class="flex justify-between items-center border-b pb-4">
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-6">
                        <span class="text-lg font-bold">CodeCloud Technology</span>
                    </div>
                    <div class="text-right">
                        <div class="text-sm">
                            <span class="font-semibold">Date:</span>
                            <strong>April 04, 2024</strong>
                        </div>
                        <div class="text-sm">
                            <span class="font-semibold">Invoice #:</span>
                            <strong>BRA-00335</strong>
                        </div>
                    </div>
                </div>

                <!-- Invoice Body -->
                <div class="grid grid-cols-2 gap-8 py-6">
                    <div>
                        <h5 class="text-lg font-bold mb-2">Billing Information</h5>
                        <p>John Doe</p>
                        <p>123, ABC Street</p>
                        <p>Los Angeles, CA</p>
                        <p>USA</p>
                        <p>Email: john@example.com</p>
                        <p>Phone: +1(123)45678910</p>
                    </div>
                    <div>
                        <h5 class="text-lg font-bold mb-2">{{ $contact->organization->name ?? null }}</h5>
                        <p>{{ $contact->name ?? null }}</p>
                        <p>{{ $contact->email ?? null }}</p>
                        <p>{{ $contact->phone_code ?? null }}{{ $contact->phone ?? null }}</p>
                    </div>
                </div>

                <!-- Invoice Table -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-200 text-sm">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="border p-2">#</th>
                                <th class="border p-2">Solution</th>
                                <th class="border p-2">Type</th>
                                <th class="border p-2">Quantity</th>
                                <th class="border p-2">Unit Price</th>
                                <th class="border p-2">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sale->solutions as $solution)
                                <tr>
                                    @php $i = 1; @endphp
                                    <td class="border p-2 text-center">{{ $i++ }}</td>
                                    <td class="border p-2">{{ $solution->name }}</td>
                                    <td class="border p-2">
                                        @isset($solution->type)
                                            {{ $solution->type == 1 ? 'Product' : ($solution->type == 2 ? 'Service' : '') }}
                                        @endisset
                                    </td>
                                    {{-- <td class="border p-2 text-center">{{ $saleSolution->quantity }}</td> --}}
                                    <td class="border p-2 text-center">{{ $solution->pivot->quantity }}</td>
                                    <td class="border p-2 text-right">{{ $solution->price }}</td>
                                    @php
                                        // $amount = $solution->price * $saleSolution->quantity;
                                        $amount = $solution->price * $solution->pivot->quantity;
                                    @endphp
                                    <td class="border p-2 text-right">{{ $amount }}</td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="5" class="border p-2 text-right font-semibold">Discount Percentage:</td>
                                {{-- <td class="border p-2 text-right">{{ $saleSolution->discount_percentage }}%</td> --}}
                                <td class="border p-2 text-right">{{ $solution->pivot->discount_percentage }}%</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="border p-2 text-right font-semibold">Total Amount:</td>
                                @php
                                    // $totalAmount =
                                    //     $solution->price * $saleSolution->quantity -
                                    //     ($solution->price * $saleSolution->discount_percentage) / 100;

                                    $totalAmount =
                                        $solution->price * $solution->pivot->quantity -
                                        ($solution->price * $solution->pivot->discount_percentage) / 100;
                                @endphp
                                <td class="border p-2 text-right">{{ $totalAmount }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Total -->
                <div class="text-right mt-4">
                    <p class="text-lg font-bold">
                        Total: {{ $totalAmount }}{{ $solution->currency->symbol }}
                    </p>
                </div>

                <!-- Footer -->
                <div class="border-t mt-8 pt-4 text-center text-sm">
                    <p class="font-semibold">CodeCloud Technology</p>
                    <p>codecloud@gmail.com</p>
                    <p>+8801858143743</p>
                </div>
            </div>

        </div>
    </div>
@endsection
