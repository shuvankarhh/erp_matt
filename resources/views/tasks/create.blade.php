<x-modal-form title="Add Task" action="{{ route('tasks.store') }}" formId="add_task"
    onClick="storeOrUpdate('add_task', event)">
    <x-input class="mb-2" label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Task Name"
        required />

    <div class="grid grid-cols-1 md:grid-cols-2  gap-4 mb-2">
        <x-select label="Type" name="type" :options="$types" placeholder="Select Type"
            selected="{{ old('type') }}" required />

        <x-select label="Priority" name="priority" :options="$priorities" placeholder="Select Priority"
            selected="{{ old('priority') }}" required />
    </div>

    <div class="grid grid-cols-1 mb-2">
        <x-select label="Assigned To" name="assigned_to" :options="$users" placeholder="Select Staff"
            selected="{{ old('assigned_to') }}" required />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
        <x-input type="date" label="Start Date" name="start_date" value="{{ old('start_date') }}" required />

        <x-input type="date" label="End Date" name="end_date" value="{{ old('end_date') }}" required />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
        <x-select label="Completion Status" name="completion_status" :options="$completion_statuses" placeholder="Select Status"
            selected="{{ old('completion_status') }}" required />

        <x-select label="Timezone" name="timezone_id" :options="$timezones" placeholder="Select Timezone"
            selected="{{ old('timezone_id') }}" required />
    </div>

    <x-textarea class="mb-2" label="Description" name="description" placeholder="Enter your description" />

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-2">
        <x-select label="Organization" name="organization_id" :options="$organizations" placeholder="Select Organization"
            selected="{{ old('organization_id') }}" required />

        <x-select label="Contact" name="contact_id" :options="$contacts" placeholder="Select Contact"
            selected="{{ old('contact_id') }}" required />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <x-select label="Sale" name="sale_id" :options="$sales" placeholder="Select Sale"
            selected="{{ old('sale_id') }}" required />

        <x-select label="Ticket" name="ticket_id" :options="$tickets" placeholder="Select Ticket"
            selected="{{ old('ticket_id') }}" required />
    </div>

    <x-select class="mb-2" label="Project" name="project_id" :options="$projects" placeholder="Select Project"
            selected="{{ old('project_id') }}" />


</x-modal-form>
