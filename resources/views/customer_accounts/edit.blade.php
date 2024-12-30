<x-modal-form title="Edit Customer Account"
    action="{{ route('customer-accounts.update', ['customer_account' => $customer_account->encrypted_id()]) }}"
    formId="edit_customer_account" onClick="updateCustomerAccount('edit_customer_account', event)" put="true">

    <x-select class="mb-2" label="Contact" name="contact_id" :options="$contacts"
        selected="{{ $customer_account->contact_id ?? null }}" disabled />

    <x-input class="mb-2" type="password" label="Password" name="password" value="{{ old('password') }}"
        placeholder="Enter Password" />

    <x-input class="mb-2" type="password" label="Confirm Password" name="confirm_password"
        value="{{ old('confirm_password') }}" placeholder="Enter Confirm Password" />

    <x-select class="mb-2" label="Status" name="acting_status" :options="$statuses" placeholder="Select Status"
        selected="{{ old('acting_status') ?? ($customer_account->user->acting_status ?? null) }}" required />
</x-modal-form>
