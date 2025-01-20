<x-modal-form title="Add Linked Service Type" action="{{ route('linked-service-types.store') }}" formId="add_form"
    onClick="storeOrUpdate('add_form', event)">

    <x-input label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Linked Service Type Name"
        required />
</x-modal-form>
