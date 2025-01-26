<x-modal-form title="Add Solution" action="{{ route('solutions.store') }}" formId="add_solution"
    onClick="storeOrUpdate('add_solution', event)">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-input class="mb-2" label="Name" name="name" value="{{ old('name') }}" placeholder="Enter Solution Name"
            required />

        <x-input class="mb-2" label="Sku" name="sku" value="{{ old('sku') }}" placeholder="Enter Sku" />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-textarea class="mb-2" label="Description" name="description" placeholder="Enter Description" />

        <x-select class="mb-2" label="Type" name="type" :options="$types" placeholder="Select Type"
            selected="{{ old('type') }}" required />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-input type="file" class="mb-2 h-10" label="Image" name="image" value="{{ old('image') }}" />

        <x-input class="mb-2" label="Solution URL" name="solution_url" value="{{ old('solution_url') }}"
            placeholder="Enter Solution Url" />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-select class="mb-2" label="Currency" name="currency_id" :options="$currencies" placeholder="Select Currency"
            selected="{{ old('currency_id') }}" required />

        <x-input class="mb-2" type="number" label="Price" name="price" value="{{ old('price') }}"
            placeholder="Enter Price" required />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-input class="mb-2" type="number" label="Cost" name="cost" value="{{ old('cost') }}"
            placeholder="Enter Cost" required />

        <x-input class="mb-2" type="number" label="Tax Percentage" name="tax_percentage"
            value="{{ old('tax_percentage') }}" placeholder="Enter Tax Percentage" required />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-select label="Subscription Interval" name="subscription_interval" :options="$intervals"
            placeholder="Select Subscription Interval" selected="{{ old('subscription_interval') }}" />

        <x-input type="number" label="Subscription Term" name="subscription_term"
            value="{{ old('subscription_term') }}" placeholder="Enter Subscription Term" />
    </div>
</x-modal-form>
