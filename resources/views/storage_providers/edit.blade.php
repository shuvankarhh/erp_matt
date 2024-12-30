<x-modal-form :title="'Edit Storage Provider'" :action="route('storage-providers.update', ['storage_provider' => $storage_provider->encrypted_id()])" put>
    <x-input class="mb-2" label="Name" name="name" value="{{ old('name') ?? $storage_provider->name }}" placeholder="Enter Name" required />
    <x-input class="mb-2" label="Alias" name="alias" value="{{ old('alias') ?? $storage_provider->alias }}" placeholder="Enter Alias" required />
    <x-input class="mb-2" type="file" label="Logo" name="logo_path" value="{{ old('logo_path') ?? $storage_provider->logo_path }}" />
    <x-input class="mb-2" label="Credentials" name="credentials" value="{{ old('credentials') ?? $storage_provider->credentials }}"
        placeholder="Enter Credentials" required />
    <x-textarea class="mb-2" label="Description" name="description" value="{{ $storage_provider->description }}" placeholder="Enter Description" required />
    <x-select class="mb-2" label="Acting Status" name="acting_status" :options="$statuses" selected="{{ old('acting_status') ?? $storage_provider->acting_status }}" placeholder="Select Status"
        required />
</x-modal-form>
