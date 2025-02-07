@extends('layouts.vertical', ['title' => 'Customer Accounts', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">All Customer Accounts</h4>
                <div class="flex items-center gap-2">

                    <button class="btn-code" data-clipboard-action="add"
                        onclick="openModal('{{ route('customer-accounts.create') }}')">
                        <i class="mgc_add_line text-lg"></i>
                        <span class="ms-2">Add</span>
                    </button>
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
                                <tr>
                                    <x-th>No</x-th>
                                    <x-th>Name</x-th>
                                    <x-th>Email</x-th>
                                    <x-th>Status</x-th>
                                    <x-th align="text-end">Action</x-th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach ($customer_accounts as $key => $customer_account)
                                    <tr>
                                        <x-td>{{ $customer_accounts->firstItem() + $key }}</x-td>
                                        <x-td>{{ $customer_account->user->name ?? ($customer_account->contact->name ?? null) }}</x-td>
                                        <x-td>{{ $customer_account->user->email ?? ($customer_account->contact->email ?? null) }}</x-td>
                                        <x-td>
                                            <span
                                                class="{{ $customer_account->user->acting_status == 1 ? 'text-green-500 border border-green-500 px-2 py-1 rounded' : 'text-orange-500 border border-orange-500 px-2 py-1 rounded' }}">
                                                {{ $customer_account->user->acting_status == 1 ? 'Active' : 'Archived' }}
                                            </span>
                                        </x-td>
                                        <x-action-td :show="route('customer-accounts.show', [
                                            'customer_account' => $customer_account->encrypted_id(),
                                        ])" :editModal="[
                                            'route' => route('customer-accounts.edit', [
                                                'customer_account' => $customer_account->encrypted_id(),
                                            ]),
                                        ]" :simpleDelete="[
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
                    <x-pagination :paginator="$customer_accounts" />
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        window.updateCustomerAccount = async (formId, event) => {
            event.preventDefault();

            const form = document.getElementById(formId);
            const url = form.action;
            const formData = new FormData(form);

            try {
                const response = await fetch(url, {
                    method: 'POST',
                    body: formData,
                });

                if (!response.ok) {
                    if (response.status === 422) {
                        const data = await response.json();
                        notyf.error(data.message);
                        handleValidationErrors(data.errors);
                    } else {
                        notyf.error(response.statusText);
                    }
                    return;
                }

                const data = await response.json();

                if (data.success) {
                    window.location.href = data.redirect;
                    localStorage.setItem('success_message', data.message);
                } else {
                    notyf.error(data.error);
                }
            } catch (error) {
                console.error("Error submitting employee edit form", error);
                notyf.error(error);
            }
        };
    </script>
@endsection
