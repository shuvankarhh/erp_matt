<x-modal-form title="Edit Sales Pipeline"
    action="{{ route('sales-pipelines.update', ['sales_pipeline' => $sales_pipeline->encrypted_id()]) }}" put>
    <x-input label="Name" name="name" value="{{ old('name') ?? $sales_pipeline->name }}"
        placeholder="Enter Sales Pipeline Name" required />
</x-modal-form>
