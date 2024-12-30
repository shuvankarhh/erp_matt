<x-modal-form title="Edit Solution" action="{{ route('solutions.update', ['solution' => $solution->encrypted_id()]) }}"
    put>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-input class="mb-2" label="Name" name="name" value="{{ old('name') ?? ($solution->name ?? null) }}"
            placeholder="Enter Solution Name" required />

        <x-input class="mb-2" label="Sku" name="sku" value="{{ old('sku') ?? ($solution->sku ?? null) }}"
            placeholder="Enter Sku" required />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-textarea class="mb-2" label="Description" name="description" value="{{ $solution->description ?? null }}"
            placeholder="Enter Description" />

        <x-select class="mb-2" label="Type" name="type" :options="$types" placeholder="Select Type"
            selected="{{ old('type') ?? ($solution->type ?? null) }}" />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-input class="mb-2 h-10" type="file" label="Image" name="image"
            value="{{ old('image') ?? ($solution->image ?? null) }}" />

        <x-input class="mb-2" label="Solution Url" name="solution_url"
            value="{{ old('solution_url') ?? ($solution->solution_url ?? null) }}" placeholder="Enter Solution Url"
            required />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-select class="mb-2" label="Currency" name="currency_id" :options="$currencies" placeholder="Select Currency"
            selected="{{ old('currency_id') ?? ($solution->currency_id ?? null) }}" />

        <x-input class="mb-2" type="number" label="Price" name="price"
            value="{{ old('price') ?? ($solution->price ?? null) }}" placeholder="Enter Price" required />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-input class="mb-2" type="number" label="Cost" name="cost"
            value="{{ old('cost') ?? ($solution->cost ?? null) }}" placeholder="Enter Cost" required />

        <x-input class="mb-2" type="number" label="Tax Percentage" name="tax_percentage"
            value="{{ old('tax_percentage') ?? ($solution->tax_percentage ?? null) }}"
            placeholder="Enter Tax Percentage" required />
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <x-select label="Subscription Interval" name="subscription_interval" :options="$intervals"
            placeholder="Select subscription_interval"
            selected="{{ old('subscription_interval') ?? ($solution->subscription_interval ?? null) }}" />

        <x-input type="number" label="Subscription Term" name="subscription_term"
            value="{{ old('subscription_term') ?? ($solution->subscription_term ?? null) }}"
            placeholder="Enter Subscription Term" required />
    </div>
</x-modal-form>
