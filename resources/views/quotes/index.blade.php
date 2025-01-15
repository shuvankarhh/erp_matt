@extends('layouts.vertical', ['title' => 'Quotes', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-white border-b px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">All Quotes</h2>
            <div class="flex items-center">
                <a href="{{ route('quotes.create') }}"
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
                                    <x-th>Name</x-th>
                                    <x-th>Expiration Date</x-th>
                                    <x-th align="text-end">Action</x-th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($quotes as $key => $quote)
                                    <tr>
                                        <x-td>{{ $quotes->firstItem() + $key }}</x-td>
                                        <x-td>{{ $quote->name ?? null }}</x-td>
                                        <x-td>{{ $quote->expiration_date->format('d/m/Y') ?? null }}</x-td>
                                        <x-action-td :edit="route('quotes.edit', [
                                            'quote' => $quote->encrypted_id(),
                                        ])" :simpleDelete="[
                                            'name' => $quote->name . ' - ' . $quote->expiration_date->format('d/m/Y'),
                                            'route' => route('quotes.destroy', [
                                                'quote' => $quote->encrypted_id(),
                                            ]),
                                        ]" />
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <x-pagination :paginator="$quotes" />
                </div>
            </div>
        </div>
    </div>
@endsection
