<x-modal header="Edit Designation" action="{{ route('designations.update', ['designation' => $designation->encrypted_id()]) }}" put>
    <x-input label="Name" name="name" value="{{ old('name') ?? $designation->name }}" placeholder="Enter Designation Name"
        required />
</x-modal>
