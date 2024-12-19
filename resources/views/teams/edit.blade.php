<x-modal header="Edit Team" action="{{ route('teams.update', ['team' => $team->encrypted_id()]) }}" put>
    <x-input label="Name" name="name" value="{{ old('name') ?? $team->name }}" placeholder="Enter Team Name"
        required />
</x-modal>
