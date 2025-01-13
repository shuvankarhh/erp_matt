<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
        }

        .content {
            padding: 20px;
        }

        .invoice-header,
        .invoice-footer {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-header {
            font-size: 24px;
            font-weight: bold;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .invoice-table th {
            background-color: #f4f4f4;
        }

        .total {
            text-align: right;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="invoice-header">
            Invoice #{{ $sale->invoice_number }} <br>
            Date: {{ $sale->created_at->format('F d, Y') }}
        </div>

        <h3>Billing Information</h3>
        <p>{{ $sale->customer_name }}</p>
        <p>{{ $sale->customer_address }}</p>

        <h3>Solutions</h3>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Solution</th>
                    <th>Type</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sale->solutions as $index => $solution)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $solution->name }}</td>
                        <td>{{ $solution->type == 1 ? 'Product' : 'Service' }}</td>
                        <td>{{ $solution->pivot->quantity }}</td>
                        <td>{{ number_format($solution->price, 2) }}</td>
                        <td>{{ number_format($solution->pivot->quantity * $solution->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            Total:
            {{ number_format(
                $sale->solutions->sum(function ($solution) {
                    return $solution->pivot->quantity * $solution->price;
                }),
                2,
            ) }}
        </div>

        <div class="invoice-footer">
            Thank you for your business!
        </div>
    </div>
</body>

</html>
