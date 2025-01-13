<div class="pb-3  mb-3 border-b flex justify-between items-start">

    <h5 id="modalTitle" class="text-lg font-bold">{{ $title }}</h5>

    {{-- <button @click="$store.modal.open = false" class="text-gray-500 hover:text-black">
        <i class="fa-solid fa-xmark text-xl"></i>
    </button> --}}

    <div class=" ">
        <button
            class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
            @isset($onClick) onclick="{{ $onClick }}" @endisset>
            Save
        </button>
        <button type="button" @click="$store.modal.open = false" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Close
        </button>
        
    </div>
</div>

<form
    action="{{ $action }}"
    method="POST"
    enctype="multipart/form-data"
    @isset($formId) id="{{ $formId }}" @endisset
    @isset($onSubmit) onsubmit="{{ $onSubmit }}" @endisset>
    @csrf

    @if ($put)
        @method('PUT')
    @endif

    {{ $slot }}


</form>