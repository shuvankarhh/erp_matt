<x-modal-form title="Edit Project Type"
    action="{{ route('project-types.update', ['project_type' => $project_type->encrypted_id()]) }}"
    formId="edit_project_type" onClick="storeOrUpdate('edit_project_type', event)" put>

    <x-input label="Name" name="name" value="{{ old('name') ?? $project_type->name }}"
        placeholder="Enter Project Type Name" required />

</x-modal-form>
