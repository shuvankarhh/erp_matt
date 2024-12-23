@extends('layouts.vertical', ['title' => 'Company Settings', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    {{-- Team Start Here --}}
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Teams</h4>
                <div class="flex items-center gap-2">

                    <button class="btn-code" data-clipboard-action="add" onclick="openModal('{{ route('teams.create') }}')">
                        <i class="mgc_add_line text-lg"></i>
                        <span class="ms-2">Add</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <div class="h-64 overflow-y-auto">
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
                                <tbody>
                                    @foreach ($teams as $key => $team)
                                        <tr>
                                            <x-td>{{ $loop->iteration }}</x-td>
                                            <x-td>{{ $team->name }}</x-td>
                                            <x-action-td :editModal="[
                                                'route' => route('teams.edit', [
                                                    'team' => $team->encrypted_id(),
                                                ]),
                                            ]" :simpleDelete="[
                                                'name' => $team->name,
                                                'route' => route('teams.destroy', [
                                                    'team' => $team->encrypted_id(),
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
    </div>
    {{-- Team End Here --}}

    {{-- Designation Start Here --}}
    <div class="card mt-4">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Designations</h4>
                <div class="flex items-center gap-2">

                    <button class="btn-code" data-clipboard-action="add"
                        onclick="openModal('{{ route('designations.create') }}')">
                        <i class="mgc_add_line text-lg"></i>
                        <span class="ms-2">Add</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <div class="h-64 overflow-y-auto">
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
                                <tbody>
                                    @foreach ($designations as $key => $designation)
                                        <tr>
                                            <x-td>{{ $loop->iteration }}</x-td>
                                            <x-td>{{ $designation->name }}</x-td>
                                            <x-action-td :editModal="[
                                                'route' => route('designations.edit', [
                                                    'designation' => $designation->encrypted_id(),
                                                ]),
                                            ]" :simpleDelete="[
                                                'name' => $designation->name,
                                                'route' => route('designations.destroy', [
                                                    'designation' => $designation->encrypted_id(),
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
    </div>
    {{-- Designation End Here --}}

    {{-- Contact Source Start Here --}}
    <div class="card mt-4">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Contact Sources</h4>
                <div class="flex items-center gap-2">

                    <button class="btn-code" data-clipboard-action="add"
                        onclick="openModal('{{ route('contact-sources.create') }}')">
                        <i class="mgc_add_line text-lg"></i>
                        <span class="ms-2">Add</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <div class="h-64 overflow-y-auto">
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
                                <tbody>
                                    @foreach ($contactSources as $contact_source)
                                        <tr>
                                            <x-td>{{ $loop->iteration }}</x-td>
                                            <x-td>{{ $contact_source->name }}</x-td>
                                            <x-action-td :editModal="[
                                                'route' => route('contact-sources.edit', [
                                                    'contact_source' => $contact_source->encrypted_id(),
                                                ]),
                                            ]" :simpleDelete="[
                                                'name' => $contact_source->name,
                                                'route' => route('contact-sources.destroy', [
                                                    'contact_source' => $contact_source->encrypted_id(),
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
    </div>
    {{-- Contact Source End Here --}}

    {{-- Storage Provider Start Here --}}
    <div class="card mt-4">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Storage Providers</h4>
                <div class="flex items-center gap-2">

                    <button class="btn-code" data-clipboard-action="add"
                        onclick="openModal('{{ route('storage-providers.create') }}')">
                        <i class="mgc_add_line text-lg"></i>
                        <span class="ms-2">Add</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <div class="h-64 overflow-y-auto">
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
                                <tbody>
                                    @foreach ($storageProviders as $storage_provider)
                                        <tr>
                                            <x-td>{{ $loop->iteration }}</x-td>
                                            <x-td>{{ $storage_provider->name }}</x-td>
                                            <x-action-td :editModal="[
                                                'route' => route('storage-providers.edit', [
                                                    'storage_provider' => $storage_provider->encrypted_id(),
                                                ]),
                                            ]" :simpleDelete="[
                                                'name' => $storage_provider->name,
                                                'route' => route('storage-providers.destroy', [
                                                    'storage_provider' => $storage_provider->encrypted_id(),
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
    </div>
    {{-- Storage Provider End Here --}}
@endsection


@section('script')
    {{-- BEGIN PAGE LEVEL SCRIPTS --}}
    <script src="/plugins/table/datatable/datatables.js"></script>
    <script>
        $('#department , #designation').DataTable({
            paging: false,
            searching: false,
            info: false,
        });
    </script>

    <script src="/js/umtt/biddings.js"></script>
    <script src="/js/umtt/common.js"></script>
    <script>
        let create = async (url) => {
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
