{{-- <div class="flex justify-center mt-4">
    @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
        <a href="{{ $url }}"
            class="px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-md hover:bg-green-500 hover:text-white {{ $page == $paginator->currentPage() ? 'bg-green-500 text-white' : '' }}">
            {{ $page }}
        </a>
    @endforeach
</div> --}}

{{-- <div class="flex justify-center my-4 gap-2">
    <!-- Display page numbers -->
    @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
        <a href="{{ $url }}"
            class="px-4 py-2 text-sm font-medium bg-white border border-gray-300 rounded-md
           hover:bg-green-500 hover:text-white
           {{ $page == $paginator->currentPage() ? 'bg-green-500 text-black' : 'text-black' }}">
            {{ $page }}
        </a>
    @endforeach
</div> --}}

<div class="flex justify-center my-4 gap-2">
    <!-- Display page numbers -->
    @foreach ($paginator->getUrlRange(1, $paginator->lastPage()) as $page => $url)
        <a href="{{ $url }}"
            class="px-4 py-2 text-sm font-semibold border border-gray-300 rounded-lg
           {{-- {{ $page == $paginator->currentPage() ? 'bg-green-500 text-white' : 'text-black hover:bg-green-500 hover:text-white' }}"> --}}
           {{ $page == $paginator->currentPage() ? 'bg-blue-500 text-white' : 'text-black hover:bg-blue-500 hover:text-white' }}">
            {{ $page }}
        </a>
    @endforeach
</div>
