<div x-show="open" @click.away="open = false" x-transition
    class="fixed inset-0 bg-gray-300 bg-opacity-25 flex justify-center items-center z-50">
    <div @click.stop class="bg-white rounded-lg shadow-lg w-full md:w-1/3 overflow-hidden">

        <div class="modal-header p-4 border-b flex justify-between items-center">
            <h5 class="text-lg font-bold">{{ $header }}</h5>
            <button @click="open = false" class="text-gray-500 hover:text-black">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>

        <div class="modal-body p-4">
            <form action="{{ $action }}" method="POST">
                @csrf

                @if ($put)
                    @method('PUT')
                @endif

                <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                    {{ $slot }}
                </div>

                <div class="flex justify-end mt-4">
                    <button type="submit"
                        class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
