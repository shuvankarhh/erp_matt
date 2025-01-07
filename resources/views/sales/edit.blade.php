@extends('layouts.vertical', ['title' => 'Sale', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

{{-- @dd($sale) --}}

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">Edit Sale</h4>
            </div>
        </div>
        <div class="p-6">
            <form action="{{ route('sales.update', ['sale' => $sale->encrypted_id()]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                    <x-input label="Name" name="name" value="{{ old('name') ?? ($sale->name ?? null) }}"
                        placeholder="Enter Sale Name" required />

                    <x-select label="Timezone" name="user_timezone_id" :options="$timezones" placeholder="Select Timezone"
                        selected="{{ old('user_timezone_id') ?? ($sale->user_timezone_id ?? null) }}" required />

                    <x-select label="Pipeline" name="pipeline_id" :options="$sales_pipelines" placeholder="Select Pipeline"
                        selected="{{ old('pipeline_id') ?? ($sale->pipeline_id ?? null) }}" />

                    <x-select label="Pipeline Stage" name="pipeline_stage_id" :options="$sales_pipeline_stages"
                        placeholder="Select Pipeline Stage"
                        selected="{{ old('pipeline_stage_id') ?? ($sale->pipeline_stage_id ?? null) }}" />

                    <x-input type="date" label="Close Date" name="close_date"
                        value="{{ old('close_date') ?? ($sale->close_date ? \Illuminate\Support\Carbon::parse($sale->close_date)->format('Y-m-d') : null) }}"
                        required />

                    <x-input type="number" label="Discount Percentage" name="discount_percentage"
                        value="{{ old('discount_percentage') ?? ($sale->discount_percentage ?? null) }}"
                        placeholder="Enter Discount Percentage" required />

                    <x-input type="number" label="Price" name="price"
                        value="{{ old('price') ?? ($sale->price ?? null) }}" placeholder="Enter Price" required />

                    <x-input type="number" label="Final Price" name="final_price"
                        value="{{ old('final_price') ?? ($sale->final_price ?? null) }}" placeholder="Enter Final Price"
                        required />

                    <x-select label="Organization" name="organization_id" :options="$organizations"
                        placeholder="Select Organization"
                        selected="{{ old('organization_id') ?? ($sale->organization_id ?? null) }}" />

                    <x-select label="Sale Owner" name="owner_id" :options="$staffs" placeholder="Select Sale Owner"
                        selected="{{ old('owner_id') ?? ($sale->owner_id ?? null) }}" />

                    <x-select label="Sale Type" name="sale_type" :options="$sale_types" placeholder="Select Sale Type"
                        selected="{{ old('sale_type') ?? ($sale->sale_type ?? null) }}" />

                    <x-select label="Priority" name="priority" :options="$priorities" placeholder="Select Priority"
                        selected="{{ old('priority') ?? ($sale->priority ?? null) }}" />

                    {{-- For Contact --}}
                    {{-- <x-select label="Contact" name="sale_type" :options="$sale_types" placeholder="Select Sale Type"
                        selected="{{ old('sale_type') ?? ($sale->pipeline_id ?? null) }}" /> --}}

                    {{-- For Solution --}}
                    {{-- <x-select label="Solution" name="priority" :options="$priorities" placeholder="Select Priority"
                        selected="{{ old('priority') ?? ($sale->pipeline_id ?? null) }}" /> --}}

                    <x-textarea label="Description" name="description" value="{{ $sale->description }}"
                        placeholder="Enter Your Description" />
                </div>

                <button type="submit"
                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Save
                </button>
            </form>
        </div>
    </div>
@endsection
