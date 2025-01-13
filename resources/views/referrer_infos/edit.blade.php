<x-modal-form title="Edit Referrer Info"
    action="{{ route('referrer-infos.update', ['referrer_info' => $referrer_info->encrypted_id()]) }}"
    formId="edit_ref_info" onClick="storeOrUpdate('edit_ref_info', event)" put>

    <x-input class="mb-2" label="Organization Name" name="organization_name"
        value="{{ old('organization_name') ?? $referrer_info->organization_name }}"
        placeholder="Enter Organization Name" />

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-input class="mb-2" label="Contact First Name" name="contact_first_name"
            value="{{ old('contact_first_name') ?? $referrer_info->contact_first_name }}"
            placeholder="Enter Contact First Name" required />

        <x-input class="mb-2" label="Contact Last Name" name="contact_last_name"
            value="{{ old('contact_last_name') ?? $referrer_info->contact_last_name }}"
            placeholder="Enter Contact Last Name" />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-input class="mb-2" label="Phone Number" name="phone_number"
            value="{{ old('phone_number') ?? $referrer_info->phone_number }}" placeholder="Enter Phone Number" />

        <x-input class="mb-2" label="Email" type="email" name="email"
            value="{{ old('email') ?? $referrer_info->email }}" placeholder="Enter Email Address" required />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-input class="mb-2" label="Organization" name="organization"
            value="{{ old('organization') ?? $referrer_info->organization }}" placeholder="Enter Organization" />

        <x-input class="mb-2" label="Parent Organization" name="parent_organization"
            value="{{ old('parent_organization') ?? $referrer_info->parent_organization }}"
            placeholder="Enter Parent Organization" />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-input label="Referral Source" name="referral_source"
            value="{{ old('referral_source') ?? $referrer_info->referral_source }}"
            placeholder="Enter Referral Source" />

        <x-input label="Sales Source" name="sales_source"
            value="{{ old('sales_source') ?? $referrer_info->sales_source }}" placeholder="Enter Sales Source" />
    </div>
</x-modal-form>
