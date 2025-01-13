@extends('layouts.vertical', ['title' => 'Project', 'sub_title' => 'Project', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])

@section('css')
    @vite(['node_modules/glightbox/dist/css/glightbox.min.css'])
@endsection

@section('content')
@section('script')
    @vite('resources/js/pages/main.js')
@endsection
<style>

    .form-input {
        width: 100%;
        padding: 8px;
        padding-right: 2.5rem; /* Space for the icon */
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    #save-icon {
        font-size: 1.2rem;
        color: #4caf50; /* Green color for save indication */
        pointer-events: none; /* Prevent interaction with the icon */
    }

    .hidden {
        display: none;
    }

    .sortable-ghost {
        background-color: #f3f4f6;
        opacity: 0.7;
        border: 2px dashed #ccc;
    }

</style>




<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="card">
    <div class="card-header">
        <div class="flex justify-between items-center">
            <h4 class="card-title">Project table</h4>
            <div class="flex items-center gap-2">
                <a href="{{ route('projects.create') }}">
                <button class="bg-green-500 text-white font-medium py-2 px-4 rounded-full hover:bg-green-600 menu-icon">
                    <i class="mgc_add_line font-bold"></i> Add New
                </button>
                </a>
            </div>
        </div>
    </div>
    <div class="p-6">
        <div class="overflow-x-auto">
            <div class="min-w-full inline-block align-middle">
                <div class="border rounded-lg shadow-lg overflow-hidden dark:border-gray-700 dark:shadow-gray-900">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                    Order Number 
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                    Status
                                </th>
                                {{-- <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                    Total Submited Forms
                                </th> --}}
                                <th scope="col" class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-gray-400">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            @foreach ($projects as $project)
                                <tr>
                                    <td class="p-4">{{$project->order_number ?? null }} </td>
                                    <td> on test</td>

                                    
                                        <td class="flex justify-end p-4 mr-2">
                                            <a href="{{ route('projects.show', ['project' => $project->id]) }}">
                                                <span>
                                                    <i class="text-3xl mgc_eye_2_fill text-blue-400 hover:text-blue-600"></i>
                                                </span>
                                            </a>
                                        </td>
                                    
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function showSaveIconAndSave(input) {
        const saveIcon = document.getElementById('save-icon');
        const inputValue = input.value.trim();

        if (inputValue !== "") {

            saveIcon.textContent = "💾";

            saveIcon.classList.remove('hidden');

            saveToServer(inputValue)
                .then(() => {
                    saveIcon.textContent = "✅"; // Success icon
                })
                .catch(() => {
                    saveIcon.textContent = "❌"; // Error icon
                });
        } else {
            saveIcon.classList.add('hidden'); // Hide icon
        }
    }
    

    function inTheCustomers() {
        let inTheCustomer = document.getElementById('inTheCustomer');
        let selectedValue = inTheCustomer.value;

        if (selectedValue === "existing") {
            const customerList = document.querySelector('.customerList');
            const createCustomer = document.querySelector('.createCustomer');

            if (customerList.classList.contains('hidden')) {
                customerList.classList.remove('hidden');
            }
            if (!createCustomer.classList.contains('hidden')) {
                createCustomer.classList.add('hidden');
            }

        } else if (selectedValue === "createNew") {
            const customerList = document.querySelector('.customerList');
            const createCustomer = document.querySelector('.createCustomer');

            if (!customerList.classList.contains('hidden')) {
                customerList.classList.add('hidden');
            }
            if (createCustomer.classList.contains('hidden')) {
                createCustomer.classList.remove('hidden');
            }
        }else{
            const customerList = document.querySelector('.customerList');

            const createCustomer = document.querySelector('.createCustomer');
            if (!createCustomer.classList.contains('hidden')) {
                createCustomer.classList.add('hidden');
            }
            if (!customerList.classList.contains('hidden')) {
                customerList.classList.add('hidden');
            }
        }

    }


    function referralSources() {
        let referralSource = document.getElementById('referralSource');
        let selectedValue = referralSource.value;

        if (selectedValue === "existingReferralSource") {
            const referralSourceList = document.querySelector('.referralSourceList');
            const createReferralSource = document.querySelector('.createReferralSource');

            if (referralSourceList.classList.contains('hidden')) {
                referralSourceList.classList.remove('hidden');
            }
            if (!createReferralSource.classList.contains('hidden')) {
                createReferralSource.classList.add('hidden');
            }

        } else if (selectedValue === "addNewReferralSource") {
            const referralSourceList = document.querySelector('.referralSourceList');
            const createReferralSource = document.querySelector('.createReferralSource');

            if (!referralSourceList.classList.contains('hidden')) {
                referralSourceList.classList.add('hidden');
            }
            if (createReferralSource.classList.contains('hidden')) {
                createReferralSource.classList.remove('hidden');
            }
        }else{
            const referralSourceList = document.querySelector('.referralSourceList');

            const createReferralSource = document.querySelector('.createReferralSource');
            if (!createReferralSource.classList.contains('hidden')) {
                createReferralSource.classList.add('hidden');
            }
            if (!referralSourceList.classList.contains('hidden')) {
                referralSourceList.classList.add('hidden');
            }
        }

    }


    function insuranceInformation() {
        let insuranceInformation = document.getElementById('insurance-information');
        let selectedValue = insuranceInformation.value;

        if (selectedValue === "1") {
            const insuranceInformations = document.querySelector('.insuranceInformations');

            if (insuranceInformations.classList.contains('hidden')) {
                insuranceInformations.classList.remove('hidden');
            }

        } else if (selectedValue === "0") {
            const insuranceInformations = document.querySelector('.insuranceInformations');

            if (!insuranceInformations.classList.contains('hidden')) {
                insuranceInformations.classList.add('hidden');
            }
        }

    }

</script>

@endsection

@section('script')
    @vite('resources/js/pages/gallery.js')
@endsection
