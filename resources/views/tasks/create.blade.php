<x-modal-form title="Add Task" action="{{ route('tasks.store') }}">
    <x-input class="mb-2" label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Task Name"
        required />

    <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
        <x-select class="mb-2" label="Type" name="type" :options="$types" placeholder="Select Type"
            selected="{{ old('type') }}" />

        <x-select class="mb-2" label="Priority" name="priority" :options="$priorities" placeholder="Select Priority"
            selected="{{ old('priority') }}" required />
    </div>

    <x-select class="mb-2" label="Assigned To" name="assigned_to" :options="$users" placeholder="Select Staff"
        selected="{{ old('assigned_to') }}" required />

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-input class="mb-2" type="date" label="Start Date" name="start_date" value="{{ old('start_date') }}"
            required />

        <x-input class="mb-2" type="date" label="End Date" name="end_date" value="{{ old('end_date') }}"
            required />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-select class="mb-2" label="Completion Status" name="completion_status" :options="$completion_statuses"
            placeholder="Select Status" selected="{{ old('completion_status') }}" required />

        <x-select class="mb-2" label="Timezone" name="timezone_id" :options="$timezones" placeholder="Select Timezone"
            selected="{{ old('timezone_id') }}" required />
    </div>

    <x-textarea class="mb-2" label="Description" name="description" placeholder="Enter your description" />

    {{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-select class="mb-2" label="Contact" name="contact_id" :options="$contacts" placeholder="Select Contact"
            selected="{{ old('contact_id') }}" />

        <x-select class="mb-2" label="Organization" name="organization_id" :options="$organizations"
            placeholder="Select Organization" selected="{{ old('organization_id') }}" />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-select class="mb-2" label="Sale" name="sale_id" :options="$sales" placeholder="Select Sale"
            selected="{{ old('sale_id') }}" />

        <x-select class="mb-2" label="Ticket" name="ticket_id" :options="$tickets" placeholder="Select Ticket"
            selected="{{ old('ticket_id') }}" />
    </div> --}}
</x-modal-form>
