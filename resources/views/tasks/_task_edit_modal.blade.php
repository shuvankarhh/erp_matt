<x-modal-top-layout layout="{{ isset($layout) ? $layout : null }}">
    <div class="modal-header" style="background: linear-gradient(90deg, rgba(9,21,127,1) 18%, rgba(0,251,252,1) 62%);">
        <h5 class="modal-title" id="generalModalTitle" style="color:white">Edit Task</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal_close_button" onclick="showLastBigModal()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div id="errors">
            @include('vendor._errors')
        </div>
        <form id="create" action="{{ route('tasks.update',[ 'task' => $task->encrypted_id() ]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label>Name<span  style="color:red" >*</span></label>
            <input type="text" placeholder="Enter name" name="name" value="{{ $task->name ?? null }}" class="form-control mb-2" >

            <div class="row">
                <div class="col">
                    <label>Type<span  style="color:red" >*</span></label>
                    <select name="type" class="form-control mb-2" id="type">
                        @if ( $task->type == 1 )
                            <option value="1" selected >To-do</option>
                        @else
                            <option value="1" >To-do</option>
                        @endif

                        @if ( $task->type == 2)
                            <option value="2" selected>Call</option>
                        @else
                            <option value="2">Call</option>
                        @endif

                        @if ( $task->type == 3)
                            <option value="3" selected>Email</option>
                        @else
                            <option value="3">Email</option>
                        @endif

                    </select>
                </div>
                <div class="col">
                    <label>Priority</label>
                    <select name="priority" class="form-control mb-2" id="priority">

                        @if ( $task->priority == 1 )
                            <option value="1" selected>Low</option>
                        @else
                            <option value="1" >Low</option>
                        @endif
        
                        @if ( $task->priority == 2 )
                            <option value="2" selected>Medium</option>
                        @else
                            <option value="2">Medium</option>
                        @endif
        
                        @if ( $task->priority == 3 )
                            <option value="3" selected>High</option>
                        @else
                            <option value="3">High</option>
                        @endif

                    </select>
                </div>
            </div>

            <label>Assigned To<span  style="color:red" >*</span></label>
            <select name="assigned_to" class="form-control mb-2" id="assigned_to">
                <option value="">Select one</option>
                @foreach ($users as $user)
                
                    @if ($user->id == $task->assigned_to )
                        <option value="{{$user->id}}" selected>{{$user->name}} #{{$user->staff->staff_reference_id }} </option>
                    @else
                        <option value="{{$user->id}}">{{$user->name}} #{{$user->staff->staff_reference_id }} </option>
                    @endif
                    
                @endforeach
            </select>

            <label>Completion status<span  style="color:red" >*</span></label>
            <select name="completion_status" class="form-control mb-2" id="completion_status">
                @if ($task->completion_status == 1)
                    <option value="1" selected>Not Started</option>
                @else
                    <option value="1">Not Started</option>
                @endif

                @if ($task->completion_status == 2)
                    <option value="2" selected>In Progress</option>
                @else
                    <option value="2">In Progress</option>
                @endif

                @if ($task->completion_status == 3)
                    <option value="3" selected>On Hold</option>
                @else
                    <option value="3">On Hold</option>
                @endif

                @if ($task->completion_status == 4)
                    <option value="4" selected>Canceled</option>
                @else
                    <option value="4">Canceled</option>
                @endif

                @if ($task->completion_status == 5)
                    <option value="5"  selected>Finished</option>
                @else
                    <option value="5">Finished</option>
                @endif
            </select>

            <div class="row">
                <div class="col">
                    <label>Start Date<span  style="color:red" >*</span></label>
                    <input type="date" name="start_date" class="form-control mb-2" value="{{ \Carbon\Carbon::parse($task->start_date)->format('Y-m-d') }}">
                </div>
                <div class="col">
                    <label>End Date<span  style="color:red" >*</span></label>
                    <input type="date" name="due_date" class="form-control mb-2" value="{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}">
                </div>
            </div>
             <label>User Timezone<span  style="color:red" >*</span></label>
            <select name="user_timezone_id" class="form-control mb-2" id="user_timezone_id " required>
                <option value="" >Select one</option>
                @foreach ($timezones as $timezone)
                    @if ($timezone->id == $task->user_timezone_id)
                        <option value="{{$timezone->id}}" selected>{{$timezone->name}}</option>
                    @else
                        <option value="{{$timezone->id}}" selected>{{$timezone->name}}</option>
                    @endif
                @endforeach
            </select>

            <label>Description<span  style="color:red" >*</span></label>
            <textarea name="description" class="form-control mb-2" id="" cols="30" rows="1">{{$task->description ?? null}}</textarea>

            <label >Contacts <span  style="color:red" >*</span></label>
            <select class="contact_id form-control mb-2" name="contact_id[]" style="width: 100% !important;" multiple>
                @foreach($contactIds as $contact)
                    <option value="{{ $contact->contact->id }}"  selected>
                        {{ $contact->contact->name }}
                    </option>
                @endforeach
                
            </select>
            <label class="mt-2">Organization <span  style="color:red" >*</span></label>
            <select class="organization_id form-control mb-2" style="width: 100% !important;" name="organization_id[]" multiple>
                @foreach ($organizationIds as $organization)
                    <option value="{{ $organization->organization->id }}"  selected>
                        {{ $organization->organization->name }}
                    </option>
                @endforeach
            </select>

            <label class="mt-2">Sales <span  style="color:red" >*</span></label>
            <select class="sales_id form-control mb-2" style="width: 100% !important;" name="sales_id[]" multiple>
                @foreach ($saleIds as $sale)
                    <option value="{{ $sale->sale->id }}"  selected>
                        {{ $sale->sale->name }}
                    </option>
                @endforeach
            </select>

            <label class="mt-2">Ticket <span  style="color:red" >*</span></label>
            <select class="tickets_id form-control mb-2" style="width: 100% !important;" name="tickets_id[]" multiple>
                @foreach ($ticketIds as $ticket)
                    <option value="{{ $ticket->ticket->id }}"  selected>
                        {{ $ticket->ticket->name }}
                    </option>
                @endforeach
        
            </select>

            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-dark btn-rounded mb-1 mt-2" data-dismiss="modal" onclick="showLastBigModal()">Close</button>
                <button type="submit" class="btn btn-primary btn-rounded mb-1 mt-2">Save</button>
            </div>
            
        </form>
    </div>

    <script>

    </script>
</x-modal-top-layout>