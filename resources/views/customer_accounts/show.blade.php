@php
    use App\Services\LocalTime;
    use App\Services\Photo;
@endphp

<x-dashboard-layout pagename="Add Customer Account">    
    <x-slot name="css">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    </x-slot>
    <br>
    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;">Customer Details</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area" style="height:100%">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-sm-12">
                            <div class="d-flex justify-content-center mt-4">
                                <img id="preview_image" class="profile_photo rounded-circle" width="150" height="150" src="{{ asset('storage/user.png') }}" alt="customer">
                            </div>
                            <div class="d-flex justify-content-center mt-1">
                                <p id="coustomer_name_center">{{ $customer->contact->name }}</p>
                            </div>

                            <div class="d-flex justify-content-center" >
                                <p>{{ $customer->contact->job_title }}</p>
                            </div>

                            <div class="d-flex justify-content-center" >
                                <div class="rounded-circle p-2 border border-dark" style="background: rgb(255, 255, 255)"><span class="flaticon-email-fill-2 p-1" style="color: black"></span></div>
                                <div class="rounded-circle p-2 ml-3 border border-dark" style="background: rgb(255, 255, 255)"><span class="flaticon-telephone p-1" style="color: black"></span></div>
                                <div class="rounded-circle p-2 ml-3 border border-dark" style="background: rgb(255, 255, 255)"><span class="flaticon-left-dot-menu p-1" style="color: black"></span></div>
                            </div>

                            <div class="d-flex justify-content-center mt-4 mb-3" >
                                <button class="btn btn-success">Edit Contact</button>
                            </div>
                            <br>
                            <div class="row p-3">
                                <a class="xx btn btn-primary rounded col-6" id="option1" href="#">Contact Info</a>
                                <a class="xx btn rounded col-6" id="option2" href="#">Address Info</a>
                            </div>

                            <div class="card-body">
                                    
                                <div id="body1">
                                    <label for="">Email</label>
                                    <p class="font-weight-bold text-dark  mb-4">{{ $customer->contact->email ?? "" }}</p>    

                                    <label for="">Phone</label>
                                    <p class="font-weight-bold text-dark mb-4">{{ $customer->contact->phone_code ?? ""}}{{ $customer->contact->phone ?? ""}}</p>
                                    
                                    <label for="">Life Cycle stage</label>
                                    <p class="font-weight-bold text-dark mb-4">
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
                                            <span> No Data... </span>
                                        @endif
                                    </p>
                                    <label for="">Job Title</label>
                                    <p class="font-weight-bold text-dark mb-4">{{ $customer->contact->job_title ?? ""}}</p>

                                    <label for="">Contact Source</label>
                                    <p class="font-weight-bold text-dark mb-4">{{ $customer->contact->source->name ?? ""}}</p>


                                </div>

                                <div id="body2">

                                </div>

                            </div>

                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12"  style="background: rgb(241, 241, 241)">
                            <ul class="nav nav-pills mb-3 bg-light p-1" id="pills-tab" role="tablist">
                                <li class="nav-item w-25">
                                  <a class="nav-link btn btn-success active" id="pills-activity-tab" data-toggle="pill" href="#pills-activity" role="tab" aria-controls="pills-activity" aria-selected="true">Activity</a>
                                </li>
                                <li class="nav-item w-25">
                                  <a class="nav-link btn" id="pills-email-tab" data-toggle="pill" href="#pills-email" role="tab" aria-controls="pills-email" aria-selected="false">Emails</a>
                                </li>
                                <li class="nav-item w-25">
                                  <a class="nav-link btn" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Calls</a>
                                </li>
                                <li class="nav-item w-25">
                                    <a class="nav-link btn" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Meetings</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-activity" role="tabpanel" aria-labelledby="pills-activity-tab"></div>
                                <div class="tab-pane fade" id="pills-email" role="tabpanel" aria-labelledby="pills-email-tab">
                                    <div class="emailbox">
                                        <div class="card">
                                            <div class="card-body ">
                                              <div class="subject p-3">
                                                <label for="" class="font-weight-bold">Subject:</label>
                                                <input type="text" class="form-control rounded" >
                                              </div>
                                              <div class="body pl-3 pr-3">
                                                <label for="" class="font-weight-bold">Message :</label>
                                                <div id="mysummernote"></div>
                                              </div>
                                              <div>
                                                <button class="btn btn-success m-3" style="float: right">Send</button>
                                              </div>
                                            </div>
                                          </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">

                                </div>
                            </div>

                        </div>
                        <div class="col-md-3 col-lg-3 col-sm-12">
                            <div>
                                <p class="mt-4 font-weight-bold"><span>Organization</span> 
                                    @if ($customer->contact->organization_id != null)
                                        <a onclick="create('{{ route('edit_organization',['id' => $customer->contact_id]) }}')"><span id="edit-button" class="flaticon-edit-1 mr-3 font-weight-bold text-dark" ></span></a>
                                    @endif
                                </p>
                                @if ($customer->contact->organization_id != null)
                                    <div class="m-2">
                                        <p class="font-weight-normal text-primary">{{ $customer->contact->organization->name ?? null }}</p>
                                        <a href="{{ $customer->contact->organization->domain_name ?? null }}">{{ $customer->contact->organization->domain_name ?? null }}</a>
                                    </div>
                                    <div class="m-2 p-3 border border-dark rounded">
                                        <span class="flaticon-email" style="color: black"> {{ $customer->contact->organization->email ?? null }}</span><br>
                                        <span class="flaticon-telephone" style="color: black"> {{ $customer->contact->organization->phone ?? null }}</span><br>
                                    </div>
                                @else
                                    <a onclick="create('{{ route('edit_organization',['id' => $customer->contact_id]) }}')">
                                    <div class="btn create d-flex justify-content-center  rounded mb-3"  >
                                        <span class="ti-plus p-2 display-6"> Add organization </span>
                                    </div></a>
                                @endif
                            
                                <br>
                                <div class="deals border-bottom ">
                                    <div class="d-flex justify-content-between">
                                        <div class="font-weight-bold">Sales <span class="font-weight-bold text-success"> {{ $sales_count}}  </span></div>
                                        <div>
                                            <p type="button" id="myText" style="cursor: pointer;" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample2">View</p>
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <div class="col">
                                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                <div class="card card-body">
                                                    <a href="{{ route('sales.create') }}">
                                                    <div class="btn create d-flex justify-content-center border border-dark rounded mb-3"  >
                                                        <span class="ti-plus p-2 display-6"> Create new Sale</span>
                                                    </div></a>
                                                    <div class="mb-3" style="max-height: 250px; overflow-y: auto;">
                                                        @foreach ($sales as $sale)
                                                            <div  class="border border-dark rounded mt-2 mb-2">
                                                                <p class="pt-2 pl-2">{{\Carbon\Carbon::parse($sale->created_at)->format('d-M-Y')}}</p>
                                                                <p class="pl-2"> <span>{{$sale->sale->name}}</span> <span class="pr-2" style="float: right; color:red">Final Price: {{$sale->sale->final_price}}</span></p>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="deals border-bottom ">
                                <div class="d-flex justify-content-between">
                                    <div class="font-weight-bold">Tickets <span class="font-weight-bold text-success"> {{ $tickets_count}}  </span></div>
                                    <div>
                                        <p type="button" id="myText2" style="cursor: pointer;" data-toggle="collapse" data-target="#multiCollapseTicket" aria-expanded="false" aria-controls="multiCollapseExample2">View</p>
                                    </div>
                                </div>
                                <div class="row m-1">
                                    <div class="col">
                                        <div class="collapse multi-collapse " id="multiCollapseTicket">
                                            <div class="card card-body">
                                                <a href="{{ route('tickets.index') }}">
                                                <div class="btn create d-flex justify-content-center border border-dark rounded mb-3"  >
                                                    <span class="ti-plus p-2 display-6"> Create new Ticket</span>
                                                </div></a>
                                                <div class="mb-3" style="max-height: 250px; overflow-y: auto;">
                                                    @foreach ($tickets as $ticket)
                                                        <div  class="border border-dark rounded mt-2 mb-2">
                                                            <p class="pt-2 pl-2">{{\Carbon\Carbon::parse($ticket->created_at)->format('d-M-Y')}}</p>
                                                            <p class="pl-2"> <span>{{$ticket->ticket->name}}</span> </p>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3"> 

                                <p></p>

                                <form action="{{ route('customer-accounts.update', ['customer_account' => $customer->encrypted_id()]) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 row">
                                        <label for="address"
                                            class="col-4 col-form-label float-start">Status</label>
                                        <div class="col-8 mb-2">
                                            <select name="acting_status" id=""
                                                class="form-control">
                                                <option value="1"
                                                    {{ $customer->user->acting_status == 1 ? 'selected' : '' }}>
                                                    Active</option>
                                                <option value="0"
                                                    {{ $customer->user->acting_status == 0 ? 'selected' : '' }}>
                                                    Inactive</option>
                                                <option value="2"
                                                    {{ $customer->user->acting_status == 2 ? 'selected' : '' }}>
                                                    Archived</option>
                                            </select>
                                        </div>
                                        <label for="address"
                                            class="col-4 col-form-label float-start">Password</label>
                                        <div class="col-8 mb-2">
                                            <input type="password" name="password" id=""
                                                class="form-control">
                                        </div>

                                        <label for="photo"
                                            class="col-4 col-form-label float-start">Confirm
                                            Password</label>
                                        <div class="col-8 mb-2">
                                            <input type="password" name="confirm_password" id=""
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-8 float-right">
                                            <input type="submit" value="Update" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="scripts">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
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
            var textOptions = ['Close','View'];
            var currentIndex = 0;
            myText.addEventListener('click', function() {
                this.textContent = textOptions[currentIndex];
                currentIndex = (currentIndex + 1) % textOptions.length;
            });
            
            var myText = document.getElementById('myText2');
            var textOptions = ['Close','View'];
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


    </x-slot>
</x-dashboard-layout>

