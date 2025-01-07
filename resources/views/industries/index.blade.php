@extends('layouts.vertical', ['title' => 'Industry', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Industries</h4>
                <div class="flex items-center gap-2">

                    <button class="btn-code" data-clipboard-action="add"
                        onclick="openModal('{{ route('industries.create') }}')">
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
                                    <x-th>No</x-th>
                                    <x-th>Name</x-th>
                                    <x-th align="text-end">Action</x-th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($industries as $key => $industry)
                                    <tr>
                                        <x-td>{{ $industries->firstItem() + $key }}</x-td>
                                        <x-td>{{ $industry->name }}</x-td>
                                        <x-action-td :editModal="[
                                            'route' => route('industries.edit', [
                                                'industry' => $industry->encrypted_id(),
                                            ]),
                                        ]" :simpleDelete="[
                                            'name' => $industry->name,
                                            'route' => route('industries.destroy', [
                                                'industry' => $industry->encrypted_id(),
                                            ]),
                                        ]" />
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <x-pagination :paginator="$industries" />
                </div>
            </div>
        </div>
    </div>
@endsection
