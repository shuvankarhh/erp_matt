@extends('layouts.vertical', ['title' => 'Customer Accounts', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">Customer Details</h4>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-12">

            <!-- Left Column -->
            <div class="md:col-span-3 border rounded">
                <div class="flex flex-col items-center mt-4">
                    <img id="preview_image" class="w-36 h-36 rounded-full" src="{{ asset('storage/images/user.png') }}"
                        alt="customer">
                    <p id="customer_name_center" class="mt-1 mb-2">{{ $customer->contact->name }}</p>
                    <p class="mb-3">{{ $customer->contact->job_title }}</p>

                    <div class="flex space-x-3 mt-2">
                        <div class="flex items-center justify-center h-10 w-10 border rounded-full bg-white">
                            <i class="fas fa-envelope text-black"></i>
                        </div>
                        <div class="flex items-center justify-center h-10 w-10 border rounded-full bg-white">
                            <i class="fas fa-phone-alt text-black"></i>
                        </div>
                        <div class="flex items-center justify-center h-10 w-10 border rounded-full bg-white">
                            <i class="fas fa-ellipsis-h text-black"></i>
                        </div>
                    </div>
                </div>

                {{-- <div class="flex justify-center mt-4 mb-3">
                    <button class="btn bg-green-500 text-white px-4 py-2 rounded">Edit Contact</button>
                </div> --}}

                <div class="flex justify-center mt-4 mb-3">
                    <a href="{{ route('contacts.edit', ['contact' => $customer->contact->encrypted_id()]) }}"
                        class="btn bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                        Edit Contact
                    </a>
                </div>

                <div class="bg-white px-4 md:col-span-6 mt-6">
                    <div id="contact-address-tabs" class="bg-white">
                        <!-- Tabs -->
                        <nav class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4">
                            <button id="contactInfoButton"
                                class="w-1/2 text-center py-2 px-4 rounded-md bg-green-500 text-white cursor-pointer">
                                Contact Info
                            </button>
                            <button id="addressInfoButton"
                                class="w-1/2 text-center py-2 px-4 rounded-md bg-gray-200 text-gray-700 cursor-pointer">
                                Address Info
                            </button>
                        </nav>
                    </div>

                    <div class="mt-4 p-2">
                        <!-- Contact Info Section -->
                        <div id="contactInfo">
                            <label class="text-gray-800 text-sm font-medium inline-block">Email</label>
                            <p class="text-gray-500 mb-4">{{ $customer->contact->email ?? '' }}</p>

                            <label class="text-gray-800 text-sm font-medium inline-block">Phone</label>
                            <p class="text-gray-500 mb-4">
                                {{ $customer->contact->phone_code ?? '' }}{{ $customer->contact->phone ?? '' }}</p>

                            <label class="text-gray-800 text-sm font-medium inline-block">Life Cycle Stage</label>
                            <p class="text-gray-500 mb-4">
                                @switch($customer->contact->stage)
                                    @case(1)
                                        Subscriber
                                    @break

                                    @case(2)
                                        Lead
                                    @break

                                    @case(3)
                                        Opportunity
                                    @break

                                    @case(4)
                                        Customer
                                    @break

                                    @case(5)
                                        Evangelist
                                    @break

                                    @case(6)
                                        Other
                                    @break

                                    @default
                                        No Data...
                                @endswitch
                            </p>

                            <label class="text-gray-800 text-sm font-medium inline-block">Job Title</label>
                            <p class="text-gray-500 mb-4">{{ $customer->contact->job_title ?? '' }}</p>
                            <label class="text-gray-800 text-sm font-medium inline-block">Contact Source</label>
                            <p class="text-gray-500">{{ $customer->contact->source->name ?? '' }}</p>
                        </div>

                        <!-- Address Info Section -->
                        <div id="addressInfo" class="hidden">
                            @isset($address->title)
                                <label class="text-gray-800 text-sm font-medium inline-block">Title</label>
                                <p class="text-gray-500 mb-4">{{ $address->title }}</p>
                            @endisset

                            @isset($address->holder_name)
                                <label class="text-gray-800 text-sm font-medium inline-block">Holder Name</label>
                                <p class="text-gray-500 mb-4">{{ $address->holder_name }}</p>
                            @endisset

                            @isset($address->email)
                                <label class="text-gray-800 text-sm font-medium inline-block">Address Email</label>
                                <p class="text-gray-500 mb-4">{{ $address->email }}</p>
                            @endisset

                            @isset($address->phone)
                                <label class="text-gray-800 text-sm font-medium inline-block">Address Phone</label>
                                <p class="text-gray-500 mb-4">{{ $address->phone }}</p>
                            @endisset

                            @isset($address->address_line_1)
                                <label class="text-gray-800 text-sm font-medium inline-block">Address Line 1</label>
                                <p class="text-gray-500 mb-4">{{ $address->address_line_1 }}</p>
                            @endisset

                            @isset($address->address_line_2)
                                <label class="text-gray-800 text-sm font-medium inline-block">Address Line 2</label>
                                <p class="text-gray-500 mb-4">{{ $address->address_line_2 }}</p>
                            @endisset

                            @isset($country)
                                <label class="text-gray-800 text-sm font-medium inline-block">Country</label>
                                <p class="text-gray-500 mb-4">{{ $country }}</p>
                            @endisset

                            @isset($state)
                                <label class="text-gray-800 text-sm font-medium inline-block">State</label>
                                <p class="text-gray-500 mb-4">{{ $state }}</p>
                            @endisset

                            @isset($city)
                                <label class="text-gray-800 text-sm font-medium inline-block">City</label>
                                <p class="text-gray-500 mb-4">{{ $city }}</p>
                            @endisset

                            @isset($address->postal_code)
                                <label class="text-gray-800 text-sm font-medium inline-block">Postal Code</label>
                                <p class="text-gray-500">{{ $address->postal_code }}</p>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>

            <!-- Middle Column -->
            <div class="bg-gray-100 p-4 md:col-span-6 border rounded">
                <div class="bg-light p-2">
                    <nav class="flex space-x-4">
                        <!-- Activity Tab -->
                        <a href="#activity"
                            class="w-1/4 text-center py-2 px-4 rounded-md bg-green-500 text-white hover:bg-green-600 hover:text-white"
                            id="activity-tab">
                            Activity
                        </a>
                        <!-- Emails Tab -->
                        <a href="#emails"
                            class="w-1/4 text-center py-2 px-4 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300 hover:text-black"
                            id="emails-tab">
                            Emails
                        </a>
                        <!-- Calls Tab -->
                        <a href="#calls"
                            class="w-1/4 text-center py-2 px-4 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300 hover:text-black"
                            id="calls-tab">
                            Calls
                        </a>
                        <!-- Meetings Tab -->
                        <a href="#meetings"
                            class="w-1/4 text-center py-2 px-4 rounded-md bg-gray-200 text-gray-700 hover:bg-gray-300 hover:text-black"
                            id="meetings-tab">
                            Meetings
                        </a>
                    </nav>
                </div>

                <div class="mt-4 p-2">
                    <div id="activity" class="tab-content hidden">
                        <p>Activity Content</p>
                    </div>

                    <div id="emails" class="tab-content hidden min-h-screen">
                        <p>Emails Content</p>
                        <div class="card p-6 mt-4 flex flex-col space-y-4">
                            <x-input class="mb-2" label="Subject" name="subject" value="{{ old('subject') }}"
                                placeholder="Enter Subject" />
                            <x-input class="mb-2" label="Message" name="message" value="{{ old('message') }}"
                                placeholder="Enter Message" />

                            <div class="flex justify-end">
                                <button class="btn bg-green-500 text-white px-4 py-2 rounded mt-2">Send</button>
                            </div>
                        </div>
                    </div>

                    <div id="calls" class="tab-content hidden">
                        <p>Calls Content</p>
                    </div>

                    <div id="meetings" class="tab-content hidden">
                        <p>Meetings Content</p>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="md:col-span-3 border rounded">
                {{-- Organization Part - Start Here --}}
                <div class="p-2">
                    <div class="flex justify-between items-center mx-2 my-4">
                        <div class="font-bold">
                            Organization
                        </div>
                        <div>
                            <a href="#" onclick="openModal('{{ route('edit_organization', ['contact' => $contact->id]) }}')"
                                title="Edit">
                                <span id="edit-button" class="mx-1 text-green-500 hover:text-green-700">
                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                </span>
                            </a>
                        </div>
                    </div>

                    @if ($customer->contact->organization_id != null)
                        <div class="m-2 mb-5">
                            <p class="text-blue-500 mb-3">{{ $customer->contact->organization->name ?? null }}</p>
                            <a class="" href="{{ $customer->contact->organization->domain_name ?? null }}">
                                {{ $customer->contact->organization->domain_name ?? null }}
                            </a>
                        </div>
                        <div class="m-2 p-4 border rounded">
                            <span class=""><i
                                    class="fa-solid fa-envelope text-sm text-gray-700 mr-2 mb-2"></i>{{ $customer->contact->organization->email ?? null }}</span><br>
                            <span class=""><i
                                    class="fa-solid fa-phone text-sm text-gray-700 mr-2"></i>{{ $customer->contact->organization->phone ?? null }}</span><br>
                        </div>
                    @else
                        {{-- <a onclick="create('{{ route('add_organization', ['organization' => $organization_id]) }}')">
                            <div class="btn bg-gray-200 flex justify-center items-center rounded mb-3">
                                <span class="fa-solid fa-plus p-2"> Add Organization</span>
                            </div>
                        </a> --}}

                        <div class="bg-white p-3 rounded-md shadow-md mx-2">
                            <a href="#" onclick="openModal('{{ route('add_organization', ['contact' => $contact->id]) }}')">
                                <div class="flex justify-center items-center border border-gray-700 rounded-md p-2">
                                    <span class="text-md"><i class="mgc_add_line text-lg"></i> Add Organization</span>
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
                {{-- Organization Part - End Here --}}

                {{-- Sale Part - Start Here --}}
                <div class="mx-2 p-2">
                    <div x-data="{ open: false }">
                        <div class="border-b pb-2">
                            <div class="flex justify-between items-center">
                                <div class="font-bold">
                                    Sales <span class="font-bold text-green-600">{{ $sales_count }}</span>
                                </div>
                                <div>
                                    <p @click="open = !open" class="cursor-pointer text-green-500">
                                        View
                                    </p>
                                </div>
                            </div>

                            <div class="mb-2">
                                <div class="col">
                                    <div x-show="open" x-transition.duration.300ms
                                        class="bg-white p-3 rounded-md shadow-md mt-2">
                                        <a href="{{ route('sales.create', ['contact_id' => $contact->id]) }}">
                                            <div
                                                class="flex justify-center items-center border border-gray-700 rounded-md p-2 mb-3">
                                                <span class="text-md"><i class="mgc_add_line text-lg"></i> Add New
                                                    Sale</span>
                                            </div>
                                        </a>

                                        <div class="mb-3 max-h-64 overflow-y-auto">
                                            @foreach ($sales as $sale)
                                                <div class="border border-gray-700 rounded-md p-2 mt-2 mb-2">
                                                    <p class="text-sm text-gray-600">
                                                        {{ \Carbon\Carbon::parse($sale->created_at)->format('d-M-Y') }}
                                                    </p>
                                                    <p class="text-sm">
                                                        <span><strong>Name : </strong>{{ $sale->sale->name }}</span>&nbsp;
                                                        <br>
                                                        <span class="text-red-500"><strong>Final Price : </strong>
                                                            {{ $sale->sale->final_price }}</span>
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Sale Part - End Here --}}

                {{-- Ticket Part - Start Here --}}
                <div class="mx-2 p-2">
                    <div x-data="{ open: false }">
                        <div class="border-b pb-2">
                            <div class="flex justify-between items-center">
                                <div class="font-bold">
                                    Tickets <span class="font-bold text-green-600">{{ $tickets_count }}</span>
                                </div>
                                <div>
                                    <p @click="open = !open" class="cursor-pointer text-green-500">
                                        View
                                    </p>
                                </div>
                            </div>

                            <div class="mb-2">
                                <div class="col">
                                    <div x-show="open" x-transition.duration.300ms
                                        class="bg-white p-3 rounded-md shadow-md mt-2">

                                        <a href="#"
                                            onclick="openModal('{{ route('tickets.create', ['contact_id' => $contact->id]) }}')">
                                            <div
                                                class="flex justify-center items-center border border-gray-700 rounded-md p-2 mb-3">
                                                <span class="text-md"><i class="mgc_add_line text-lg"></i>
                                                    Add New Ticket</span>
                                            </div>
                                        </a>

                                        <div class="mb-3 max-h-64 overflow-y-auto">
                                            @foreach ($tickets as $ticket)
                                                <div class="border border-gray-700 rounded-md p-2 mt-2 mb-2">
                                                    <p class="text-sm text-gray-600">
                                                        {{ \Carbon\Carbon::parse($ticket->created_at)->format('d-M-Y') }}
                                                    </p>
                                                    <p class="text-sm">
                                                        <span><strong>Name : </strong>{{ $ticket->ticket->name }}</span>
                                                    </p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Ticket Part - End Here --}}

                {{-- Customer Account Update In Show Page - Start Here --}}
                <div class="mx-2 p-2">
                    <form id="update_customer_account"
                        action="{{ route('customer-accounts.update', ['customer_account' => $customer->encrypted_id()]) }}"
                        method="post">
                        @csrf
                        @method('PUT')

                        <x-select label="Status" name="acting_status" :options="$acting_statuses" class="mb-2"
                            placeholder="Select Status" selected="{{ old('acting_status') ?? $user->acting_status }}"
                            required />

                        <x-input type="password" label="Password" name="password" class="mb-2"
                            value="{{ old('password') }}" placeholder="Enter Password" />

                        <x-input type="password" label="Confirm Password" name="confirm_password"
                            value="{{ old('confirm_password') }}" placeholder="Enter Confirm Password" />

                        <button type="submit"
                            class="mt-4 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            onclick="storeOrUpdate('update_customer_account', event)">
                            Save
                        </button>
                    </form>
                </div>
                {{-- Customer Account Update In Show Page - End Here --}}
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById('contactInfoButton').addEventListener('click', function() {
            document.getElementById('contactInfo').classList.remove('hidden');
            document.getElementById('addressInfo').classList.add('hidden');

            this.classList.add('bg-green-500', 'text-white');
            document.getElementById('addressInfoButton').classList.remove('bg-green-500', 'text-white');
            document.getElementById('addressInfoButton').classList.add('bg-gray-200', 'text-gray-700');
        });

        document.getElementById('addressInfoButton').addEventListener('click', function() {
            document.getElementById('addressInfo').classList.remove('hidden');
            document.getElementById('contactInfo').classList.add('hidden');

            this.classList.add('bg-green-500', 'text-white');
            document.getElementById('contactInfoButton').classList.remove('bg-green-500', 'text-white');
            document.getElementById('contactInfoButton').classList.add('bg-gray-200', 'text-gray-700');
        });

        document.addEventListener('DOMContentLoaded', function() {
            const defaultTab = document.querySelector('#activity-tab');
            const defaultTabContent = document.querySelector('#activity');

            defaultTab.classList.add('bg-green-500', 'text-white');
            defaultTab.classList.remove('hover:bg-gray-300', 'hover:text-black');
            defaultTab.classList.add('hover:bg-green-700', 'hover:text-white');
            defaultTabContent.classList.remove('hidden');

            document.querySelectorAll('nav a').forEach(tab => {
                tab.addEventListener('click', function(e) {
                    e.preventDefault();

                    document.querySelectorAll('nav a').forEach(t => {
                        t.classList.remove('bg-green-500', 'text-white',
                            'hover:bg-green-700', 'hover:text-white');
                        t.classList.add('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300',
                            'hover:text-black');
                    });

                    document.querySelectorAll('.tab-content').forEach(content => {
                        content.classList.add('hidden');
                    });

                    this.classList.remove('bg-gray-200', 'text-gray-700', 'hover:bg-gray-300',
                        'hover:text-black');
                    this.classList.add('bg-green-500', 'text-white', 'hover:bg-green-700',
                        'hover:text-white');

                    const contentId = this.getAttribute('href').substring(
                        1);
                    document.getElementById(contentId).classList.remove('hidden');
                });
            });
        });
    </script>
@endsection
