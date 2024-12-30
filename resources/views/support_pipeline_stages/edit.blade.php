<x-modal-form title="Edit Support Pipeline Stage"
    action="{{ route('support-pipeline-stages.update', ['support_pipeline_stage' => $support_pipeline_stage->encrypted_id()]) }}"
    put>
    <x-input class="mb-2" label="Name" name="name" value="{{ old('name') ?? $support_pipeline_stage->name }}"
        placeholder="Enter Support Pipeline Stage Name" required />

    <x-select class="mb-2" label="Pipeline" name="pipeline_id" :options="$support_pipelines" placeholder="Select Pipeline"
        selected="{{ old('pipeline_id') ?? $support_pipeline_stage->pipeline_id }}" required />

    <x-select class="mb-2" label="Resolving Status" name="resolving_status" :options="$statuses"
        placeholder="Select Resolving Status"
        selected="{{ old('resolving_status') ?? $support_pipeline_stage->resolving_status }}" required />
</x-modal-form>
