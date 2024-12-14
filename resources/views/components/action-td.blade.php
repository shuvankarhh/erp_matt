<td class="px-6 py-4 whitespace-nowrap text-end">
    @if ($show)
        <a href="{{ $show }}" class="text-blue-500 hover:text-blue-700">Show</a>
    @endif

    @if ($edit)
        <a href="{{ $edit }}" class="ml-3 text-green-500 hover:text-green-700" title="Edit"><i class="fa-solid fa-pen-to-square text-lg"></i></a>
    @endif

    @if ($delete)
        <form action="{{ $delete }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="ml-3 text-red-500 hover:text-red-700"
                onclick="return confirm('Are you sure?')" title="Delete"><i class="fa-solid fa-trash-can text-lg"></i></button>
        </form>
    @endif
</td>
