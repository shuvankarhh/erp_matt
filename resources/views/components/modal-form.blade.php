{{-- <div class="pb-3 mb-3 border-b flex justify-between items-center">
    <h5 id="modalTitle" class="text-lg font-bold">{{ $title }}</h5>
    <button @click="$store.modal.open = false" class="text-gray-500 hover:text-black">
        <i class="fa-solid fa-xmark text-xl"></i>
    </button>
</div>

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf

    @if ($put)
        @method('PUT')
    @endif

    {{ $slot }}

    <div class="mt-4 pt-4 border-t flex justify-end">
        <button type="button" @click="$store.modal.open = false" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Close
        </button>
        <button class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Save
        </button>
    </div>
</form> --}}

<div class="pb-3 mb-3 border-b flex justify-between items-center">
    <h5 id="modalTitle" class="text-lg font-bold">{{ $title }}</h5>
    <button @click="$store.modal.open = false" class="text-gray-500 hover:text-black">
        <i class="fa-solid fa-xmark text-xl"></i>
    </button>
</div>

<form action="{{ $action }}" method="POST" enctype="multipart/form-data"
    @isset($formId) id="{{ $formId }}" @endisset
    @isset($onSubmit) onsubmit="{{ $onSubmit }}" @endisset>
    @csrf

    @if ($put)
        @method('PUT')
    @endif

    {{ $slot }}

    <div class="mt-4 pt-4 border-t flex justify-end">
        <button type="button" @click="$store.modal.open = false"
            class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Close
        </button>
        <button type="submit" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
            @isset($onClick) onclick="{{ $onClick }}" @endisset>
            Save
        </button>
    </div>
</form>
