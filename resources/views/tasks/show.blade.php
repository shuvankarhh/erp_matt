<x-modal-top-layout layout="{{ isset($layout) ? $layout : null }}">
    <div class="modal-header">
        <h5 class="modal-title" id="generalModalTitle" style="color:">Ticket Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal_close_button" onclick="showLastBigModal()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
    <div class="modal-body">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label> Name </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                : {{$task->name}}
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label> Type </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                :   @if ( $task->type == 1 )
                        <span >To-do</span>
                    @endif

                    @if ( $task->type == 2)
                        <span >Call</span>
                    @endif

                    @if ( $task->type == 3)
                        <span >Email</span>
                    @endif
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label> Priority </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                : 
                @if ( $task->priority == 1 )
                    <span class="btn btn-success">Low</option>
                @endif

                @if ( $task->priority == 2 )
                    <span class="btn btn-warning">Medium</option>
                @endif

                @if ( $task->priority == 3 )
                    <span class="btn btn-danger">High</option>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label> Assigned To </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                : {{$task->user->name}}
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label> Completion Status </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                :   @if ($task->completion_status == 1)
                        <span >Not Started</span>
                    @endif

                    @if ($task->completion_status == 2)
                        <span >In Progress</span>
                    @endif

                    @if ($task->completion_status == 3)
                        <span >On Hold</span>
                    @endif

                    @if ($task->completion_status == 4)
                        <span >Canceled</span>
                    @endif

                    @if ($task->completion_status == 5)
                        <span >Finished</span>
                    @endif

                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label> Start Date </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                : {{\Carbon\Carbon::parse($task->start_date)->format('d-M-Y')}}
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label> Due Date </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                : {{\Carbon\Carbon::parse($task->due_date)->format('d-M-Y')}}
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label> User Timezone </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                : {{$task->user_timezone->name}}
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label> Description </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                : {{$task->description}}
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label> Contacts </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                :
                    @foreach ($contactIds as $key => $contact)
                        @if ($key == 0)
                            <span>{{$contact->contact->name}}</span><br>
                        @else
                            <span>&nbsp;&nbsp;{{$contact->contact->name}}</span><br>
                        @endif
                    @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label> Organization </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                : <span>{{ $organization->organization->name }}</span>
            </div>
        </div>

        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label> Sale </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                : <span>{{ $saleIds->sale->name }}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                <label> Ticket </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-2">
                : <span>{{ $ticketIds->ticket->name }}</span>
            </div>
        </div>
        

    </div>
</x-modal-top-layout>