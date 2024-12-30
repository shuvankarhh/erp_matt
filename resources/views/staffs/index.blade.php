@extends('layouts.vertical', ['title' => 'Staffs', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-white border-b px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">All Staffs</h2>
            <div class="flex items-center">
                {{-- <a href="{{ route('staffs.create') }}"
                    class="flex items-center bg-slate-100 dark:bg-slate-700 text-sm px-3 py-2 rounded-lg hover:bg-slate-500 font-semibold hover:text-white"
                    title="Add"> --}}
                <a href="{{ route('staffs.create') }}"
                    class="flex items-center bg-blue-500 text-white hover:bg-blue-700 font-semibold text-sm p-2 rounded-lg dark:bg-slate-700 dark:text-gray-400 dark:hover:text-white"
                    title="Add">
                    {{-- <i class="mgc_add_line text-lg"></i> --}}
                    <i class="fa fa-plus text-md"></i>
                    <span class="ml-1">Add</span>
                </a>
            </div>
        </div>
    </div>

    {{-- <div class="card"> --}}
    {{-- <div class="card-header"> --}}
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        {{-- <div class="bg-white border-b px-6 py-4 flex justify-between items-center">
            <h2 class="prose">All Staffs</h2>
            <div class="flex items-center">
                <a href="{{ route('staffs.create') }}" class="btn-code">
                    <i class="mgc_add_line text-lg"></i>
                    <span class="ms-2">Add</span>
                </a>
            </div>
        </div> --}}
        {{-- <div>
            <div class="flex justify-between items-center">
                <h4>All Staffs</h4>
                <div class="flex items-center">
                    <a href="{{ route('staffs.create') }}" class="btn-code">
                        <i class="mgc_add_line text-lg"></i>
                        <span class="ms-2">Add</span>
                    </a>
                </div>
            </div>
        </div> --}}
        {{-- </div> --}}
        <div class="p-6">
            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <x-th>No</x-th>
                                    <x-th>Name</x-th>
                                    <x-th>Email</x-th>
                                    <x-th>Phone</x-th>
                                    <x-th>Designation</x-th>
                                    <x-th>Team</x-th>
                                    <x-th>Photo</x-th>
                                    <x-th>Acting Status</x-th>
                                    <x-th align="text-end">Action</x-th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($staffs as $key => $staff)
                                    <tr>
                                        <x-td class="px-4 py-2">{{ $staffs->firstItem() + $key }}</x-td>
                                        <x-td>{{ $staff->name ?? null }} {{ $staff->short_name ?? null }}</x-td>
                                        <x-td>{{ $staff->user->email ?? null }}</x-td>
                                        <x-td>{{ $staff->phone_code ?? null }}{{ $staff->phone ?? null }}</x-td>
                                        <x-td>{{ $staff->designation->name ?? null }}</x-td>
                                        <x-td>{{ $staff->team->name ?? null }}</x-td>
                                        <x-td>
                                            <a class="product-list-img">
                                                @if (isset($staff->user_photos->path))
                                                    <img src="storage/{{ $staff->user_photos->path }}" alt="product">
                                                @else
                                                    <img src="/images/user.png" alt="product">
                                                @endif
                                            </a>
                                        </x-td>
                                        <x-td>
                                            @if ($staff->user->acting_status == 0)
                                                <span class="text-red-500 font-semibold">Inactive</span>
                                            @elseif ($staff->user->acting_status == 1)
                                                <span class="text-green-500 font-semibold">Active</span>
                                            @endif
                                        </x-td>
                                        <x-action-td :edit="route('staffs.edit', [
                                            'staff' => $staff->encrypted_id(),
                                        ])" :simpleDelete="[
                                            'name' => $staff->name . ' ' . $staff->short_name,
                                            'route' => route('staffs.destroy', [
                                                'staff' => $staff->encrypted_id(),
                                            ]),
                                        ]" />
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <x-pagination :paginator="$staffs" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- </div> --}}
@endsection
