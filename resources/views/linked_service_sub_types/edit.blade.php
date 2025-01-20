<x-modal-form title="Edit Linked Service Sub Type"
    action="{{ route('linked-service-sub-types.update', ['linked_service_sub_type' => $linked_service_sub_type->encrypted_id()]) }}"
    formId="edit_form" onClick="storeOrUpdate('edit_form', event)" put>

    <x-select class="mb-2" label="Linked Service Type" name="linked_service_type_id" :options="$linked_service_types"
        placeholder="Select Linked Service Type"
        selected="{{ old('linked_service_type_id') ?? $linked_service_sub_type->linked_service_type_id }}" required />

    <x-input label="Name" name="name" value="{{ old('name') ?? $linked_service_sub_type->name }}"
        placeholder="Enter Linked Service Sub Type Name" required />
</x-modal-form>
