@extends('layouts.vertical', ['title' => 'Contacts', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Contacts</h4>
                <div class="flex items-center">
                    <a href="{{ route('contacts.create') }}" class="btn-code">
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
                                    <x-th>Organization</x-th>
                                    <x-th>Owner</x-th>
                                    <x-th>Tags</x-th>
                                    <x-th>Archive Status</x-th>
                                    <x-th align="text-end">Action</x-th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @php
                                    $sl = 1;
                                @endphp

                                @foreach ($contacts as $key => $contact)
                                    <tr>
                                        <x-td>{{ $sl++ }}</x-td>
                                        <x-td>{{ $contact->name ?? null }}</x-td>
                                        <x-td>{{ $contact->email ?? null }}</x-td>
                                        <x-td>{{ $contact->phone ?? null }}</x-td>
                                        {{-- <td>
                                            <a href="{{ route('contacts.show', ['contact' => $contact->encrypted_id()]) }}">
                                                {{ $contact->name ?? null }}
                                            </a>
                                        </td> --}}
                                        <x-td>{{ $contact->organization->name ?? null }}</x-td>
                                        <x-td>{{ $contact->owner->name ?? null }}</x-td>
                                        <x-td>@php
                                            $tags = $contact->tags;
                                        @endphp
                                            @if ($tags->isNotEmpty())
                                                @foreach ($tags as $tag)
                                                    {{ $tag->name . ' ' }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                    {{-- <li>{{ $tag->name }}</li> --}}
                                                @endforeach
                                            @else
                                                No Tags
                                            @endif
                                        </x-td>
                                        <x-td>
                                            @isset($contact->acting_status)
                                                @if ($contact->acting_status == 1)
                                                    <span
                                                        class="inline-block py-1 px-3 text-sm font-semibold text-white bg-green-500 rounded-full">Active</span>
                                                @elseif($contact->acting_status == 2)
                                                    <span
                                                        class="inline-block py-1 px-3 text-sm font-semibold text-white bg-yellow-400 rounded-full">Archived</span>
                                                @else
                                                    <span class="text-gray-500">N/A</span>
                                                @endif
                                            @endisset
                                        </x-td>
                                        <x-action-td :edit="route('contacts.edit', [
                                            'contact' => $contact->encrypted_id(),
                                        ])" :simpleDelete="[
                                            'name' => $contact->name,
                                            'route' => route('contacts.destroy', [
                                                'contact' => $contact->encrypted_id(),
                                            ]),
                                        ]" />
                                        {{-- <td>
                                            <div class="dropleft" style="text-align: center;">
                                                <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="flaticon-dot-three" style="font-size: 17px;color: #1a73e9;">
                                                    </i>
                                                </a>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('contacts.show', ['contact' => $contact->encrypted_id()]) }}">
                                                        Show
                                                    </a>

                                                    <a class="dropdown-item"
                                                        href="{{ route('contacts.edit', ['contact' => $contact->encrypted_id()], ['contact' => $contact->encrypted_id()]) }}">
                                                        Edit
                                                    </a>

                                                    <button class="dropdown-item"
                                                        onclick="simpleResourceDelete('{{ $contact->name ?? 'the user no. ' . $contacts->firstItem() + $key }}', '{{ route('contacts.destroy', ['contact' => $contact->encrypted_id()]) }}')">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        async function simpleResourceDelete(resourceName, deleteUrl) {

            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const result = await Swal.fire({
                title: `Are you sure you want to delete "${resourceName}"?`,
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            });

            if (result.isConfirmed) {
                try {
                    const response = await fetch(deleteUrl, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json'
                        }
                    });

                    if (response.ok) {
                        location.reload();
                    } else {
                        const errorText = await response.text();
                        throw new Error(errorText || 'Failed to delete the resource.');
                    }
                } catch (error) {
                    console.error(error.message);
                }
            }
        }
    </script>
@endsection
