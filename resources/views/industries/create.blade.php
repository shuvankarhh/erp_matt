<x-modal-form title="Add Industry" header="Add Industry" action="{{ route('industries.store') }}">
    <x-input label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Industry Name" required />
</x-modal-form>
