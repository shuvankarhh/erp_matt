<x-modal-form title="Add Project Type" action="{{ route('project-types.store') }}" formId="add_project_type"
    onClick="storeOrUpdate('add_project_type', event)">

    <x-input label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Project Type Name" required />

</x-modal-form>
