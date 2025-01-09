@extends('layouts.vertical', ['title' => 'Sale', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Sales</h4>
                <div class="flex items-center">
                    <a href="{{ route('sales.create') }}" class="btn-code">
                        <i class="mgc_add_line text-lg"></i>
                        <span class="ms-2">Add</span>
                    </a>
                </div>
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
                                    <x-th>Timezone</x-th>
                                    <x-th>Pipeline</x-th>
                                    <x-th>Pipeline Stage</x-th>
                                    <x-th>Price</x-th>
                                    <x-th align="text-end">Action</x-th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($sales as $key => $sale)
                                    <tr>
                                        <x-td>{{ $sales->firstItem() + $key }}</x-td>
                                        <x-td>{{ $sale->name ?? null }}</x-td>
                                        <x-td>{{ $sale->timezone->name ?? null }}</x-td>
                                        <x-td>{{ $sale->pipeline->name ?? null }}</x-td>
                                        <x-td>{{ $sale->pipelineStage->name ?? null }}</x-td>
                                        <x-td>{{ (int) $sale->price ?? null }}</x-td>
                                        <x-action-td :show="route('sales.show', [
                                            'sale' => $sale->encrypted_id(),
                                        ])" :edit="route('sales.edit', [
                                            'sale' => $sale->encrypted_id(),
                                        ])" :simpleDelete="[
                                            'name' => $sale->name,
                                            'route' => route('sales.destroy', [
                                                'sale' => $sale->encrypted_id(),
                                            ]),
                                        ]" />
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <x-pagination :paginator="$sales" />
                </div>
            </div>
        </div>
    </div>
@endsection
