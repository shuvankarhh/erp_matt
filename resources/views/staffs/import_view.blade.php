<x-dashboard-layout pagename="Staff Import">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        @if (Session::has('excel_import_errors'))
                            {{ dd(Session::get('excel_import_errors')) }}
                        @endif
                        <p class="card-heading">Import Staffs</p>

                    </div>
                </div>
                <div class="card-body">
                    <div class="container mt-5 text-center">
                        <h5 class="mb-4">
                            Excel File Import
                        </h5>
                        <form action="{{ route('staffs-import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <div class="text-left">
                                    <input type="file" name="file" class="form-control" id="customFile">
                                    {{--  <label class="custom-file-label" for="customFile">Choose file</label>  --}}
                                </div>
                            </div>
                            <button class="btn btn-primary">Import Staffs</button>
                            <a class="btn btn-success" href="{{ asset('files/sample_staffs.xlsx') }}">Sample File
                                Download</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-dashboard-layout>
