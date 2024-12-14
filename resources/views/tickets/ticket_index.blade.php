@php
    use App\Services\LocalTime;
    use App\Services\Photo;
@endphp

<x-dashboard-layout pagename="Ticket">
    <x-slot name='css'>
        {{-- BEGIN PAGE LEVEL CUSTOM STYLES --}}
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
        {{-- END PAGE LEVEL CUSTOM STYLES --}}

        {{-- BEGIN crm-plus CUSTOM STYLES --}}
        <link rel="stylesheet" type="text/css" href="/css/umtt/datatable.css" />
        {{-- END crm-plus CUSTOM STYLES --}}

    </x-slot>

    <br>

    {{-- Pipelines Start Here --}}
    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;">All Tickets</h4>
                            <button class="btn btn-gradient-primary right_side_button"
                                onclick="create('{{ route('tickets.create') }}')">Add Ticket</button>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4 style-1 table">
                        <table id="department" class="table style-1  table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="sl">No</th>
                                    <th>Name</th>
                                    <th class="ten_persent">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $sl = 1;
                                    $page = request('page') ?? null;
                                    if (null !== $page) {
                                        if ($page == 1) {
                                            $sl = 1;
                                        } else {
                                            $sl = 15 * ($page - 1);
                                            $sl++;
                                        }
                                    }
                                @endphp
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td class="sl">
                                            {{ $sl++ }}
                                        </td>
                                        <td>{{ $ticket->name }}</td>

                                        <td>
                                            <div class="dropleft" style="text-align: center;">
                                                <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="flaticon-dot-three"
                                                        style="font-size: 17px;color: #1a73e9;"></i>
                                                </a>
                                                <div class="dropdown-menu">
                                                    <button class="dropdown-item"
                                                        onclick="create('{{ route('tickets.show', ['ticket' => $ticket->encrypted_id()]) }}')">Details</button>
                                                    <button class="dropdown-item"
                                                        onclick="edit('{{ route('tickets.edit', ['ticket' => $ticket->encrypted_id()]) }}')">Edit</button>
                                                    <button class="dropdown-item"
                                                        onclick="simpleResourceDelete('{{ $ticket->name }}', '{{ route('tickets.destroy', ['ticket' => $ticket->encrypted_id()]) }}')">Delete</button>
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

    {{-- Pipeline stage End Here --}}

    <x-slot name='scripts'>
        {{-- BEGIN PAGE LEVEL SCRIPTS --}}
        <script src="/plugins/table/datatable/datatables.js"></script>
        <script>
            $('#department , #designation').DataTable({
                paging: false,
                searching: false,
                info: false,
            });
        </script>
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
                            showErrors(responseJson.response_error);
                        } else {
                            document.getElementById('generalModalTop').innerHTML = responseJson.response_body;
                            displayModalTop();

                            $('.contact_id').select2({
                                placeholder: 'Select contact',
                                ajax: {
                                    url: '/get-contact',
                                    dataType: 'json',
                                    delay: 250,
                                    processResults: function(data) {
                                        return {
                                            results: $.map(data, function(item) {
                                                return {
                                                    text: item.value,
                                                    id: item.id
                                                }
                                            })
                                        };
                                    },

                                }
                            });

                            $('.organization_id').select2({
                                placeholder: 'Select an item',
                                maximumSelectionLength: 1,
                                ajax: {
                                    url: '/get-organization',
                                    dataType: 'json',
                                    delay: 250,
                                    processResults: function(data) {
                                        return {
                                            results: $.map(data, function(item) {
                                                return {

                                                    text: item.value,
                                                    id: item.id
                                                }
                                            })
                                        };
                                    },
                                }
                            });

                            $('.sales_id').select2({
                                placeholder: 'Select sales',
                                ajax: {
                                    url: '/get-sales',
                                    dataType: 'json',
                                    delay: 250,
                                    processResults: function(data) {
                                        return {
                                            results: $.map(data, function(item) {
                                                return {

                                                    text: item.value,
                                                    id: item.id
                                                }
                                            })
                                        };
                                    },
                                }
                            });

                            document.getElementById('create').addEventListener('submit', (e) => {
                                e.preventDefault();
                                store();
                            });

                        }
                    });
            };
            window.store = async () => {
                hideAllNotification();
                let url = document.getElementById('create').action;
                let formData = new FormData(document.getElementById('create'));
                formData.append('_token', CSRF_TOKEN);

                fetch(url, {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.text())
                    .then(responseText => {
                        let responseJson = JSON.parse(responseText);

                        if (responseJson.response_type == 0) {
                            document.getElementById('errors').innerHTML = responseJson.response_body_html;
                            handleFormValidationError(responseJson.response_error);

                        } else {
                            location.reload();
                        }
                    });
            };
            window.edit = async (url) => {
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

                            $('.contact_id').select2({
                                placeholder: 'Select contact',
                                ajax: {
                                    url: '/get-contact',
                                    dataType: 'json',
                                    delay: 250,
                                    processResults: function(data) {

                                        return {

                                            results: $.map(data, function(item) {
                                                return {

                                                    text: item.value,
                                                    id: item.id
                                                }
                                            })
                                        };
                                    },

                                }
                            });

                            $('.organization_id').select2({
                                placeholder: 'Select an item',
                                maximumSelectionLength: 1,
                                ajax: {
                                    url: '/get-organization',
                                    dataType: 'json',
                                    delay: 250,
                                    processResults: function(data) {
                                        return {
                                            results: $.map(data, function(item) {
                                                return {

                                                    text: item.value,
                                                    id: item.id
                                                }
                                            })
                                        };
                                    },
                                }
                            });

                            $('.sales_id').select2({
                                placeholder: 'Select sales',
                                ajax: {
                                    url: '/get-sales',
                                    dataType: 'json',
                                    delay: 250,
                                    processResults: function(data) {
                                        return {
                                            results: $.map(data, function(item) {
                                                return {

                                                    text: item.value,
                                                    id: item.id
                                                }
                                            })
                                        };
                                    },
                                }
                            });

                            document.getElementById('create').addEventListener('submit', (e) => {
                                e.preventDefault();
                                store();
                            });
                        }
                    });
            };
        </script>
    </x-slot>
</x-dashboard-layout>
