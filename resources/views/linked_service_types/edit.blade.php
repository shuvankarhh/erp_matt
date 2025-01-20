<x-modal-form title="Edit Linked Service Type"
    action="{{ route('linked-service-types.update', ['linked_service_type' => $linked_service_type->encrypted_id()]) }}"
    formId="edit_form" onClick="storeOrUpdate('edit_form', event)" put>

    <x-input label="Name" name="name" value="{{ old('name') ?? $linked_service_type->name }}"
        placeholder="Enter Linked Service Type Name" required />
</x-modal-form>
