<x-modal-form title="Add Sales Pipeline" action="{{ route('sales-pipelines.store') }}">
    <x-input label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Sales Pipeline Name" required />
</x-modal-form>
