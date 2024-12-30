<x-modal-form title="Add Tag" action="{{ route('tags.store') }}">
    <x-input class="mb-2" label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Tag Name"
        required />
    <x-select class="mb-2" label="Type" name="type" :options="$types" placeholder="Select Type" required />
</x-modal-form>
