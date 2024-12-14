@extends('layouts.vertical', ['title' => 'Contacts', 'sub_title' => 'Menu', 'mode' => $mode ?? '', 'demo' => $demo ?? ''])


@section('content')
    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">

                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Contacts</h4>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle"
                                            style="float: right;margin-top: 18px;margin-right: 5px;" type="button"
                                            id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            Actions
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                            <button class="dropdown-item flaticon-plus-1" type="button"
                                                onclick="window.location.href = '{{ route('contacts.create') }}'"> Add
                                                new
                                                Contact</button>
                                            <a href="#" class="dropdown-item flaticon-arrow-up" data-toggle="modal"
                                                data-target="#myModal"> Import Contact</a>
                                            <a href="{{ route('contacts-export') }}"
                                                class="dropdown-item flaticon-arrow-down-1"> Export
                                                Contact</a>
                                        </div>
                                    </div>

                                    <div>
                                        <button class="btn btn-info"
                                            style="float: right;margin-top: 18px;margin-right: 28px;"
                                            onclick="window.location.href = '{{ route('contacts.create') }}'">Add
                                            Contact</button>
                                    </div>
                                </div>

                            </div>



                            {{-- <button class="btn btn-gradient-primary" >create</button> --}}
                        </div>
                        {{-- <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4 style="float: left;">Contacts</h4>
                            <button class="btn btn-gradient-primary right_side_button" onclick="window.location.href = '{{ route('contacts.create') }}'">
                                Add Contact</button>
                        </div> --}}
                    </div>
                </div>

                {{-- modal --}}
                <div class="modal" id="myModal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <p class="modal-title">Excel File Import</p>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="container text-center">
                                            <form action="{{ route('staffs-import') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group mb-4">
                                                    <div class="text-left">
                                                        <input type="file" name="file" class="form-control"
                                                            id="customFile">
                                                        {{--  <label class="custom-file-label" for="customFile">Choose file</label>  --}}
                                                    </div>
                                                </div>
                                                <button class="btn btn-primary">Import Staffs</button>
                                                <a class="btn btn-success"
                                                    href="{{ asset('files/sample_contacts.xlsx') }}">Sample File
                                                    Download</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark btn-rounded mb-1 mt-2"
                                    data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
                {{-- end modal --}}

                <div class="widget-content widget-content-area">
                    <div class="table-responsive mb-4 style-1">
                        <table id="contactTable" class="table style-1  table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="sl"> No </th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Phone </th>
                                    {{-- <th> Stage </th>
                                    <th> Engagement </th>
                                    <th> Lead Status </th> --}}
                                    {{-- <th> Source </th> --}}
                                    <th> Organization </th>
                                    <th> Owner </th>
                                    <th> Tags </th>
                                    <th> Archive Status </th>
                                    <th class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $key => $contact)
                                    <tr>
                                        <td class="sl"> {{ $contacts->firstItem() + $key }} </td>
                                        <td>
                                            <a href="{{ route('contacts.show', ['contact' => $contact->encrypted_id()]) }}">
                                                {{ $contact->name ?? null }}
                                            </a>
                                        </td>
                                        {{-- <td> {{ $contact->job_title ?? null }} </td> --}}
                                        <td> {{ $contact->email ?? null }} </td>
                                        <td> {{ $contact->phone_code ?? null }}{{ $contact->phone ?? null }} </td>
                                        {{-- <td>
                                            @isset($contact->stage)
                                                @if ($contact->stage == 1)
                                                    <span>Subscriber</span>
                                                @elseif($contact->stage == 2)
                                                    <span>Lead</span>
                                                @elseif($contact->stage == 3)
                                                    <span>Opportunity</span>
                                                @elseif($contact->stage == 4)
                                                    <span>Customer</span>
                                                @elseif($contact->stage == 5)
                                                    <span>Evangelist</span>
                                                @elseif($contact->stage == 6)
                                                    <span>Other</span>
                                                @else
                                                    <span> No Data... </span>
                                                @endif
                                            @endisset
                                        </td>
                                        <td>
                                            @isset($contact->engagement)
                                                @if ($contact->engagement == 1)
                                                    <span>Hot</span>
                                                @elseif($contact->engagement == 2)
                                                    <span>Warm</span>
                                                @elseif($contact->engagement == 3)
                                                    <span>Cold</span>
                                                @else
                                                    <span> No Data... </span>
                                                @endif
                                            @endisset
                                        </td>
                                        <td>
                                            @isset($contact->lead_status)
                                                @if ($contact->lead_status == 1)
                                                    <span>New</span>
                                                @elseif($contact->lead_status == 2)
                                                    <span>Contacted</span>
                                                @elseif($contact->lead_status == 3)
                                                    <span>In Progress</span>
                                                @elseif($contact->lead_status == 4)
                                                    <span>Qualified</span>
                                                @elseif($contact->lead_status == 5)
                                                    <span>Unqualified</span>
                                                @elseif($contact->lead_status == 6)
                                                    <span>Attempted to contact</span>
                                                @else
                                                    <span> No Data... </span>
                                                @endif
                                            @endisset
                                        </td> --}}
                                        {{-- <td> {{ $contact->source->name ?? null }} </td> --}}
                                        <td> {{ $contact->organization->name ?? null }} </td>
                                        <td> {{ $contact->owner->name ?? null }} </td>
                                        <td>
                                            @php
                                                $tags = $contact->tags;
                                            @endphp
                                            @if ($tags->isNotEmpty())
                                                @foreach ($tags as $tag)
                                                    {{ $tag->name . ' ' }}
                                                    {{-- @if (!$loop->last)
                                                     ,
                                                    @endif --}}
                                                @endforeach
                                            @else
                                                No Tags
                                            @endif
                                        </td>
                                        <td>
                                            @isset($contact->acting_status)
                                                @if ($contact->acting_status == 1)
                                                    <span class="badge badge-pill btn-outline-success">Active</span>
                                                @elseif($contact->acting_status == 2)
                                                    <span class="badge badge-pill btn-outline-warning">Archived</span>
                                                @else
                                                    <span> N/A </span>
                                                @endif
                                            @endisset
                                        </td>

                                        <td>
                                            <div class="dropleft" style="text-align: center;">
                                                <a href="#" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="flaticon-dot-three" style="font-size: 17px;color: #1a73e9;">
                                                    </i>
                                                </a>

                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('contacts.show', ['contact' => $contact->encrypted_id()]) }}">
                                                        Show
                                                    </a>

                                                    <a class="dropdown-item"
                                                        href="{{ route('contacts.edit', ['contact' => $contact->encrypted_id()], ['contact' => $contact->encrypted_id()]) }}">
                                                        Edit
                                                    </a>

                                                    <button class="dropdown-item"
                                                        onclick="simpleResourceDelete('{{ $contact->name ?? 'the user no. ' . $contacts->firstItem() + $key }}', '{{ route('contacts.destroy', ['contact' => $contact->encrypted_id()]) }}')">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- {!! $pagination !!} --}}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
