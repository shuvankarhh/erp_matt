@extends('layouts.vertical', ['title' => 'Tag', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Tags</h4>
                <div class="flex items-center gap-2">
                    <button class="btn-code" data-clipboard-action="add" onclick="openModal('{{ route('tags.create') }}')">
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
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Name
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">TYpe
                                    </th>

                                    <th scope="col"
                                        class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase">Action
                                    </th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($tags as $key => $tag)
                                    <tr>
                                        <x-td>{{ $tags->firstItem() + $key }}</x-td>
                                        <x-td>{{ $tag->name ?? null }}</x-td>
                                        <x-td>{{ $tag->type == 1 ? 'Contact' : 'Task' }}</x-td>
                                        <x-action-td :editModal="[
                                            'route' => route('tags.edit', [
                                                'tag' => $tag->encrypted_id(),
                                            ]),
                                        ]" :simpleDelete="[
                                            'name' => $tag->name,
                                            'route' => route('tags.destroy', [
                                                'tag' => $tag->encrypted_id(),
                                            ]),
                                        ]" />
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <x-pagination :paginator="$tags" />
                </div>
            </div>
        </div>
    </div>
@endsection
