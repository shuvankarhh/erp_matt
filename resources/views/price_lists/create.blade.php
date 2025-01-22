<x-modal-form title="Add Price List" action="{{ route('price-lists.store') }}" formId="add_price_list"
    onClick="storeOrUpdate('add_price_list', event)">

    <x-input class="mb-2" type="number" label="Price" name="price" value="{{ old('price') }}"
        placeholder="Enter Price" required />


</x-modal-form>
