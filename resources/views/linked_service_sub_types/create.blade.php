<x-modal-form title="Add Linked Service Sub Type" action="{{ route('linked-service-sub-types.store') }}" formId="add_form"
    onClick="storeOrUpdate('add_form', event)">

    <x-select class="mb-2" label="Linked Service Type" name="linked_service_type_id" :options="$linked_service_types"
        placeholder="Select Linked Service Type" selected="{{ old('linked_service_type_id') }}" required />

    <x-input label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Linked Service Sub Type Name"
        required />
</x-modal-form>
