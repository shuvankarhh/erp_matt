<x-modal-form title="Add Service Type" action="{{ route('service-types.store') }}" formId="add_project_type"
    onClick="storeOrUpdate('add_project_type', event)">

    <x-select label="Project Type" name="project_type_id" :options="$project_types" placeholder="Select Project Type"
        selected="{{ old('project_type_id') }}" required />

    <x-input label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Service Type Name" required />
</x-modal-form>
