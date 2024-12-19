<x-modal header="Edit Storage Provider" action="{{ route('storage-providers.update', ['storage_provider' => $storage_provider->encrypted_id()]) }}" put>
    <x-input label="Name" name="name" value="{{ old('name') ?? $storage_provider->name }}" placeholder="Enter Storage Provider Name"
        required />
</x-modal>
