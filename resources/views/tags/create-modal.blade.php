<x-modal-layout layout="{{ isset($layout) ? $layout : null }}">
    <div class="modal-header">
        <h5 class="modal-title" id="generalModalTitle" style="color:">Add Tag</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal_close_button"
            onclick="showLastBigModal()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form id="add_tag_form" action="{{ route('tags.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                    <label for="name"> Name <span style="color:red">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                        required>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                    <label for="type"> Type <span style="color:red">*</span></label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="1" selected> Contact </option>
                        <option value="2"> Task </option>
                    </select>
                </div>
            </div>

            <div class="modal-footer my-3">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">{{ __('lang_file.Close') }}</button>
                <button type="button" class="btn btn-secondary" id="saveLeaveTypeBtn"
                    onclick="storeTag('add_tag_form', '{{ route('tags.store') }}')">{{ __('lang_file.Save') }}</button>
            </div>

            {{-- <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-dark btn-rounded mb-3 mt-3" data-dismiss="modal" onclick="showLastBigModal()">Close</button>
                <button type="submit" class="btn btn-primary btn-rounded mb-3 mt-3">Save</button>
            </div> --}}
        </form>
    </div>
</x-modal-layout>
