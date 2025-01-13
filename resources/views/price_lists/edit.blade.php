<x-modal-form title="Edit Price List"
    action="{{ route('price-lists.update', ['price_list' => $price_list->encrypted_id()]) }}"
    formId="edit_price_list" onClick="storeOrUpdate('edit_price_list', event)" put>

    <x-input class="mb-2" type="number" label="From Price" name="from_price" value="{{ old('from_price') ?? $price_list->from_price }}"
        placeholder="Enter From Price" required />

    <x-input type="number" label="To Price" name="to_price" value="{{ old('to_price') ?? $price_list->to_price }}" placeholder="Enter To Price"
        required />

</x-modal-form>
