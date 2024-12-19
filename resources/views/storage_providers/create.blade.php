<x-modal header="Add Storage Provider" action="{{ route('storage-providers.store') }}">
    <x-input label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Storage Provider Name" required />
    <x-input label="Alias" name="alias" value="{{ old('alias') }}" placeholder="Enter Alias" required />
    <x-input type="file" label="Logo" name="logo_path" value="{{ old('logo_path') }}" required />
    {{-- <x-input label="Credentials" name="credentials" value="{{ old('credentials') }}" placeholder="Enter Credentials"
        required /> --}}
    {{-- <x-textarea label="Description" name="description" placeholder="Enter Description" /> --}}
    {{-- <x-select label="Acting Status" name="acting_status" :options="$statuses" placeholder="Select Status" /> --}}
</x-modal>
