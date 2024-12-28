@extends('layouts.vertical', ['title' => 'Customer Accounts', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Customer Accounts</h4>
                <div class="flex items-center gap-2">

                    <button class="btn-code" data-clipboard-action="add" onclick="openModal('{{ route('customer-accounts.create') }}')">
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
                                    @foreach ($customer_accounts as $key => $customer_account)
                                        <tr>
                                            <x-td>{{ $loop->iteration }}</x-td>
                                            <x-td>{{ $customer_account->user->name ?? $customer_account->contact->name ?? null }}</x-td>
                                            <x-action-td :editModal="[
                                                'route' => route('customer-accounts.edit', [
                                                    'customer_account' => $customer_account->encrypted_id(),
                                                ]),
                                            ]"

                                            :simpleDelete="[
                                                'name' => $customer_account->user->name ?? $customer_account->contact->name,
                                                'route' => route('customer-accounts.destroy', [
                                                    'customer_account' => $customer_account->encrypted_id(),
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

@section('script')
    {{-- BEGIN PAGE LEVEL SCRIPTS --}}
    <script src="/plugins/table/datatable/datatables.js"></script>
    <script>
        $('#datatable-1').DataTable({
            paging: false,
            searching: false,
            info: false,
        });
    </script>

    <script src="/js/umtt/biddings.js"></script>
    {{-- END PAGE LEVEL SCRIPTS --}}

    <script>
        let createCustomerAccount = async (url) => {
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

                        document.getElementById('contact_id').addEventListener('change', async function() {
                            fetch("{{ route('get_contact_details') }}", {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': CSRF_TOKEN
                                    },
                                    body: JSON.stringify({
                                        contact_id: this.value
                                    })
                                })
                                .then(response => response.text())
                                .then(contactDetailsResponseText => {
                                    let contactDetailsResponseJson = JSON.parse(
                                        contactDetailsResponseText);
                                    document.getElementById('email').value =
                                        contactDetailsResponseJson.email;
                                });
                        });

                        document.getElementById('customer_create').addEventListener('submit', (e) => {
                            e.preventDefault();

                            storeCustomerAccount();
                        });
                    }
                });
        };

        window.storeCustomerAccount = async () => {
            hideAllNotification();

            let url = document.getElementById('customer_create').action;
            let formData = new FormData(document.getElementById('customer_create'));
            formData.append('_token', CSRF_TOKEN);

            fetch(url, {
                    method: "POST",
                    body: formData
                })
                .then(response => response.text())
                .then(responseText => {
                    let responseJson = JSON.parse(responseText);

                    if (responseJson.response_type == 0) {
                        document.getElementById('customer_create_errors').innerHTML = responseJson
                            .response_body_html;
                        handleFormValidationError(responseJson.response_error);

                        showErrorsInNotifi(responseJson.response_error);
                    } else {
                        location.reload();
                    }
                });
        };

        let editCustomerAccount = async (url) => {
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
                        showErrorsInModal(responseJson.response_error);
                    } else {
                        document.getElementById('generalModalTop').innerHTML = responseJson.response_body;
                        displayModalTop();
                    }
                });
        };
    </script>
@endsection
