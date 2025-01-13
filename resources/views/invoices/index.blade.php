@extends('layouts.vertical', ['title' => 'Invoices', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-white border-b px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">All Invoices</h2>
            <div class="flex items-center">
                <a href="{{ route('invoices.create') }}"
                    class="flex items-center bg-blue-500 text-white hover:bg-blue-700 font-semibold text-sm p-2 rounded-lg dark:bg-slate-700 dark:text-gray-400 dark:hover:text-white"
                    title="Add">
                    <i class="fa fa-plus text-md"></i>
                    <span class="ml-1">Add</span>
                </a>
            </div>
        </div>
        <div class="p-6">
            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <x-th>No</x-th>
                                    <x-th>Invoice Date</x-th>
                                    <x-th>Due Date</x-th>
                                    <x-th>PO Number</x-th>
                                    <x-th align="text-end">Action</x-th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($invoices as $key => $invoice)
                                    <tr>
                                        <x-td>{{ $invoices->firstItem() + $key }}</x-td>
                                        <x-td>{{ $invoice->invoice_date->format('d/m/Y') ?? null }}</x-td>
                                        <x-td>{{ $invoice->due_date->format('d/m/Y') ?? null }}</x-td>
                                        <x-td>{{ $invoice->po_number ?? null }}</x-td>
                                        <x-action-td :edit="route('invoices.edit', [
                                            'invoice' => $invoice->encrypted_id(),
                                        ])" :simpleDelete="[
                                            'name' => $invoice->invoice_date->format('d/m/Y') . ' & PO Number' . ' - ' . $invoice->po_number,
                                            'route' => route('invoices.destroy', [
                                                'invoice' => $invoice->encrypted_id(),
                                            ]),
                                        ]" />
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <x-pagination :paginator="$invoices" />
                </div>
            </div>
        </div>
    </div>
@endsection
