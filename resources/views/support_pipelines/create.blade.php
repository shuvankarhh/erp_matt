<x-modal-form title="Add Support Pipeline" action="{{ route('support-pipelines.store') }}">
    <x-input label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Support Pipeline Name" required />
</x-modal-form>
