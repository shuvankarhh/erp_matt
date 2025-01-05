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
                        <x-select label="Contact Stage" name="stage" :options="$stages" placeholder="All"
                            selected="{{ old('stage') }}" />
                    </div>
                    <div class="md:col-span-2">
                        <x-select label="Engagement" name="engagement" :options="$engagements" placeholder="All"
                            selected="{{ old('engagement') }}" />
                    </div>

                    <div class="md:col-span-2">
                        <x-select label="Lead Status" name="lead_status" :options="$leads" placeholder="All"
                            selected="{{ old('lead_status') }}" />
                    </div>

                    <div class="md:col-span-2">
                        <x-select label="Source" name="source_id" :options="$sources" placeholder="All"
                            selected="{{ old('source_id') }}" />
                    </div>

                    <div class="md:col-span-2">
                        <x-select label="Organization" name="organization_id" :options="$organizations" placeholder="All"
                            selected="{{ old('organization_id') }}" />
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
        // $('#tags').select2({
        //     multiple: true,
        //     placeholder: 'All',
        // });

        // $('#tags').on('select2:open', function() {
        //     $(this).find('option[value=""]').remove();
        // });

        document.addEventListener('DOMContentLoaded', () => {
            const filters = ['stage', 'engagement', 'lead_status', 'source_id', 'organization_id'];
            const table = document.getElementById('contacts-table');

            filters.forEach(filter => {
                document.getElementById(filter).addEventListener('change', fetchContacts);
            });

            function fetchContacts() {

                console.log("Some Changes In Select Input Field");


                const stage = document.getElementById('stage').value;
                const engagement = document.getElementById('engagement').value;
                const lead_status = document.getElementById('lead_status').value;
                const source_id = document.getElementById('source_id').value;
                const organization_id = document.getElementById('organization_id').value;

                // const tags = document.getElementById('tags').value;
                // const tags = Array.from(document.getElementById('tags').selectedOptions).map(option => option
                //     .value);

                console.log('Stage ID : ', stage);
                console.log('Engagement ID : ', engagement);
                console.log('Lead Status ID : ', lead_status);
                console.log('Source ID : ', source_id);
                console.log('Organization ID : ', organization_id);



                fetch("{{ route('email.fetch') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            stage,
                            engagement,
                            lead_status,
                            source_id,
                            organization_id
                        })
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
