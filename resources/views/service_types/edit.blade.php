<x-modal-form title="Edit Project Type"
    action="{{ route('service-types.update', ['service_type' => $service_type->encrypted_id()]) }}"
    formId="edit_service_type" onClick="storeOrUpdate('edit_service_type', event)" put>

    <x-select class="mb-2" label="Project Type" name="project_type_id" :options="$project_types" placeholder="Select Project Type"
        selected="{{ old('project_type_id') ?? $service_type->project_type_id }}" required />

    <x-input label="Name" name="name" value="{{ old('name') ?? $service_type->name }}"
        placeholder="Enter Service Type Name" required />
</x-modal-form>
