<div class="pb-3 mb-3 border-b flex justify-between items-center">
    <h5 id="modalTitle" class="text-lg font-bold">Edit Customer Account</h5>
    <button @click="$store.modal.open = false" class="text-gray-500 hover:text-black">
        <i class="fa-solid fa-xmark text-xl"></i>
    </button>
</div>

<form action="{{ route('customer-accounts.update', ['customer_account' => $customer_account->encrypted_id()]) }}"
    method="POST" id="edit_customer_account">
    @csrf
    @method('PUT')

    <x-select class="mb-2" label="Contact" name="contact_id" :options="$contacts"
        selected="{{ $customer_account->contact_id ?? null }}" disabled />

    {{-- <x-input class="mb-2" label="Contact" name="contact" value="{{ old('password') }}"
        placeholder="Enter Password" /> --}}

    <x-input class="mb-2" type="password" label="Password" name="password" value="{{ old('password') }}"
        placeholder="Enter Password" />

    <x-input class="mb-2" type="password" label="Confirm Password" name="confirm_password"
        value="{{ old('confirm_password') }}" placeholder="Enter Confirm Password" />



    <x-select class="mb-2" label="Status" name="acting_status" :options="$statuses" placeholder="Select Status"
        selected="{{ old('acting_status') ?? ($customer_account->user->acting_status ?? null) }}" required />

    <div class="mt-4 pt-4 border-t flex justify-end">
        <button type="button" @click="$store.modal.open = false"
            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Close
        </button>
        <button type="button" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
            onclick="updateCustomerAccount('edit_customer_account', '{{ route('customer-accounts.update', ['customer_account' => $customer_account->encrypted_id()]) }}')">
            Save
        </button>
    </div>
</form>

{{-- <div class="modal-body">
    <form action="{{ route('customer-accounts.update', ['customer_account' => $customer_account->encrypted_id()]) }}"
        method="POST" id="edit_customer_account">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12 mb-2">
                <label for="branch" class="form-label">{{ __('lang_file.Branch') }}<span
                        class="text-danger">*</span></label>
                <select class="form-select" name="branch" id="branch" aria-label="Default select example">
                    <option value="">Select Branch</option>
                    @foreach ($branches as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                <small id="branch-error"></small>
            </div>

            <div class="col-12 mb-2">
                <label for="department" class="form-label">{{ __('lang_file.Department') }}<span
                        class="text-danger">*</span></label>
                <select class="form-select" name="department" id="department" aria-label="Default select example">
                    <option value="">Select Department</option>
                </select>
                <small id="department-error"></small>
            </div>

            <div class="col-12 mb-2">
                <label for="designation" class="form-label">{{ __('lang_file.Name') }}<span
                        class="text-danger">*</span></label>
                <input type="text" class="form-control" id="designation" name="designation"
                    placeholder="{{ __('lang_file.Designation Name') }}">
                <small id="designation-error"></small>
            </div>

            <div class="col-12 mb-2">
                <label for="grade" class="form-label">{{ __('lang_file.Salary Grade') }}<span
                        class="text-danger">*</span></label>
                <select class="form-select" name="grade" id="grade" aria-label="Default select example">
                    <option value="">Select Grade</option>
                    @foreach ($grades as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
                <small id="grade-error"></small>
            </div>
        </div>

        <div class="modal-footer my-3">
            <button type="button" class="btn btn-secondary"
                data-bs-dismiss="modal">{{ __('lang_file.Close') }}</button>
            <button type="button" class="btn btn-secondary" id="saveLeaveTypeBtn"
                onclick="storeDesignation('add_designation', '{{ route('designation.store') }}')">{{ __('lang_file.Save') }}</button>
        </div>
    </form>
</div> --}}
