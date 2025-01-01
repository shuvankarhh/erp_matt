@extends('layouts.vertical', ['title' => 'Organizations', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Organizations</h4>
                <div class="flex items-center">
                    <a href="{{ route('organizations.create') }}" class="btn-code">
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
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <x-th>No</x-th>
                                    <x-th>Name</x-th>
                                    <x-th>Domain Name</x-th>
                                    <x-th>Email</x-th>
                                    <x-th>Phone</x-th>
                                    <x-th align="text-end">Action</x-th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($organizations as $key => $organization)
                                    <tr>
                                        <x-td>{{ $organizations->firstItem() + $key }}</x-td>
                                        <x-td>
                                            <a
                                                href="{{ route('organizations.show', ['organization' => $organization->encrypted_id()]) }}">
                                                {{ $organization->name ?? null }}
                                            </a>
                                        </x-td>
                                        <x-td>{{ $organization->domain_name }}</x-td>
                                        <x-td>{{ $organization->email }}</x-td>
                                        <x-td>{{ $organization->phone }}</x-td>
                                        <x-action-td :edit="route('organizations.edit', [
                                            'organization' => $organization->encrypted_id(),
                                        ])" :simpleDelete="[
                                            'name' => $organization->name,
                                            'route' => route('organizations.destroy', [
                                                'organization' => $organization->encrypted_id(),
                                            ]),
                                        ]" />
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <x-pagination :paginator="$organizations" />
                </div>
            </div>
        </div>
    </div>
@endsection
