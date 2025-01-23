<x-modal-form title="Edit Price List"
    action="{{ route('price-lists.update', ['price_list' => $price_list->encrypted_id()]) }}"
    formId="edit_price_list" onClick="storeOrUpdate('edit_price_list', event)" put>

    <x-input class="mb-2" type="number" label="Price" name="price" value="{{ old('price') ?? $price_list->price }}"
        placeholder="Enter From Price" required />


</x-modal-form>
