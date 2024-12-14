@php
    use App\Services\LocalTime;
    use App\Services\Photo;
@endphp

<x-dashboard-layout pagename="Solutions">
    <x-slot name='css'>
        {{-- BEGIN PAGE LEVEL CUSTOM STYLES --}}
        <link rel="stylesheet" type="text/css" href="plugins/table/datatable/datatables.css">
        
        {{-- END PAGE LEVEL CUSTOM STYLES --}}

        {{-- BEGIN UMTT CUSTOM STYLES --}}
        <link rel="stylesheet" type="text/css" href="/css/umtt/datatable.css" />
        {{-- END UMTT CUSTOM STYLES --}}


    </x-slot>

    <br>
    @include('vendor._errors')
    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;">All Solutions</h4>
                            <button class="btn btn-info" style="float: right;margin-top: 18px;margin-right: 28px;" onclick="window.location.href = '{{ route('solutions.create') }}'">Add
                                Solution</button>
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
                                    <th>SKU</th>
                                    <th>Type</th>
                                    <th class="ten_persent">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($solutions as $key=>$solution)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$solution->name ?? '-'}}</td>
                                    <td>{{$solution->sku ?? '-'}}</td>
                                    <td>{{$solution->type ?? '-'}}</td>

                                    <td>
                                        <div class="dropleft" style="text-align: center;">
                                            <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="flaticon-dot-three"
                                                    style="font-size: 17px;color: #1a73e9;"></i>
                                            </a>

                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"  href="{{ route('solutions.edit', ['solution' => $solution->encrypted_id()]) }}">Edit</a>
                                                <button class="dropdown-item"
                                                    onclick="simpleResourceDelete('{{ $solution->name ?? '-' }}', '{{ route('solutions.destroy', ['solution' => $solution->encrypted_id()]) }}')">Delete</button>
                                                <a class="dropdown-item"  href="{{ route('solutions.show', ['solution' => $solution->encrypted_id()]) }}">Details</a>
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
    {{-- Contact Source End Here --}}

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
        <script src="/js/umtt/biddings.js"></script>

    </x-slot>
</x-dashboard-layout>
