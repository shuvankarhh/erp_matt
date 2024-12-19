@php
    use App\Services\LocalTime;
    use App\Services\Photo;
@endphp

<x-dashboard-layout pagename="Stuffs">
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
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;">All Designations</h4>
                            <button class="btn btn-info" style="float: right;margin-top: 18px;margin-right: 28px;" onclick="createDocument('{{ route('designations.create') }}')">Add Designation</button>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4 style-1">
                        <table id="datatable-1" class="table style-1  table-bordered table-hover">
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
                                        if ($page == 0) {
                                            $sl = 1;
                                        } else {
                                            $sl = 20 * ($page - 1);
                                        }
                                    }
                                @endphp

                                @foreach ($designations as $designation)
                                    <tr>
                                        <td class="sl">
                                            {{$sl}}
                                        </td>
                                        <td>{{ $designation->name }}</td>
                                        <td>
                                            <div class="dropleft" style="text-align: center;">
                                                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon-dot-three" style="font-size: 17px;color: #1a73e9;"></i>
                                                </a>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" onclick="editDocument('{{ route('designations.edit',['designation' =>$designation->encrypted_id() ]) }}')">Edit</a>
                                                    <button class="dropdown-item" onclick="simpleResourceDelete('{{ $designation->name }}', '{{ route('designations.destroy', ['designation' => $designation->encrypted_id()]) }}')">Delete</button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @php
                                        $sl++;
                                    @endphp
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                    {{-- {!! $pagination !!} --}}
                </div>

            </div>
        </div>
    </div>

    <x-slot name='scripts'>
        <script src="/plugins/table/datatable/datatables.js"></script>
        <script>
            $('#datatable-1').DataTable({
                paging: false,
                searching: false,
                info: false,
            });
        </script>

        <script src="/js/umtt/biddings.js"></script>

        <script>
            let createDocument = async (url) => {
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
                    if(responseJson.response_type == 0) {
                        showErrorsInNotifi(responseJson.response_error);
                    } else {
                        document.getElementById('generalModalTop').innerHTML = responseJson.response_body;
                        displayModalTop();

                    }
                });
            };



            let editDocument = async (url) => {
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
                    if(responseJson.response_type == 0) {
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
