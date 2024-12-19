@php
    use App\Services\LocalTime;
    use App\Services\Photo;
@endphp

<x-dashboard-layout pagename=" Teams ">

    <x-slot name='css'>
        {{-- BEGIN PAGE LEVEL CUSTOM STYLES --}}
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
        
        {{-- END PAGE LEVEL CUSTOM STYLES --}}

        {{-- BEGIN UMTT CUSTOM STYLES --}}
        <link rel="stylesheet" type="text/css" href="/css/umtt/datatable.css" />
        {{-- END UMTT CUSTOM STYLES --}}

    </x-slot>

    <br>

    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div
                            class="col-xl-12 col-md-12 col-sm-12 col-12 d-flex justify-content-between align-items-lg-center p-3">
                            <h4> Teams </h4>
                            <div>

                                <button type="button" class="btn btn-gradient-success dropdown-toggle dropdown-toggle"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>

                                <div class="dropdown-menu" x-placement="top-start"
                                    style="position: absolute; transform: translate3d(70px, -228px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item " href="javascript:void(0);"> Export </a>
                                    <a class="dropdown-item " href="javascript:void(0);"> PDF </a>
                                    <a class="dropdown-item " href="javascript:void(0);"> Invoice </a>
                                </div>

                                <button class="btn btn-gradient-primary"
                                    onclick="createTeam('{{ route('teams.create') }}')">
                                    Add Team
                                </button>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4 style-1">

                        {{-- @dd($teams) --}}

                        <table id="datatable-1" class="table style-1  table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th> Name </th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($teams as $team)
                                    <tr>
                                        <td> {{ App\Services\Datatable::serialNum() }} </td>
                                        <td>
                                            <a href="{{ route('teams.show', ['team' => $team->encrypted_id()]) }}">
                                                {{ $team->name ?? null }}
                                            </a>
                                        </td>
                                        <td>
                                            <div class="dropleft" style="text-align: center;">
                                                <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="flaticon-dot-three"
                                                        style="font-size: 17px;color: #1a73e9;">
                                                    </i>
                                                </a>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('teams.show', ['team' => $team->encrypted_id()]) }}">
                                                        Show
                                                    </a>

                                                    <a class="dropdown-item"
                                                        onclick="editTeam('{{ route('teams.edit', ['team' => $team->encrypted_id()]) }}')">
                                                        Edit
                                                    </a>

                                                    <button class="dropdown-item"
                                                        onclick="simpleResourceDelete('{{ $team->name }}', '{{ route('teams.destroy', ['team' => $team->encrypted_id()]) }}')">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {!! $pagination !!}
                </div>

            </div>
        </div>
    </div>

    <x-slot name='scripts'>
        {{-- BEGIN PAGE LEVEL SCRIPTS --}}
        <script src="/plugins/table/datatable/datatables.js"></script>
        <script>
            $('#datatable-1').DataTable({
                paging: false,
                searching: false,
                info: false,
            });
        </script>

        <script src="/js/umtt/biddings.js"></script>
        {{-- END PAGE LEVEL SCRIPTS --}}

        <script>
            let createTeam = async (url) => {
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

            let editTeam = async (url) => {
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
    </x-slot>
</x-dashboard-layout>
