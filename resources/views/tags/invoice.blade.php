@php
    use App\Services\LocalTime;
    use App\Services\Photo;
@endphp

<x-dashboard-layout pagename="Invoice">
    <x-slot name='css'>
        {{-- BEGIN PAGE LEVEL CUSTOM STYLES --}}
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
        
        {{-- END PAGE LEVEL CUSTOM STYLES --}}

        {{-- BEGIN UMTT CUSTOM STYLES --}}
        <link rel="stylesheet" type="text/css" href="/css/umtt/datatable.css" />
        {{-- END UMTT CUSTOM STYLES --}}

        {{-- Invoice CSS --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('css/invoice.css') }}" />
    </x-slot>

    <br>

    @dd($contacts)

    <div class="content">
        <div class="invoice-header">
            <div class="header-left" id="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                <span>Cloud Code</span>
            </div>
            <div class="header-right">
                <div class="date">
                    <span> Date </span>
                    <strong> April 04, 2024 </strong>
                </div>
                <div class="invoice-code">
                    <span> Invoice # </span>
                    <strong> BRA-00335 </strong>
                </div>
            </div>
        </div>

        <div class="invoice-body">
            <div class="left">
                <h5> Billing Information </h5>
                <p> John Doe </p>
                <p>123, ABC Street</p>
                <p>Los Angeles, CA</p>
                <p>USA</p>
                <p>Email: john@example.com</p>
                <p>Phone: +1(123)45678910</p>
            </div>
            <div class="right">
                <h5> Billing Information </h5>
                <p> John Doe </p>
                <p>123, ABC Street</p>
                <p>Los Angeles, CA</p>
                <p>USA</p>
                <p>Email: john@example.com</p>
                <p>Phone: +1(123)45678910</p>
            </div>
        </div>

        <div class="invoice-table">
            <table>
                <thead>
                    <tr>
                        <th> # </th>
                        <th> Solution </th>
                        <th> Type </th>
                        <th> Quantity </th>
                        <th> Unit Price </th>
                        <th> Amount </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @php
                            $i = 1;
                        @endphp
                        <td> {{ $i++ }} </td>
                        <td> {{ $solution->name }} </td>
                        <td>
                            @isset($solution->type)
                            @if ($solution->type == 1)
                                Product
                            @endif
                            @if ($solution->type == 2)
                                Service
                            @endif
                            @endisset
                        </td>
                        <td> {{ $saleSolution->quantity }} </td>
                        <td> {{ $solution->price }} </td>
                        @php
                            $amount = $solution->price * $saleSolution->quantity;
                        @endphp
                        <td> {{ $amount }} </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: right;"> Discount Percentage : </td>
                        <td> {{ $saleSolution->discount_percentage }}% </td>
                    </tr>
                    <tr>
                        <td colspan="5" style="text-align: right;"> Total Amount : </td>
                        @php
                            $totalAmount =
                                ($solution->price * $saleSolution->quantity) -
                                ($solution->price * $saleSolution->discount_percentage) / 100;
                        @endphp
                        <td> {{ $totalAmount }} </td>
                    </tr>
                </tbody>
            </table>

            <div class="total">
                <p><strong> Total : {{ $totalAmount }}$ </strong></p>
            </div>
        </div>

        <div class="invoice-footer">
            <div class="company-name">
                <span> Cloud Code Technology </span>
            </div>
            <div class="company-email">
                <span> cloudcode@gmail.com </span>
            </div>
            <div class="company-phone">
                <span> +8801858143743 </span>
            </div>
        </div>
    </div>

    <x-slot name='scripts'>
        <script src="/js/umtt/biddings.js"></script>
    </x-slot>
</x-dashboard-layout>
