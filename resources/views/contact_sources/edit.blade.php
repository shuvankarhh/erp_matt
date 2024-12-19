<x-modal header="Edit Contact Source" action="{{ route('contact-sources.update', ['contact_source' => $contact_source->encrypted_id()]) }}" put>
    <x-input label="Name" name="name" value="{{ old('name') ?? $contact_source->name }}" placeholder="Enter Contact Source Name"
        required />
</x-modal>
