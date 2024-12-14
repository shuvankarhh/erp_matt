<x-modal-top-layout layout="{{ isset($layout) ? $layout : null }}">
    <div class="modal-header">
        <h5 class="modal-title" id="generalModalTitle" style="color:">Edit Team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal_close_button"
            onclick="showLastBigModal()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{ route('teams.update', ['team' => $team->encrypted_id()]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                    <label for="name"> Name <span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ old('name') ?? $team->name }}" required>
                </div>
            </div>

            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-dark btn-rounded mb-3 mt-3" data-dismiss="modal"
                    onclick="showLastBigModal()">Close</button>
                <button type="submit" class="btn btn-primary btn-rounded mb-3 mt-3">Save</button>
            </div>
        </form>
    </div>

    <script></script>
</x-modal-top-layout>
