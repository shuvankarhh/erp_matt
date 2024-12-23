<x-modal-form title="Add Tag" action="{{ route('tags.update', ['tag' => $tag->encrypted_id()]) }}" put>
    <x-input class="mb-2" label="Name" name="name" value="{{ old('name') ?? $tag->name }}"
        placeholder="Enter Tag Name" required />
    <x-select class="mb-2" label="Type" name="type" :options="$types" selected="{{ old('type') ?? $tag->type }}"
        placeholder="Select Type" required />
</x-modal-form>
