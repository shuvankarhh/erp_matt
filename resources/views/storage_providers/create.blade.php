<x-modal-form :title="'Add Storage Provider'" :action="route('storage-providers.store')">
    <x-input class="mb-2" label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Name" required />
    <x-input class="mb-2" label="Alias" name="alias" value="{{ old('alias') }}" placeholder="Enter Alias" required />
    <x-input class="mb-2" type="file" label="Logo" name="logo_path" value="{{ old('logo_path') }}" required />
    <x-input class="mb-2" label="Credentials" name="credentials" value="{{ old('credentials') }}"
        placeholder="Enter Credentials" required />
    <x-textarea class="mb-2" label="Description" name="description" value="{{ old('description') }}" placeholder="Enter Description" required />
    <x-select class="mb-2" label="Acting Status" name="acting_status" :options="$statuses" placeholder="Select Status"
        required />
</x-modal-form>
