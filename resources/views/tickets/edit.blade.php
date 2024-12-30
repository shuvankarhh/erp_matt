<x-modal-form title="Edit Ticket" action="{{ route('tickets.update', ['ticket' => $ticket->encrypted_id()]) }}" put>
    <x-input class="mb-2" label="Name" name="name" value="{{ old('name') ?? $ticket->name }}" placeholder="Enter Ticket Name"
        required />

    <x-select class="mb-2" label="Pipeline" name="pipeline_id" :options="$support_pipelines" placeholder="Select Pipeline"
        selected="{{ old('pipeline_id') ?? $ticket->pipeline_id }}" required />

    <x-select class="mb-2" label="Pipeline Stage" name="pipeline_stage_id" :options="$support_pipeline_stages"
        placeholder="Select Pipeline Stage" selected="{{ old('pipeline_stage_id') ?? $ticket->pipeline_stage_id }}" required />

    <x-select class="mb-2" label="Source" name="source_id" :options="$ticket_sources" placeholder="Select Source"
        selected="{{ old('source_id') ?? $ticket->source_id }}" required />

    <x-textarea class="mb-2" label="Description" name="description" value="{{ $ticket->description }}" placeholder="Enter Description" />

    <x-select class="mb-2" label="Owner" name="owner_id" :options="$staffs" placeholder="Select Owner"
        selected="{{ old('owner_id') ?? $ticket->owner_id }}" required />

    <x-select class="mb-2" label="Priority" name="priority" :options="$priorities" placeholder="Select Priority"
        selected="{{ old('priority') ?? $ticket->priority }}" required />

    <x-select class="mb-2" label="Contact" name="contact_id" :options="$contacts" placeholder="Select Contact"
        selected="{{ old('contact_id') ?? $ticket->contact_id ?? null }}" />

    <x-select class="mb-2" label="Organization" name="organization_id" :options="$organizations"
        placeholder="Select Organization" selected="{{ old('organization_id') ?? $ticket->organization_id ?? null }}" />

    <x-select class="mb-2" label="Sale" name="sale_id" :options="$sales" placeholder="Select Sale"
        selected="{{ old('sale_id') ?? $ticket->sale_id ?? null }}" />
</x-modal-form>
