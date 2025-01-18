<x-modal-form title="Add Customer Account" action="{{ route('customer-accounts.store') }}" formId="add_customer_account"
    onClick="updateCustomerAccount('add_customer_account', event)">

    <div class="grid grid-cols-1 gap-6 mb-2">
        <x-select label="Contact" name="contact_id" :options="$contacts" placeholder="Select Contact"
            selected="{{ old('contact_id') }}" required />
    </div>

    {{-- <x-input class="mb-2" type="email" label="Email" name="email" value="{{ old('email') }}"
        placeholder="Enter Email Address" required /> --}}

    <x-input class="mb-2" type="password" label="Password" name="password" value="{{ old('password') }}"
        placeholder="Enter Password" required />

    <x-input class="mb-2" type="password" label="Confirm Password" name="confirm_password"
        value="{{ old('confirm_password') }}" placeholder="Enter Confirm Password" required />

    <x-select label="Status" name="acting_status" :options="$statuses" placeholder="Select Status"
        selected="{{ old('acting_status') }}" required />
</x-modal-form>
