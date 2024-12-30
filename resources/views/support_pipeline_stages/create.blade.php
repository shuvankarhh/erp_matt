<x-modal-form title="Add Support Pipeline Stage" action="{{ route('support-pipeline-stages.store') }}">
    <x-input class="mb-2" label="Name" name="name" value="{{ old('name') }}"
        placeholder="Enter Support Pipeline Stage Name" required />

    <x-select class="mb-2" label="Pipeline" name="pipeline_id" :options="$support_pipelines" placeholder="Select Pipeline"
        selected="{{ old('pipeline_id') }}" required />

    <x-select class="mb-2" label="Resolving Status" name="resolving_status" :options="$statuses"
        placeholder="Select Resolving Status" selected="{{ old('resolving_status') }}" required />
</x-modal-form>
