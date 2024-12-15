@php
    use App\Services\LocalTime;
    use App\Services\Photo;
@endphp

@extends('layouts.vertical', ['title' => 'Tags', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@if (session('success_message'))
    <div x-data="{ open: true }" x-show="open" class="fixed top-4 left-1/2 transform -translate-x-1/2 w-full max-w-xs bg-green-500 text-white p-4 rounded-lg shadow-md" role="alert">
        <div class="flex justify-between items-center">
            <span class="font-semibold">{{ session('success_message') }}</span>
            <button @click="open = false" class="ml-4 text-white focus:outline-none">
                <i class="fas fa-times"></i> <!-- Close icon -->
            </button>
        </div>
    </div>
@endif


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Tags</h4>
                <div class="flex items-center gap-2">
                    {{-- <button type="button" class="btn-code" data-fc-type="collapse" data-fc-target="StripedRowTableHtml">
                        <i class="mgc_eye_line text-lg"></i>
                        <span class="ms-2">Code</span>
                    </button> --}}

                    {{-- <button class="btn-code" data-clipboard-action="copy">
                        <i class="mgc_copy_line text-lg"></i>
                        <span class="ms-2">Copy</span>
                    </button> --}}

                    <button class="btn-code" data-clipboard-action="add" onclick="addTag('{{ route('tags.create') }}')">
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
                                @php
                                    $sl = 1;
                                    $page = request('page') ?? null;
                                    if (null !== $page) {
                                        if ($page == 0) {
                                            $sl = 1;
                                        } else {
                                            $sl = 20 * ($page - 1);
                                        }
                                    }
                                @endphp

                                @foreach ($tags as $tag)
                                    <tr>
                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                            {{ $sl++ }}</td>

                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                            {{ $tag->name }}</td>

                                        <td
                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                            {{ $tag->type }}</td>

                                        <td class="px-6 py-4 whitespace-nowrap text-end">
                                            <button class="text-success hover:text-gray-700" data-clipboard-action="add"
                                                onclick="editTag('{{ route('tags.edit', ['tag' => $tag->encrypted_id()]) }}')"
                                                title="Edit">
                                                <i class="fa-solid fa-pen-to-square text-lg"></i>
                                            </button>

                                            <button class="text-danger hover:text-gray-700"
                                                onclick="simpleResourceDelete('{{ $tag->name }}', '{{ route('tags.destroy', ['tag' => $tag->encrypted_id()]) }}')"
                                                title="Delete">
                                                <i class="fa-solid fa-trash-can text-lg"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    @vite('resources/js/pages/dashboard.js')
    @vite(['resources/js/pages/highlight.js'])

    <script>
        window.addTag = function(url) {
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    const modalContent = document.getElementById('modalContent');
                    if (modalContent) {
                        modalContent.innerHTML = data.html;
                        window.dispatchEvent(new Event('open-modal'));
                    } else {
                        console.error('Modal content element not found.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        };

        window.editTag = function(url) {
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    const modalContent = document.getElementById('modalContent');
                    if (modalContent) {
                        modalContent.innerHTML = data.html;
                        window.dispatchEvent(new Event('open-modal'));
                    } else {
                        console.error('Modal content element not found.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        };

        async function simpleResourceDelete(resourceName, deleteUrl) {

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const result = await Swal.fire({
                title: `Are you sure you want to delete "${resourceName}"?`,
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            });

            if (result.isConfirmed) {
                try {
                    const response = await fetch(deleteUrl, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json'
                        }
                    });

                    if (response.ok) {
                        await Swal.fire(
                            'Deleted!',
                            `"${resourceName}" has been deleted.`,
                            'success'
                        );

                        location.reload();
                    } else {
                        const errorText = await response.text();
                        throw new Error(errorText || 'Failed to delete the resource.');
                    }
                } catch (error) {
                    Swal.fire(
                        'Error!',
                        `An error occurred: ${error.message}`,
                        'error'
                    );
                }
            }
        }
    </script>
@endsection
