<td class="px-6 py-4 whitespace-nowrap text-end">
    @if ($show)
        <a href="{{ $show }}" class="text-blue-500 hover:text-blue-700">Show</a>
    @endif

    @if ($edit)
        <a href="{{ $edit }}" class="mx-1 text-green-500 hover:text-green-700" title="Edit"><i
                class="fa-solid fa-pen-to-square text-lg"></i></a>
    @endif

    @if ($editModal)
        <button class="mx-1 text-green-500 hover:text-green-700" title="Edit"
            onclick="openModal('{{ $editModal['route'] }}')">
            <i class="fa-solid fa-pen-to-square text-lg"></i>
        </button>
    @endif

    @if ($delete)
        <form action="{{ $delete }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:text-red-700" title="Delete"><i
                    class="fa-solid fa-trash-can text-lg"></i></button>
        </form>
    @endif

    @if ($simpleDelete && isset($simpleDelete['name'], $simpleDelete['route']))
        <button class="text-red-500 hover:text-gray-700"
            onclick="simpleResourceDelete('{{ $simpleDelete['name'] }}', '{{ $simpleDelete['route'] }}')"
            title="Delete">
            <i class="fa-solid fa-trash-can text-lg"></i>
        </button>
    @endif

    {{ $slot }}
</td>
