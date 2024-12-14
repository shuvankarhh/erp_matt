@extends('layouts.vertical', ['title' => 'Settings', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;">All Teams</h4>
                            <button class="btn btn-gradient-primary right_side_button"
                                onclick="create('{{ route('designations.create') }}')">Add
                                Designation</button>
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
                                    <th class="ten_persent">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $key => $team)
                                    <tr>
                                        <td class="sl">
                                            {{ $key + 1 }}
                                        </td>
                                        <td>{{ $team->name }}</td>
                                        <td>
                                            <div class="dropleft" style="text-align: center;">
                                                <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="flaticon-dot-three"
                                                        style="font-size: 17px;color: #1a73e9;"></i>
                                                </a>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        onclick="edit('{{ route('teams.edit', ['team' => $team->encrypted_id()]) }}')">Edit</a>
                                                    <button class="dropdown-item"
                                                        onclick="simpleResourceDelete('{{ $team->name }}', '{{ route('teams.destroy', ['team' => $team->encrypted_id()]) }}')">Delete</button>
                                                </div>
                                            </div>
                                        </td>
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
    {{-- Teams End Here --}}

    {{-- Designation Start Here --}}
    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;">All Designations</h4>
                            <button class="btn btn-gradient-primary right_side_button"
                                onclick="create('{{ route('designations.create') }}')">Add
                                Designation</button>
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
                                    <th class="ten_persent">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($designations as $key => $designation)
                                    <tr>
                                        <td class="sl">
                                            {{ $key + 1 }}
                                        </td>
                                        <td>{{ $designation->name }}</td>
                                        <td>
                                            <div class="dropleft" style="text-align: center;">
                                                <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="flaticon-dot-three"
                                                        style="font-size: 17px;color: #1a73e9;"></i>
                                                </a>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        onclick="edit('{{ route('designations.edit', ['designation' => $designation->encrypted_id()]) }}')">Edit</a>
                                                    <button class="dropdown-item"
                                                        onclick="simpleResourceDelete('{{ $designation->name }}', '{{ route('designations.destroy', ['designation' => $designation->encrypted_id()]) }}')">Delete</button>
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
    </div>
    {{-- Designation End Here --}}

    {{-- Contact Source Start Here --}}
    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;">All Contact Sources</h4>
                            <button class="btn btn-gradient-primary right_side_button"
                                onclick="create('{{ route('contact-source.create') }}')">Add
                                Source</button>
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
                                    <th class="ten_persent">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contactSources as $key => $contactSource)
                                    <tr>
                                        <td class="sl">
                                            {{ $key + 1 }}
                                        </td>
                                        <td>{{ $contactSource->name }}</td>
                                        <td>
                                            <div class="dropleft" style="text-align: center;">
                                                <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="flaticon-dot-three"
                                                        style="font-size: 17px;color: #1a73e9;"></i>
                                                </a>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        onclick="edit('{{ route('contact-source.edit', ['contact_source' => $contactSource->encrypted_id()]) }}')">Edit</a>
                                                    <button class="dropdown-item"
                                                        onclick="simpleResourceDelete('{{ $contactSource->name }}', '{{ route('contact-source.destroy', ['contact_source' => $contactSource->encrypted_id()]) }}')">Delete</button>
                                                </div>
                                            </div>
                                        </td>
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
    {{-- Contact Source End Here --}}

    {{-- Contact Source Start Here --}}
    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;">All Storage Providers</h4>
                            <button class="btn btn-gradient-primary right_side_button"
                                onclick="create('{{ route('storage-providers.create') }}')">Add Storage Provider</button>
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
                    {{-- {!! $pagination !!} --}}
                </div>

            </div>
        </div>
    </div>
    {{-- storage providers End Here --}}
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
