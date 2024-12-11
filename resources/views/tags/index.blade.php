@php
    use App\Services\LocalTime;
    use App\Services\Photo;
@endphp

@extends('layouts.vertical', ['title' => 'Tags', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Tags</h4>
                <div class="flex items-center gap-2">
                    <button type="button" class="btn-code" data-fc-type="collapse" data-fc-target="StripedRowTableHtml">
                        <i class="mgc_eye_line text-lg"></i>
                        <span class="ms-2">Code</span>
                    </button>

                    <button class="btn-code" data-clipboard-action="copy">
                        <i class="mgc_copy_line text-lg"></i>
                        <span class="ms-2">Copy</span>
                    </button>

                    <button class="btn-code" data-clipboard-action="add" onclick="addTag('{{ route('tags.create') }}')">
                        <i class="mgc_add_line text-lg"></i>
                        <span class="ms-2">Add</span>
                    </button>

                    {{-- <button @click="$dispatch('open-modal')" class="px-4 py-2 bg-blue-500 text-white rounded">
                        Add Tag
                    </button>

                    <button class="btn btn-primary" onclick="addTag('{{ route('tags.create') }}')">
                        <i class="fa-solid fa-plus"></i> Add
                    </button> --}}
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

                                            {{-- <a class="text-danger hover:text-gray-700" href="#" title="Delete"><i
                                                    class="mgc_delete_2_fill text-xl"></i></a> --}}

                                            <a class="text-success hover:text-gray-700"
                                                onclick="editTag('{{ route('tags.edit', ['tag' => $tag->encrypted_id()]) }}')"
                                                title="Edit">
                                                <i class="fa-solid fa-pen-to-square text-lg"></i>
                                            </a>

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

    {{-- <div x-data="{ open: false }">
        <!-- Button to open the modal -->
        <button @click="open = true" class="btn btn-primary">
            Open Modal
        </button>

        <!-- Modal -->
        <div x-show="open" x-transition class="modal fade show" tabindex="-1" id="generalModal" style="display: block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Tag</h5>
                        <button type="button" class="close" @click="open = false" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('tags.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Type</label>
                                <select class="form-control" id="type" name="type" required>
                                    <option value="1" selected>Contact</option>
                                    <option value="2">Task</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" @click="open = false">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection


@section('script')
    @vite('resources/js/pages/dashboard.js')
    @vite(['resources/js/pages/highlight.js'])

    <script>
        function addTag(url) {
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('modalContent').innerHTML = data.html;
                    window.dispatchEvent(new CustomEvent('open-modal'));
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        let createTag = async (url) => {
            fetch(url, {
                    method: "GET",
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                })
                .then(response => response.text())
                .then(responseText => {
                    let responseJson = JSON.parse(responseText);
                    if (responseJson.response_type == 0) {
                        showErrorsInNotifi(responseJson.response_error);
                    } else {
                        document.getElementById('generalModalTop').innerHTML = responseJson.response_body;
                        displayModalTop();

                    }
                });
        };

        let editTag = async (url) => {
            fetch(url, {
                    method: "GET",
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                })
                .then(response => response.text())
                .then(responseText => {
                    let responseJson = JSON.parse(responseText);
                    if (responseJson.response_type == 0) {
                        showErrorsInNotifi(responseJson.response_error);
                    } else {
                        document.getElementById('generalModalTop').innerHTML = responseJson.response_body;
                        displayModalTop();

                    }
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
