<x-modal header="Edit Industry" action="{{ route('industries.update', ['industry' => $industry->encrypted_id()]) }}" put>
    <x-input label="Name" name="name" value="{{ old('name') ?? $industry->name }}" placeholder="Enter Industry Name"
        required />
</x-modal>
