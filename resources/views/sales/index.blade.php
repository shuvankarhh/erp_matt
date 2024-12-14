@php
    use App\Services\LocalTime;
    use App\Services\Photo;
@endphp

<x-dashboard-layout pagename="Sales">
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
                <div class="widget-header z-0">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;">Sales</h4>
                            <a class="btn btn-info" style="float: right;margin-top: 18px;margin-right: 28px;"
                                href="{{ route('sales.create') }}">Add Sale</a>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area z-1">
                    <div class="table-responsive mb-4 style-1">
                        <table id="datatable-1" class="table style-1  table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Pipeline</th>
                                    <th>Pipeline Stage</th>
                                    <th>Price</th>
                                    <th>Final Price</th>
                                    <th>Priority</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $key => $sale)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $sale->name }}</td>
                                        <td>{{ $sale->pipeline ? $sale->pipeline->name : '-' }}</td>
                                        <td>{{ $sale->pipelineStage ? $sale->pipelineStage->name : '-' }}</td>
                                        <td>{{ $sale->price }}</td>
                                        <td>{{ $sale->final_price }}</td>
                                        <td>
                                            @if ($sale->priority == 1)
                                                <span>Low</span>
                                            @elseif($sale->priority == 2)
                                                <span>Medium</span>
                                            @elseif($sale->priority == 3)
                                                <span>High</span>
                                            @endif
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
                                                        href="{{ route('invoices.show', ['invoice' => $sale->encrypted_id()]) }}">
                                                        Invoice
                                                    </a>

                                                    <a class="dropdown-item"
                                                        href="{{ route('sales.show', ['sale' => $sale->encrypted_id()]) }}">
                                                        Show
                                                    </a>

                                                    <a class="dropdown-item"
                                                        href="{{ route('sales.edit', ['sale' => $sale->encrypted_id()]) }}">
                                                        Edit
                                                    </a>

                                                    <button class="dropdown-item"
                                                        onclick="simpleResourceDelete('{{ $sale->name }}', '{{ route('sales.destroy', ['sale' => $sale->encrypted_id()]) }}')">
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
    </x-slot>
</x-dashboard-layout>
