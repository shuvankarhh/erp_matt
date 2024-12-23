<x-modal-form title="Edit Support Pipeline"
    action="{{ route('support-pipelines.update', ['support_pipeline' => $support_pipeline->encrypted_id()]) }}" put>
    <x-input label="Name" name="name" value="{{ old('name') ?? $support_pipeline->name }}"
        placeholder="Enter Ticket Source Name" required />
</x-modal-form>
