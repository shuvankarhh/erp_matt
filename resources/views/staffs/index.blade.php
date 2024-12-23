@extends('layouts.vertical', ['title' => 'Staffs', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">Staffs</h4>
                <div class="flex items-center">
                    <a href="{{ route('staffs.create') }}" class="btn-code">
                        <i class="mgc_add_line text-lg"></i>
                        <span class="ms-2">Add</span>
                    </a>
                </div>
            </div>
        </div>
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
                                @php
                                    $sl = 1;
                                @endphp
                                @foreach ($staffs as $staff)
                                    <tr>
                                        <x-td>{{ $sl++ }}</x-td>
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
                    </div>
                    {{-- {!! $pagination !!} --}}
                </div>
            </div>
        </div>
    </div>
@endsection
