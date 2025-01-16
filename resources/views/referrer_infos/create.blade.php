<x-modal-form title="Add Referrer Info" action="{{ route('referrer-infos.store') }}" formId="add_ref_info"
    onClick="storeOrUpdate('add_ref_info', event)">

    <x-input label="Referral Source" name="referral_source" value="{{ old('referral_source') }}"
    placeholder="Enter Referral Source" />
    
    <x-input class="mb-2" label="Organization Name" name="organization_name" value="{{ old('organization_name') }}"
        placeholder="Enter Organization Name" />

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-input class="mb-2" label="Contact First Name" name="contact_first_name"
            value="{{ old('contact_first_name') }}" placeholder="Enter Contact First Name" required />

        <x-input class="mb-2" label="Contact Last Name" name="contact_last_name"
            value="{{ old('contact_last_name') }}" placeholder="Enter Contact Last Name" />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-input class="mb-2" label="Phone Number" name="phone_number" value="{{ old('phone_number') }}"
            placeholder="Enter Phone Number" />

        <x-input class="mb-2" label="Email" type="email" name="email" value="{{ old('email') }}"
            placeholder="Enter Email Address" required />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-input class="mb-2" label="Organization" name="organization" value="{{ old('organization') }}"
            placeholder="Enter Organization" />

        <x-input class="mb-2" label="Parent Organization" name="parent_organization"
            value="{{ old('parent_organization') }}" placeholder="Enter Parent Organization" />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


        <x-input label="Sales Source" name="sales_source" value="{{ old('sales_source') }}"
            placeholder="Enter Sales Source" />
    </div>
</x-modal-form>
