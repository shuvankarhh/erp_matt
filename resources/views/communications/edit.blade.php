<x-modal-form title="Add Communication" action="{{ route('communications.update', ['communication' => $communication->id]) }}" > 

    <x-select class="mb-2" label="Communication Type" name="type" :options="$types" placeholder="Select Type"
    selected="{{ old('type') ?? ($communication->type ?? null) }}" required />

    <label for="" class="mb-2 w-full">Summary <span class="text-red-500">*</span></label>
    <br>
    <textarea class="mt-2 w-full" name="summary" id="" cols="10" rows="5" placeholder="Enter summary ..."> {{ $communication->summary }} </textarea>
    
</x-modal-form>
