@extends('layouts.vertical', ['title' => 'Email', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <div class="bg-white border-b px-6 py-4 flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-800">Send Email</h2>
            <div class="flex items-center">
            </div>
        </div>

        <div class="p-6">
            <form id="filterForm" action="{{ route('emails.index') }}" method="POST">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                    <div class="md:col-span-2">
                        <x-select label="Contact Stage" name="stage" :options="$stages" selected="{{ old('stage') }}"
                            select2 multiple />
                    </div>

                    <div class="md:col-span-2">
                        <x-select label="Tag" name="tags" :options="$tags" selected="{{ old('tags') }}" select2
                            multiple />
                    </div>

                    <div class="md:col-span-2">
                        <x-select label="Engagement" name="engagement" :options="$engagements" selected="{{ old('engagement') }}"
                            select2 multiple />
                    </div>

                    <div class="md:col-span-2">
                        <x-select label="Lead Status" name="lead_status" :options="$leads"
                            selected="{{ old('lead_status') }}" select2 multiple />
                    </div>

                    <div class="md:col-span-2">
                        <x-select label="Source" name="source_id" :options="$sources" selected="{{ old('source_id') }}"
                            select2 multiple />
                    </div>

                    <div class="md:col-span-2">
                        <x-select label="Organization" name="organization_id" id="organization_id" :options="$organizations"
                            selected="{{ old('organization_id') }}" select2 multiple />
                    </div>
                </div>
            </form>
        </div>

        <div class="p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Contacts</h2>

            <div class="overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden dark:border-gray-700">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <x-th>Name</x-th>
                                    <x-th>Email</x-th>
                                    <x-th>Phone</x-th>
                                    <x-th align="text-end">Action</x-th>
                                </tr>
                            </thead>
                            <tbody id="contacts-table" class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($contacts as $key => $contact)
                                    <tr>
                                        <x-td>{{ $contact->name }}</x-td>
                                        <x-td>{{ $contact->email }}</x-td>
                                        <x-td>{{ $contact->phone }}</x-td>
                                        <x-action-td>
                                            <button class="text-green-500 hover:text-green-700" title="Send Email"
                                                onclick="sendEmail($contact->id)">
                                                <i class="fa fa-paper-plane text-lg"></i>
                                            </button>
                                        </x-action-td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <x-pagination :paginator="$contacts" />
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.select2').forEach(function(select) {
                $(select).select2({
                    multiple: true,
                    placeholder: 'All',
                });

                $(select).on('select2:select select2:unselect', fetchContacts);
            });

            const filters = ['stage', 'tags', 'engagement', 'lead_status', 'source_id', 'organization_id'];
            const table = document.getElementById('contacts-table');

            filters.forEach(filter => {
                const element = document.getElementById(filter);

                if (element && !element.classList.contains('select2')) {
                    element.addEventListener('change', fetchContacts);
                }
            });

            fetchContacts();

            function fetchContacts() {
                const filterValues = {};

                filters.forEach(filter => {
                    const element = document.getElementById(filter);

                    if (element.multiple) {
                        filterValues[filter] = Array.from(element.selectedOptions).map(option => option
                            .value);
                    } else {
                        filterValues[filter] = element.value;
                    }
                });

                fetch("{{ route('email.fetch') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify(filterValues)
                    })
                    .then(response => response.json())
                    .then(data => {
                        table.innerHTML = '';
                        data.forEach(contact => {
                            table.innerHTML += `
                        <tr>
                            <x-td>${contact.name}</x-td>
                            <x-td>${contact.email}</x-td>
                            <x-td>${contact.phone}</x-td>
                            <x-action-td><button class="text-green-500 hover:text-green-700" title="Send Email" onclick="sendEmail(${contact.id})"><i class="fa fa-paper-plane text-lg"></i></button></x-action-td>
                        </tr>
                    `;
                        });
                    });
            }

            window.sendEmail = function(contactId) {
                fetch("{{ route('email.send') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            contact_id: contactId
                        })
                    })
                    .then(response => response.json())
                    .then(data => notyf.success(data.message));
            };
        });
    </script>
@endsection
