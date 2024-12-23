<div x-data="{ open: false }" @keydown.escape.window="open = false">
    {{-- <button @click="open = true" class="px-4 py-2 bg-blue-500 text-white rounded">Open Modal</button> --}}

    <div x-show="open" x-transition.opacity
        class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center z-50">

        <div @click.stop class="bg-white rounded-lg shadow-lg w-full max-w-lg h-[90vh] overflow-y-auto"
            style="overscroll-behavior: contain; -ms-overflow-style: none; scrollbar-width: none;">

            <div class="p-4 border-b flex justify-between items-center">
                <h5 class="text-lg font-bold">Entire Modal Scrollable</h5>
                <button @click="open = false" class="text-gray-500 hover:text-black">
                    <i class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <div class="p-4">
                <p>
                    This modal allows the entire container to scroll, including the header, body, and footer.
                </p>
                @for ($i = 1; $i <= 50; $i++)
                    <p>Row {{ $i }} - Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                @endfor
            </div>

            <div class="p-4 border-t flex justify-end">
                <button @click="open = false" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    Close
                </button>
                <button class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>
