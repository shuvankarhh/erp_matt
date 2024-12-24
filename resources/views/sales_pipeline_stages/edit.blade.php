<x-modal-form title="Edit Sales Pipeline Stage"
    action="{{ route('sales-pipeline-stages.update', ['sales_pipeline_stage' => $sales_pipeline_stage->encrypted_id()]) }}"
    put>
    <x-select class="mb-2" label="Pipeline" name="pipeline_id" :options="$sales_pipelines" placeholder="Select Pipeline"
        selected="{{ old('pipeline_id') ?? $sales_pipeline_stage->pipeline_id }}" required />

    <x-input class="mb-2" label="Name" name="name" value="{{ old('name') ?? $sales_pipeline_stage->name }}"
        placeholder="Enter Sales Pipeline Stage Name" required />

    <x-input type="number" class="mb-2" label="Probability" name="probability"
        value="{{ old('probability') ?? $sales_pipeline_stage->probability }}" placeholder="Enter Probability"
        required />
</x-modal-form>
