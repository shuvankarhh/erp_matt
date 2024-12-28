<x-modal-top-layout layout="{{ isset($layout) ? $layout : null }}">
    <div class="modal-header">
        <h5 class="modal-title" id="generalModalTitle" style="color:">Add New Customer Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal_close_button"
            onclick="showLastBigModal()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div id="customer_create_errors">
            @include('vendor._errors')
        </div>

        <form id="customer_create" action="{{ route('customer-accounts.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <label>Select Contact<span style="color:red">*</span></label>
            <select name="contact_id" id="contact_id" class="form-control mb-4">
                <option value="">Select one</option>
                @foreach ($contacts as $contact)
                    <option value="{{ $contact->id }}">{{ $contact->name }} - {{ $contact->email }}</option>
                @endforeach
            </select>
            <div id="contact_id_invalid" class="invalid-feedback"></div>

            <label>Email <span style="color:red">*</span></label>
            <input type="text" id="email" name="email" class="form-control mb-4">
            <div id="email_invalid" class="invalid-feedback"></div>

            <label>Password <span style="color:red">*</span></label>
            <input type="password" name="password" class="form-control mb-4">
            <div id="password_invalid" class="invalid-feedback"></div>

            <label>Confirm Password <span style="color:red">*</span></label>
            <input type="password" name="confirm_password" class="form-control mb-4">
            <div id="confirm_password_invalid" class="invalid-feedback"></div>

            <label> Status <span style="color:red">*</span></label>
            <select name="status" id="status" class="form-control mb-4">
                <option value="1" selected>Active</option>
                <option value="0">Inactive</option>
                <option value="2">Archived</option>
            </select>
            <div id="status_invalid" class="invalid-feedback"></div>

            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-dark btn-rounded mb-3 mt-3" data-dismiss="modal"
                    onclick="showLastBigModal()">Close</button>
                <button type="submit" class="btn btn-primary btn-rounded mb-3 mt-3">Save</button>
            </div>
        </form>
    </div>


</x-modal-top-layout>
