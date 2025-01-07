@extends('layouts.vertical', ['title' => 'Support', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Support Pipelines</h4>
                <div class="flex items-center gap-2">

                    <button class="btn-code" data-clipboard-action="add"
                        onclick="openModal('{{ route('support-pipelines.create') }}')">
                        <i class="mgc_add_line text-lg"></i>
                        <span class="ms-2">Add</span>
                    </button>
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
                                <tr>
                                    <x-th>No</x-th>
                                    <x-th>Name</x-th>
                                    <x-th align="text-end">Action</x-th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($support_pipelines as $key => $support_pipeline)
                                    <tr>
                                        <x-td>{{ $support_pipelines->firstItem() + $key }}</x-td>
                                        <x-td>{{ $support_pipeline->name }}</x-td>
                                        <x-action-td :editModal="[
                                            'route' => route('support-pipelines.edit', [
                                                'support_pipeline' => $support_pipeline->encrypted_id(),
                                            ]),
                                        ]" :simpleDelete="[
                                            'name' => $support_pipeline->name,
                                            'route' => route('support-pipelines.destroy', [
                                                'support_pipeline' => $support_pipeline->encrypted_id(),
                                            ]),
                                        ]" />
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <x-pagination :paginator="$support_pipelines" />
                </div>
            </div>
        </div>
    </div>
@endsection
