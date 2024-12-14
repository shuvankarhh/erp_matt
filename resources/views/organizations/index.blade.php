@extends('layouts.vertical', ['title' => 'Organizations', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">Organizations</h4>
                <div class="flex items-center">
                    <button class="btn-code" data-clipboard-action="add"
                        onclick="addTag('{{ route('organizations.create') }}')">
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
                        <table id="datatable-1" class="table style-1  table-bordered table-hover">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <x-th>No</x-th>
                                    <x-th>Name</x-th>
                                    <x-th>Domain Name</x-th>
                                    <x-th>Email</x-th>
                                    <x-th>Phone</x-th>
                                    <x-th align="text-end">Action</x-th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sl = 1;
                                @endphp

                                @foreach ($organizations as $key => $organization)
                                    <tr>
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
                                        ])" :delete="route('organizations.destroy', [
                                            'organization' => $organization->encrypted_id(),
                                        ])" />
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- {!! $pagination !!} --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
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
