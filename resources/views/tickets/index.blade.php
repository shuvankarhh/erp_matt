@extends('layouts.vertical', ['title' => 'Tickets', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Tickets</h4>
                <div class="flex items-center gap-2">

                    <button class="btn-code" data-clipboard-action="add" onclick="openModal('{{ route('tickets.create') }}')">
                        <i class="mgc_add_line text-lg"></i>
                        <span class="ms-2">Add</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <div class="h-64 overflow-y-auto">
                    <div class="min-w-full inline-block align-middle">
                        <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                    <tr>
                                        <x-th>No</x-th>
                                        <x-th>Name</x-th>
                                        <x-th align="text-end">Action</x-th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $key => $ticket)
                                        <tr>
                                            <x-td>{{ $loop->iteration }}</x-td>
                                            <x-td>{{ $ticket->name }}</x-td>
                                            <x-action-td :editModal="[
                                                'route' => route('tickets.edit', [
                                                    'ticket' => $ticket->encrypted_id(),
                                                ]),
                                            ]" :simpleDelete="[
                                                'name' => $ticket->name,
                                                'route' => route('tickets.destroy', [
                                                    'ticket' => $ticket->encrypted_id(),
                                                ]),
                                            ]" />
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
