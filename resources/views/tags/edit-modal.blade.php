<div class="modal-header p-4 border-b flex justify-between items-center">
    <h5 class="text-lg font-bold">Add Tag</h5>
    <button @click="open = false" class="text-gray-500 hover:text-black"><i class="fa-solid fa-xmark text-xl"></i></button>
</div>

<div class="modal-body p-4">
    <form id="add_tag_form" action="{{ route('tags.update', ['tag' => $tag->encrypted_id()]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                <label for="name" class="text-gray-800 text-sm font-medium inline-block mb-2">Name <span
                        style="color:red">*</span></label>
                <input class="form-input" type="text" id="name" name="name" value="{{ old('name') ?? $tag->name }}"
                    placeholder="Tag Name" required>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-4">
                <label for="type" class="text-gray-800 text-sm font-medium inline-block mb-2"> Type <span
                        style="color:red">*</span></label>
                <select class="form-select" id="type" name="type" required>
                    <option value="1" selected> Contact </option>
                    <option value="2"> Task </option>
                </select>
            </div>
        </div>

        {{-- <div class="modal-footer my-3">
            <button type="button" class="btn btn-secondary"
                data-bs-dismiss="modal">{{ __('lang_file.Close') }}</button>
            <button type="button" class="btn btn-secondary" id="saveLeaveTypeBtn"
                onclick="storeTag('add_tag_form', '{{ route('tags.store') }}')">{{ __('lang_file.Save') }}</button>
        </div> --}}

        {{-- <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-dark btn-rounded mb-3 mt-3" data-dismiss="modal" onclick="showLastBigModal()">Close</button>
                <button type="submit" class="btn btn-primary btn-rounded mb-3 mt-3">Save</button>
            </div> --}}

        <div class="modal-footer border-t flex justify-end">
            <button @click="open = false" class="bg-gray-500 text-white px-4 py-2 me-2 rounded hover:bg-gray-600">
                Close
            </button>
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Save
            </button>
        </div>
    </form>
</div>

