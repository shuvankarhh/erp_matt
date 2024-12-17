@extends('layouts.vertical', ['title' => 'Organizations', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">Organizations</h4>
                <div class="flex items-center">
                    <a href="{{ route('organizations.create') }}" class="btn-code">
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
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <x-th>No</x-th>
                                    <x-th>Name</x-th>
                                    <x-th>Domain Name</x-th>
                                    <x-th>Email</x-th>
                                    <x-th>Phone</x-th>
                                    <x-th align="text-end">Action</x-th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @php
                                    $sl = 1;
                                @endphp

                                @foreach ($organizations as $key => $organization)
                                    <tr>
                                        {{-- <tr class="border-b border-gray-200 hover:bg-gray-100"> --}}
                                        <x-td>{{ $sl++ }}</x-td>
                                        <x-td>
                                            <a
                                                href="{{ route('organizations.show', ['organization' => $organization->encrypted_id()]) }}">
                                                {{ $organization->name ?? null }}
                                            </a>
                                        </x-td>
                                        <x-td>{{ $organization->domain_name }}</x-td>
                                        <x-td>{{ $organization->email }}</x-td>
                                        <x-td>{{ $organization->phone }}</x-td>
                                        <x-action-td :edit="route('organizations.edit', [
                                            'organization' => $organization->encrypted_id(),
                                        ])" :simpleDelete="[
                                            'name' => $organization->name,
                                            'route' => route('organizations.destroy', [
                                                'organization' => $organization->encrypted_id(),
                                            ]),
                                        ]" />
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
    <script>
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
                        // await Swal.fire(
                        //     'Deleted!',
                        //     `"${resourceName}" has been deleted.`,
                        //     'success'
                        // );

                        location.reload();
                    } else {
                        const errorText = await response.text();
                        throw new Error(errorText || 'Failed to delete the resource.');
                    }
                } catch (error) {
                    // Swal.fire(
                    //     'Error!',
                    //     `An error occurred: ${error.message}`,
                    //     'error'
                    // );

                    // notyf.error(`An error occurred: ${error.message}`);

                    console.error(error.message);
                }
            }
        }

        // const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

        // function simpleResourceDelete(resourceName, deleteUrl) {
        //     Swal.fire({
        //         title: `Delete "${resourceName}"?`,
        //         text: "This action cannot be undone!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonText: 'Yes, delete it!',
        //         cancelButtonText: 'Cancel',
        //         confirmButtonColor: '#d33'
        //     }).then(result => {
        //         if (!result.isConfirmed) return;

        //         fetch(deleteUrl, {
        //                 method: 'DELETE',
        //                 headers: {
        //                     'X-CSRF-TOKEN': csrfToken,
        //                     'Content-Type': 'application/json'
        //                 }
        //             })
        //             .then(response => {
        //                 if (response.ok) return location.reload();
        //                 return response.text().then(text => {
        //                     throw new Error(text || 'Failed to delete the resource.');
        //                 });
        //             })
        //             .catch(error => {
        //                 Swal.fire('Error!', error.message, 'error');
        //             });
        //     });
        // }

        let createOrganization = async (url) => {
            hideAllNotification();
            fetch(url, {
                    method: "GET",
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                })
                .then(response => response.text())
                .then(responseText => {
                    let responseJson = JSON.parse(responseText);
                    console.log(responseJson);
                    if (responseJson.response_type == 0) {
                        showErrorsInNotifi(responseJson.response_error);
                    } else {
                        document.getElementById('generalModalTop').innerHTML = responseJson.response_body;
                        displayModalTop();

                    }
                });
        };



        let editOrganization = async (url) => {
            hideAllNotification();
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
    </script>
@endsection
