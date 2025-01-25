<x-modal-form title="Add Price List" action="{{ route('media-and-documentation.store',['project' => $projectId]) }}" formId="media_and_documentation"
    onClick="storeOrUpdate('media_and_documentation', event)">

    <x-select label="Price" name="pricelist_id" :options="$tasks" placeholder="Select Tasks"
        selected="{{ old('pricelist_id') }}"/>



        
        <input type="file" name="file" id="file" class="w-full" />
        



</x-modal-form>
