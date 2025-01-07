@extends('layouts.vertical', ['title' => 'Sale', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">Add Sale</h4>
            </div>
        </div>
        <div class="p-6">
            <form action="{{ route('sales.store') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2  gap-6">
                    <x-input label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Sale Name"
                        required />

                    <x-select label="Timezone" name="user_timezone_id" :options="$timezones" placeholder="Select Timezone"
                        selected="{{ old('user_timezone_id') }}" required />

                    <x-select label="Pipeline" name="pipeline_id" :options="$sales_pipelines" placeholder="Select Pipeline"
                        selected="{{ old('pipeline_id') }}" />

                    <x-select label="Pipeline Stage" name="pipeline_stage_id" :options="$sales_pipeline_stages"
                        placeholder="Select Pipeline Stage" selected="{{ old('pipeline_stage_id') }}" />

                    <x-input type="date" label="Close Date" name="close_date" value="{{ old('close_date') }}" required />

                    <x-input type="number" label="Discount Percentage" name="discount_percentage"
                        value="{{ old('discount_percentage') }}" placeholder="Enter Discount Percentage" required />

                    <x-input type="number" label="Price" name="price" value="{{ old('price') }}"
                        placeholder="Enter Price" required />

                    <x-input type="number" label="Final Price" name="final_price" value="{{ old('final_price') }}"
                        placeholder="Enter Final Price" required />

                    <x-select label="Organization" name="organization_id" :options="$organizations"
                        placeholder="Select Organization" selected="{{ old('organization_id') }}" />

                    <x-select label="Sale Owner" name="owner_id" :options="$staffs" placeholder="Select Sale Owner"
                        selected="{{ old('owner_id') }}" />

                    <x-select label="Sale Type" name="sale_type" :options="$sale_types" placeholder="Select Sale Type"
                        selected="{{ old('sale_type') }}" />

                    <x-select label="Priority" name="priority" :options="$priorities" placeholder="Select Priority"
                        selected="{{ old('priority') }}" />

                    {{-- For Contact --}}
                    {{-- <x-select label="Sale Type" name="sale_type" :options="$sale_types" placeholder="Select Sale Type"
                        selected="{{ old('sale_type') }}" /> --}}

                    {{-- For Solution --}}
                    {{-- <x-select label="Priority" name="priority" :options="$priorities" placeholder="Select Priority"
                        selected="{{ old('priority') }}" /> --}}

                    <x-textarea label="Description" name="description" placeholder="Enter Your Description" />
                </div>

                <button type="submit"
                    class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Save
                </button>
            </form>
        </div>
    </div>
@endsection
