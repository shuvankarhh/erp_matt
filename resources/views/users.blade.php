@php
    use App\Services\LocalTime;
    use App\Services\Photo;
@endphp

<x-dashboard-layout pagename="Users">
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
                            <h4 style="float: left;">Users</h4>
                                <button class="btn btn-gradient-primary" style="float: right;margin-top: 18px;margin-right: 15px;" onclick="window.location.href = '{{ route('staffs.create') }}'">Add Stuff</button>
                                <button class="btn btn-gradient-primary" style="float: right;margin-top: 18px;margin-right: 15px;" onclick="window.location.href = '{{ route('staffs.create') }}'">Add Customer</button>
                       
                            
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4 style-1">
                        <table id="datatable-1" class="table style-1  table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="sl" >Sl.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>User Role</th>
                                    <th>Photo</th>
                                    <th>Active Status</th>
                                    <th>Date Created</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $sl = 1;
                                $page = request('page') ?? null; // Using the null coalescing operator to handle unset or null page value
                                if (null !== $page) { // Checking if $page is not null
                                    if ($page == 0) {
                                        $sl = 1;
                                    } else {
                                        $sl = 20 * ($page - 1);
                                    }
                                }
                            @endphp

                                @foreach($users as $user)
                                    <tr>
                                        <td class="sl" >{{$sl}}</td>
                                        <td>{{ $user->name ?? null }}</td>
                                        <td>{{ $user->email ?? null }}</td>
                                        <td>{{ $user->phone ?? null }}</td>
                                        <td class="text-center">
                                            {{ $user->user_role->name ?? null }}
                                        </td>

                                        <td class="text-center">
                                            <a class="product-list-img">
                                                @if ( isset($user->user_photos->path))
                                                    <img src="storage/{{$user->user_photos->path}}" alt="product">
                                                @else
                                                    <img src="/images/user.png" alt="product">
                                                @endif

                                            </a>
                                        </td>

                                        <td class="text-center">
                                            @if($user->acting_status == 0)
                                                <span class="badge badge-pills outline-badge-danger">Inactive</span>
                                            @endif
                                            @if($user->acting_status == 1)
                                                <span class="badge badge-pills outline-badge-success">Active</span>
                                            @endif
                                        </td>

                                        <td>{{ LocalTime::datetime($user->created_at) }}</td>
                                        <td>
                                            <div class="dropleft" style="text-align: center;">
                                                <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="flaticon-dot-three" style="font-size: 17px;color: #1a73e9;"></i>
                                                </a>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="{{ route('users.edit', ['user' => $user->encrypted_id()]) }}">Edit</a>
                                                    <button class="dropdown-item" onclick="simpleResourceDelete('{{ $user->name }}', '{{ route('users.destroy', ['user' => $user->encrypted_id()]) }}')">Delete</button>
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
    </x-slot>
</x-dashboard-layout>
