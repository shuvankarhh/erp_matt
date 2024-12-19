<x-modal-top-layout layout="{{ isset($layout) ? $layout : null }}">
    <div class="modal-header">
        <h5 class="modal-title" id="generalModalTitle" style="color:">Ticket Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal_close_button" onclick="showLastBigModal()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    
    <div class="modal-body">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                <label> Name </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                <span>: {{ $ticket->name}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                <label> pipeline </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                <span>: {{ $ticket->trashed_support_pipeline->name}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                <label> Pipeline Stage </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                <span>: {{ $ticket->trashed_support_pipeline_stage->name}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                <label> source </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                <span>: {{ $ticket->trashed_ticket_source->name}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                <label> Owner </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                <span>: {{ $ticket->trashed_staff->name ?? null}}</span>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                <label> Priority </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                
                    @if ( $ticket->priority == 1 )
                        :<span class="btn btn-success">Low</span>
                    @elseif($ticket->priority == 2 )
                        :<span class="btn btn-warning">Medium</span>
                    @elseif($ticket->priority == 3 )
                        : <span class="btn btn-danger btn-rounded mr-2">High</span>
                    @endif
                
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                <label> contacts </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
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
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                <label> organization </label>
            </div>
            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 mb-4">
                : <span>{{ $org->organization->name }}</span>
            </div>
        </div>

    </div>
</x-modal-top-layout>