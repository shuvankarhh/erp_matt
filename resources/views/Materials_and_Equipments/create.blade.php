<x-modal-form title="Add Price List" action="{{ route('materials-equipment.store',['project' => $projectId]) }}" formId="materials_equipment"
    onClick="storeOrUpdate('materials_equipment', event)">

    <x-input class="mb-2" type="text" label="Name" name="name" value="{{ old('name') }}"
        placeholder="Enter name" required />

    <x-input class="mb-2" type="number" label="Quantity" name="quantity" value="{{ old('quantity') }}" 
        placeholder="Enter quantity" step="0.01" required />

    <x-select label="Price" name="pricelist_id" :options="$pricelists" placeholder="Select price"
        selected="{{ old('pricelist_id') }}"/>

</x-modal-form>
