<x-modal-form title="Edit Ticket Source"
    action="{{ route('ticket-sources.update', ['ticket_source' => $ticket_source->encrypted_id()]) }}" put>
    <x-input label="Name" name="name" value="{{ old('name') ?? $ticket_source->name }}"
        placeholder="Enter Ticket Source Name" required />
</x-modal-form>
