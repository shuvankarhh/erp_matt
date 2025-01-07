<x-modal-form title="Edit Sales Pipeline"
    action="{{ route('sales-pipelines.update', ['sales_pipeline' => $sales_pipeline->encrypted_id()]) }}" put>
    <x-input label="Name" name="name" value="{{ old('name') ?? $sales_pipeline->name }}"
        placeholder="Enter Sales Pipeline Name" required />

    <div class="flex items-center mt-4">
        <input type="checkbox" id="is_default" name="is_default" class="form-switch text-primary"
            {{ old('is_default', $sales_pipeline->is_default ?? 0) == 1 ? 'checked' : '' }}>
        <label for="is_default" class="ml-1.5 text-sm text-gray-500">Default</label>
    </div>
</x-modal-form>
