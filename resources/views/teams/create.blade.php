<x-modal-form title="Add Team" action="{{ route('teams.store') }}">
    <x-input label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Team Name" required />
</x-modal-form>
