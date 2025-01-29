<x-modal-form title="Edit Price List" action="{{ route('materials-equipment.update', ['materials_equipment' => $materialsandEquipments->id]) }}" formId="materials_equipment"
    onClick="storeOrUpdate('materials_equipment', event)" put>

    <x-input class="mb-2" type="text" label="Name" name="name" value="{{ $materialsandEquipments->name ?? old('name') }}"
        placeholder="Enter name" required />

    <x-input class="mb-2" type="number" label="Quantity" name="quantity" value="{{$materialsandEquipments->quantity ?? old('quantity') }}" 
        placeholder="Enter quantity" step="0.01" required />

    <x-select label="Price" name="pricelist_id" :options="$pricelists" placeholder="Select price"
        selected="{{$materialsandEquipments->pricelist_id ?? old('pricelist_id') }}"/>

</x-modal-form>
