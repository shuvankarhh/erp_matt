<x-modal-form title="Add Sales Pipeline Stage" action="{{ route('sales-pipeline-stages.store') }}">
    <x-select class="mb-2" label="Pipeline" name="pipeline_id" :options="$sales_pipelines" placeholder="Select Pipeline"
        selected="{{ old('pipeline_id') }}" required />

    <x-input class="mb-2" label="Name" name="name" value="{{ old('name') }}"
        placeholder="Enter Sales Pipeline Stage Name" required />

    <x-input type="number" class="mb-2" label="Probability" name="probability" value="{{ old('probability') }}"
        placeholder="Enter Probability" required />
</x-modal-form>
