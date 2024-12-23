<x-modal-form title="Add Ticket Source" action="{{ route('ticket-sources.store') }}">
    <x-input label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Ticket Source Name" required />
</x-modal-form>
