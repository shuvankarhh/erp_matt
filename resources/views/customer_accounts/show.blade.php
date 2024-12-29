@extends('layouts.vertical', ['title' => 'Customer Accounts', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    <div class="card">
        <div class="card-header">
            <div class="flex justify-between items-center">
                <h4 class="card-title">Customer Details</h4>
            </div>
        </div>
        {{-- <div class="grid grid-cols-1 md:grid-cols-3 gap-4" style="border: 1px solid red"> --}}
        <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
            <!-- Left Column -->
            <div class="md:col-span-3 border rounded">
                <div class="flex flex-col items-center mt-4">
                    <img id="preview_image" class="w-36 h-36 rounded-full" src="{{ asset('storage/images/user.jpeg') }}"
                        alt="customer">
                    <p id="customer_name_center" class="mt-1">{{ $customer->contact->name }}</p>
                    <p>{{ $customer->contact->job_title }}</p>

                    {{-- <div class="flex space-x-3 mt-2">
                        <div class="p-2 border rounded-full bg-white"><span class="flaticon-email-fill-2 text-black"></span>
                        </div>
                        <div class="p-2 border rounded-full bg-white"><span class="flaticon-telephone text-black"></span>
                        </div>
                        <div class="p-2 border rounded-full bg-white"><span
                                class="flaticon-left-dot-menu text-black"></span></div>
                    </div> --}}

                    {{-- <div class="flex space-x-3 mt-2">
                        <div class="p-2 border rounded-full bg-white">
                            <i class="fas fa-envelope text-black"></i> <!-- Font Awesome email icon -->
                        </div>
                        <div class="p-2 border rounded-full bg-white">
                            <i class="fas fa-phone-alt text-black"></i> <!-- Font Awesome telephone icon -->
                        </div>
                        <div class="p-2 border rounded-full bg-white">
                            <i class="fas fa-ellipsis-h text-black"></i> <!-- Font Awesome menu icon -->
                        </div>
                    </div> --}}

                    <div class="flex space-x-3 mt-2">
                        <div class="flex items-center justify-center h-10 w-10 border rounded-full bg-white">
                            <i class="fas fa-envelope text-black"></i> <!-- Email icon -->
                        </div>
                        <div class="flex items-center justify-center h-10 w-10 border rounded-full bg-white">
                            <i class="fas fa-phone-alt text-black"></i> <!-- Phone icon -->
                        </div>
                        <div class="flex items-center justify-center h-10 w-10 border rounded-full bg-white">
                            <i class="fas fa-ellipsis-h text-black"></i> <!-- Menu icon -->
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 mb-3">
                    <button class="btn bg-green-500 text-white px-4 py-2 rounded">Edit Contact</button>
                </div>
                <div class="grid grid-cols-2 gap-4 p-3">
                    <a class="btn bg-blue-500 text-white py-2 rounded" id="option1" href="#">Contact Info</a>
                    <a class="btn bg-gray-200 py-2 rounded" id="option2" href="#">Address Info</a>
                </div>
                <div class="card-body">
                    <div id="body1">
                        <label>Email</label>
                        <p class="font-bold text-dark mb-4">{{ $customer->contact->email ?? '' }}</p>
                        <label>Phone</label>
                        <p class="font-bold text-dark mb-4">
                            {{ $customer->contact->phone_code ?? '' }}{{ $customer->contact->phone ?? '' }}</p>
                        <label>Life Cycle Stage</label>
                        <p class="font-bold text-dark mb-4">
                            @if ($customer->contact->stage == 1)
                                <span>Subscriber</span>
                            @elseif($customer->contact->stage == 2)
                                <span>Lead</span>
                            @elseif($customer->contact->stage == 3)
                                <span>Opportunity</span>
                            @elseif($customer->contact->stage == 4)
                                <span>Customer</span>
                            @elseif($customer->contact->stage == 5)
                                <span>Evangelist</span>
                            @elseif($customer->contact->stage == 6)
                                <span>Other</span>
                            @else
                                <span>No Data...</span>
                            @endif
                        </p>
                        <label>Job Title</label>
                        <p class="font-bold text-dark mb-4">{{ $customer->contact->job_title ?? '' }}</p>
                        <label>Contact Source</label>
                        <p class="font-bold text-dark mb-4">{{ $customer->contact->source->name ?? '' }}</p>
                    </div>
                </div>
            </div>

            <!-- Middle Column -->
            <div class="bg-gray-100 p-4 md:col-span-6 flex flex-col items-center justify-center border rounded">
                <ul class="flex space-x-4 mb-4">
                    <li class="w-1/4"><a class="btn bg-green-500 text-white py-2 px-4 rounded block text-center"
                            href="#">Activity</a></li>
                    <li class="w-1/4"><a class="btn bg-gray-200 py-2 px-4 rounded block text-center"
                            href="#">Emails</a></li>
                    <li class="w-1/4"><a class="btn bg-gray-200 py-2 px-4 rounded block text-center"
                            href="#">Calls</a></li>
                    <li class="w-1/4"><a class="btn bg-gray-200 py-2 px-4 rounded block text-center"
                            href="#">Meetings</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active">
                        <p>Activity Content</p>
                    </div>
                    <div class="tab-pane">
                        <div class="emailbox">
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-4">
                                        <label for="" class="font-bold">Subject:</label>
                                        <input type="text" class="form-control border rounded px-3 py-2">
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="font-bold">Message:</label>
                                        <div id="mysummernote" class="border p-3"></div>
                                    </div>
                                    <div>
                                        <button
                                            class="btn bg-green-500 text-white px-4 py-2 rounded float-right">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column -->
            <div class="md:col-span-3 border rounded">
                <div>
                    <p class="mt-4 font-bold">Organization
                        @if ($customer->contact->organization_id != null)
                            <a onclick="create('{{ route('edit_organization', ['id' => $customer->contact_id]) }}')">
                                <span id="edit-button" class="flaticon-edit-1 text-dark"></span>
                            </a>
                        @endif
                    </p>
                    @if ($customer->contact->organization_id != null)
                        <div class="m-2">
                            <p class="text-blue-500">{{ $customer->contact->organization->name ?? null }}</p>
                            <a
                                href="{{ $customer->contact->organization->domain_name ?? null }}">{{ $customer->contact->organization->domain_name ?? null }}</a>
                        </div>
                        <div class="m-2 p-3 border rounded">
                            <span class="flaticon-email">{{ $customer->contact->organization->email ?? null }}</span><br>
                            <span
                                class="flaticon-telephone">{{ $customer->contact->organization->phone ?? null }}</span><br>
                        </div>
                    @else
                        <a onclick="create('{{ route('edit_organization', ['id' => $customer->contact_id]) }}')">
                            <div class="btn bg-gray-200 flex justify-center items-center rounded mb-3">
                                <span class="ti-plus p-2">Add Organization</span>
                            </div>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#mysummernote').summernote({
                placeholder: 'Hello stand alone ui',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>
    <script>
        var myText = document.getElementById('myText');
        var textOptions = ['Close', 'View'];
        var currentIndex = 0;
        myText.addEventListener('click', function() {
            this.textContent = textOptions[currentIndex];
            currentIndex = (currentIndex + 1) % textOptions.length;
        });

        var myText = document.getElementById('myText2');
        var textOptions = ['Close', 'View'];
        var currentIndex = 0;
        myText.addEventListener('click', function() {
            this.textContent = textOptions[currentIndex];
            currentIndex = (currentIndex + 1) % textOptions.length;
        });

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



        var navLinks = document.querySelectorAll('.xx');

        // Add click event listener to each nav-link
        navLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                // Remove the 'active' class from all nav-links
                document.querySelectorAll('.xx').forEach(function(link) {
                    link.classList.remove('btn-primary');
                });

                this.classList.add('btn-primary');
            });
        });

        var option1 = document.getElementById('option1');
        var option2 = document.getElementById('option2');

        var body1 = document.getElementById('body1');
        var body2 = document.getElementById('body2');

        body1.style.display = 'block';
        body2.style.display = 'none';

        option1.addEventListener('click', function(event) {
            event.preventDefault();

            body1.style.display = 'block';
            body2.style.display = 'none';
        });

        option2.addEventListener('click', function(event) {
            event.preventDefault();

            body1.style.display = 'none';
            body2.style.display = 'block';
        });

        var navLinks = document.querySelectorAll('.nav-link');

        // Add click event listener to each nav-link
        navLinks.forEach(function(link) {
            link.addEventListener('click', function(event) {
                event.preventDefault();

                // Remove the 'active' class from all nav-links
                document.querySelectorAll('.nav-link').forEach(function(link) {
                    link.classList.remove('btn-success');
                });

                this.classList.add('btn-success');
            });
        });
    </script>
@endsection
