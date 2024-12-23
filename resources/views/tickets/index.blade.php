@extends('layouts.vertical', ['title' => 'Tickets', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Tickets</h4>
                <div class="flex items-center gap-2">

                    <button class="btn-code" data-clipboard-action="add"
                        onclick="openModal('{{ route('tickets.create') }}')">
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
                                    @foreach ($tickets as $key => $ticket_source)
                                        <tr>
                                            <x-td>{{ $loop->iteration }}</x-td>
                                            <x-td>{{ $ticket_source->name }}</x-td>
                                            <x-action-td :editModal="[
                                                'route' => route('ticket-sources.edit', [
                                                    'ticket_source' => $ticket_source->encrypted_id(),
                                                ]),
                                            ]" :simpleDelete="[
                                                'name' => $ticket_source->name,
                                                'route' => route('ticket-sources.destroy', [
                                                    'ticket_source' => $ticket_source->encrypted_id(),
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


{{-- <x-slot name='scripts'>
        <script src="/js/umtt/common.js"></script>
        <script>
            let create = async (url) => {
                hideAllNotification();
                fetch(url, {
                        method: "GET",
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                    })
                    .then(response => response.text())
                    .then(responseText => {
                        let responseJson = JSON.parse(responseText);
                        if (responseJson.response_type == 0) {
                            showErrors(responseJson.response_error);
                        } else {
                            document.getElementById('generalModalTop').innerHTML = responseJson.response_body;
                            displayModalTop();

                            $('.contact_id').select2({
                                placeholder: 'Select contact',
                                ajax: {
                                    url: '/get-contact',
                                    dataType: 'json',
                                    delay: 250,
                                    processResults: function(data) {
                                        return {
                                            results: $.map(data, function(item) {
                                                return {
                                                    text: item.value,
                                                    id: item.id
                                                }
                                            })
                                        };
                                    },

                                }
                            });

                            $('.organization_id').select2({
                                placeholder: 'Select an item',
                                maximumSelectionLength: 1,
                                ajax: {
                                    url: '/get-organization',
                                    dataType: 'json',
                                    delay: 250,
                                    processResults: function(data) {
                                        return {
                                            results: $.map(data, function(item) {
                                                return {

                                                    text: item.value,
                                                    id: item.id
                                                }
                                            })
                                        };
                                    },
                                }
                            });

                            $('.sales_id').select2({
                                placeholder: 'Select sales',
                                ajax: {
                                    url: '/get-sales',
                                    dataType: 'json',
                                    delay: 250,
                                    processResults: function(data) {
                                        return {
                                            results: $.map(data, function(item) {
                                                return {

                                                    text: item.value,
                                                    id: item.id
                                                }
                                            })
                                        };
                                    },
                                }
                            });

                            document.getElementById('create').addEventListener('submit', (e) => {
                                e.preventDefault();
                                store();
                            });

                        }
                    });
            };
            window.store = async () => {
                hideAllNotification();
                let url = document.getElementById('create').action;
                let formData = new FormData(document.getElementById('create'));
                formData.append('_token', CSRF_TOKEN);

                fetch(url, {
                        method: "POST",
                        body: formData
                    })
                    .then(response => response.text())
                    .then(responseText => {
                        let responseJson = JSON.parse(responseText);

                        if (responseJson.response_type == 0) {
                            document.getElementById('errors').innerHTML = responseJson.response_body_html;
                            handleFormValidationError(responseJson.response_error);

                        } else {
                            location.reload();
                        }
                    });
            };
            window.edit = async (url) => {
                hideAllNotification();
                fetch(url, {
                        method: "GET",
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                    })
                    .then(response => response.text())
                    .then(responseText => {
                        let responseJson = JSON.parse(responseText);
                        if (responseJson.response_type == 0) {
                            showErrorsInNotifi(responseJson.response_error);
                        } else {
                            document.getElementById('generalModalTop').innerHTML = responseJson.response_body;
                            displayModalTop();

                            $('.contact_id').select2({
                                placeholder: 'Select contact',
                                ajax: {
                                    url: '/get-contact',
                                    dataType: 'json',
                                    delay: 250,
                                    processResults: function(data) {

                                        return {

                                            results: $.map(data, function(item) {
                                                return {

                                                    text: item.value,
                                                    id: item.id
                                                }
                                            })
                                        };
                                    },

                                }
                            });

                            $('.organization_id').select2({
                                placeholder: 'Select an item',
                                maximumSelectionLength: 1,
                                ajax: {
                                    url: '/get-organization',
                                    dataType: 'json',
                                    delay: 250,
                                    processResults: function(data) {
                                        return {
                                            results: $.map(data, function(item) {
                                                return {

                                                    text: item.value,
                                                    id: item.id
                                                }
                                            })
                                        };
                                    },
                                }
                            });

                            $('.sales_id').select2({
                                placeholder: 'Select sales',
                                ajax: {
                                    url: '/get-sales',
                                    dataType: 'json',
                                    delay: 250,
                                    processResults: function(data) {
                                        return {
                                            results: $.map(data, function(item) {
                                                return {

                                                    text: item.value,
                                                    id: item.id
                                                }
                                            })
                                        };
                                    },
                                }
                            });

                            document.getElementById('create').addEventListener('submit', (e) => {
                                e.preventDefault();
                                store();
                            });
                        }
                    });
            };
        </script>
    </x-slot> --}}
{{-- </x-dashboard-layout> --}}
