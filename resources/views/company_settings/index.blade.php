@extends('layouts.vertical', ['title' => 'Settings', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


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
    {{-- <div class="card mt-4">
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
    </div> --}}
    {{-- Storage Provider End Here --}}

    {{-- <div x-data="{ open: false }" @keydown.escape.window="open = false">
        <!-- Trigger Button -->
        <button @click="open = true" class="px-4 py-2 bg-blue-500 text-white rounded">Open Modal</button>

        <!-- Modal Backdrop -->
        <div x-show="open" x-transition.opacity
            class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center z-50">

            <!-- Modal Container -->
            <div @click.stop class="bg-white rounded-lg shadow-lg w-full max-w-lg max-h-[90vh] overflow-y-auto">

                <!-- Modal Header -->
                <div class="p-4 border-b flex justify-between items-center">
                    <h5 class="text-lg font-bold">Scrollable Modal</h5>
                    <button @click="open = false" class="text-gray-500 hover:text-black">
                        <i class="fa-solid fa-xmark text-xl"></i>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="p-4">
                    <p>
                        This is a scrollable modal. Add enough content to see the scrolling effect in action.
                    </p>
                    <!-- Add more content to trigger scrolling -->
                    @for ($i = 1; $i <= 50; $i++)
                        <p>Row {{ $i }} - Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    @endfor
                </div>

                <!-- Modal Footer -->
                <div class="p-4 border-t flex justify-end">
                    <button @click="open = false" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Close
                    </button>
                    <button class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div x-data="{ open: false }" @keydown.escape.window="open = false">
        <!-- Trigger Button -->
        <button @click="open = true" class="px-4 py-2 bg-blue-500 text-white rounded">Open Modal</button>

        <!-- Modal Backdrop -->
        <div x-show="open" x-transition.opacity
            class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center z-50">

            <!-- Modal Container -->
            <div @click.stop class="bg-white rounded-lg shadow-lg w-full max-w-lg max-h-[90vh] overflow-y-hidden"
                style="overscroll-behavior: contain; -ms-overflow-style: none; scrollbar-width: none;"
                x-data="{ isScrolling: false }" @wheel="isScrolling = true">

                <!-- Hide Scrollbar -->
                <style>
                    .scroll-hidden::-webkit-scrollbar {
                        display: none;
                    }
                </style>

                <!-- Modal Header -->
                <div class="p-4 border-b flex justify-between items-center">
                    <h5 class="text-lg font-bold">Bootstrap-Like Scrollable Modal</h5>
                    <button @click="open = false" class="text-gray-500 hover:text-black">
                        <i class="fa-solid fa-xmark text-xl"></i>
                    </button>
                </div>

                <!-- Modal Body -->
                <div class="p-4 scroll-hidden overflow-y-auto">
                    <p>
                        This modal scrolls content automatically without showing the scrollbar. Add more content to see the
                        effect.
                    </p>
                    <!-- Add more content to trigger scrolling -->
                    @for ($i = 1; $i <= 50; $i++)
                        <p>Row {{ $i }} - Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    @endfor
                </div>

                <!-- Modal Footer -->
                <div class="p-4 border-t flex justify-end">
                    <button @click="open = false" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Close
                    </button>
                    <button class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div x-data="{ open: false }" @keydown.escape.window="open = false">
        <!-- Trigger Button -->
        <button @click="open = true" class="px-4 py-2 bg-blue-500 text-white rounded">Open Modal</button>

        <!-- Modal Backdrop -->
        <div x-show="open" x-transition.opacity
            class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center z-50">

            <!-- Scrollable Modal -->
            <div @click.stop class="bg-white rounded-lg shadow-lg w-full max-w-lg h-[90vh] overflow-y-auto"
                style="overscroll-behavior: contain; -ms-overflow-style: none; scrollbar-width: none;">

                <!-- Modal Header -->
                <div class="p-4 border-b flex justify-between items-center">
                    <h5 class="text-lg font-bold">Entire Modal Scrollable</h5>
                    <button @click="open = false" class="text-gray-500 hover:text-black">
                        <i class="fa-solid fa-xmark text-xl"></i>
                    </button>
                </div>

                <!-- Modal Content (Body) -->
                <div class="p-4">
                    <p>
                        This modal allows the entire container to scroll, including the header, body, and footer.
                    </p>
                    <!-- Add more content to trigger scrolling -->
                    @for ($i = 1; $i <= 50; $i++)
                        <p>Row {{ $i }} - Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    @endfor
                </div>

                <!-- Modal Footer -->
                <div class="p-4 border-t flex justify-end">
                    <button @click="open = false" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Close
                    </button>
                    <button class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div> --}}




    {{-- Storage Providers Start Here --}}
    {{-- <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;">All Storage Providers</h4>
                            <button class="btn btn-gradient-primary right_side_button"
                                onclick="create('{{ route('storage-providers.create') }}')">Add Storage
                                Provider</button>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4 style-1 table-scrollable">
                        <table id="designation" class="table style-1  table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="sl">No</th>
                                    <th>Name</th>
                                    <th>Alias</th>
                                    <th>Logo</th>
                                    <th>Credentials</th>
                                    <th>Status</th>
                                    <th class="ten_persent">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($storageProviders as $key => $storageProvider)
                                    <tr>
                                        <td class="sl">
                                            {{ $key + 1 }}
                                        </td>
                                        <td>{{ $storageProvider->name ?? '' }}</td>
                                        <td>{{ $storageProvider->alias ?? '' }}</td>
                                        <td class="text-center">
                                            <a class="product-list-img">
                                                <img id="preview_image"
                                                    src="storage/{{ $storageProvider->logo_path ?? 'user.png' }}"
                                                    alt="product">
                                            </a>
                                        </td>
                                        <td>{{ $storageProvider->credentials ?? '' }}</td>
                                        <td>{{ $storageProvider->acting_status ?? '' }}</td>
                                        <td>
                                            <div class="dropleft" style="text-align: center;">

                                                <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="flaticon-dot-three"
                                                        style="font-size: 17px;color: #1a73e9;"></i>
                                                </a>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        onclick="edit('{{ route('storage-providers.edit', ['storage_provider' => $storageProvider->encrypted_id()]) }}')">Edit</a>
                                                    <button class="dropdown-item"
                                                        onclick="simpleResourceDelete('{{ $storageProvider->name }}', '{{ route('storage-providers.destroy', ['storage_provider' => $storageProvider->encrypted_id()]) }}')">Delete</button>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- Storage Providers End Here --}}
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
