<x-modal header="Add Contact Source" action="{{ route('contact-sources.store') }}">
    <x-input label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Contact Source Name" required />
</x-modal>
