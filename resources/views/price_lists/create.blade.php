<x-modal-form title="Add Price List" action="{{ route('price-lists.store') }}" formId="add_price_list"
    onClick="storeOrUpdate('add_price_list', event)">

    <x-input class="mb-2" type="number" label="From Price" name="from_price" value="{{ old('from_price') }}"
        placeholder="Enter From Price" required />

    <x-input type="number" label="To Price" name="to_price" value="{{ old('to_price') }}" placeholder="Enter To Price"
        required />

</x-modal-form>
