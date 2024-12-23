<x-modal-form title="Add Designation" action="{{ route('designations.store') }}">
    <x-input label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Designation Name" required />
</x-modal-form>
