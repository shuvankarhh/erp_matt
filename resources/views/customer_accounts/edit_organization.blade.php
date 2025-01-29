<x-modal-form title="Edit Organization" action="{{ route('update_organization', ['contact' => $contact->id]) }}"
    formId="edit_form" onClick="storeOrUpdate('edit_form', event)" put>

    <x-select label="Organization" name="organization_id" :options="$organizations"
        selected="{{ old('organization_id') ?? $contact->organization_id }}" placeholder="Select Organization" required />
</x-modal-form>
