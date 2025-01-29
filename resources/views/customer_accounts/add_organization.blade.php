<x-modal-form title="Add Organization" action="{{ route('update_organization', ['contact' => $contact->id]) }}"
    formId="add_form" onClick="storeOrUpdate('add_form', event)" put>

    <x-select label="Organization" name="organization_id" :options="$organizations" selected="{{ old('organization_id') }}"
        placeholder="Select Organization" required />
</x-modal-form>
