<x-modal-top-layout layout="{{ isset($layout) ? $layout : null }}">
    <div class="modal-header">
        <h5 class="modal-title" id="generalModalTitle" style="color:">Add New Support Pipeline</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal_close_button" onclick="showLastBigModal()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div id="errors">
            @include('vendor._errors')
        </div>
        <form id="create" action="{{ route('tickets.update',[ 'ticket' => $ticket->encrypted_id() ]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label>Name<span  style="color:red" >*</span></label>
            <input type="text" placeholder="Enter name" name="name" value="{{ $ticket->name }}" class="form-control mb-4" >

            <label>Pipeline<span  style="color:red" >*</span></label>
            <select name="pipeline_id" class="form-control mb-4" id="pipeline_id">
                <option value="" >Select one</option>
                @foreach ($support_pipelines as $support_pipeline)
                    @if ( $ticket->pipeline_id == $support_pipeline->id )
                        <option value="{{$support_pipeline->id}}" selected>{{$support_pipeline->name}}</option>
                    @else
                        <option value="{{$support_pipeline->id}}">{{$support_pipeline->name}}</option>
                    @endif
                    
                @endforeach
            </select>

            <label>Pipeline Stage<span  style="color:red" >*</span></label>
            <select name="pipeline_stage_id" class="form-control mb-4" id="pipeline_stage_id">
                <option value="">Select one</option>
                @foreach ($support_pipeline_stages as $support_pipeline_stage)

                    @if ( $ticket->pipeline_stage_id == $support_pipeline_stage->id )
                        <option value="{{$support_pipeline_stage->id}}" selected>{{$support_pipeline_stage->name}}</option>
                    @else
                        <option value="{{$support_pipeline_stage->id}}">{{$support_pipeline_stage->name}}</option>
                    @endif
                    
                @endforeach
            </select>

            <label>Description<span  style="color:red" >*</span></label>
            <textarea name="description"  class="form-control mb-4" id="" cols="30" rows="1"> {{$ticket->description ?? ""}} </textarea>

            <label>Source<span  style="color:red" >*</span></label>
            <select name="source_id" class="form-control mb-4" id="source_id ">
                <option value="">Select one</option>
                @foreach ($ticket_sources as $ticket_source)
                    @if ( $ticket->source_id == $ticket_source->id )
                        <option value="{{$ticket_source->id}}" selected>{{$ticket_source->name}}</option>
                    @else
                        <option value="{{$ticket_source->id}}">{{$ticket_source->name}}</option>
                    @endif
                @endforeach
            </select>

            <label>Owner<span  style="color:red" >*</span></label>
            <select name="owner_id" class="form-control mb-4" id="owner ">
                <option value="">Select one</option>
                
                @foreach ($staffs as $staff)
                    @if ( $ticket->owner == $staff->id )
                        <option value="{{$staff->id}}" selected>{{$staff->name}}</option>
                    @else
                        <option value="{{$staff->id}}">{{$staff->name}}</option>
                    @endif
                @endforeach
            </select>

            <label>priority</label>
            <select name="priority" class="form-control mb-4" id="priority ">
                <option value="">Select one</option>
                @if ( $ticket->priority == 1 )
                    <option value="1" selected>Low</option>
                @else
                    <option value="1" >Low</option>
                @endif

                @if ( $ticket->priority == 2 )
                    <option value="2" selected>Medium</option>
                @else
                    <option value="2">Medium</option>
                @endif

                @if ( $ticket->priority == 3 )
                    <option value="3" selected>High</option>
                @else
                    <option value="3">High</option>
                @endif
            </select>

            <label>Contacts <span  style="color:red" >*</span></label>
            <select class="contact_id form-control" name="contact_id[]" style="width: 100% !important;" multiple>
                @foreach($contactIds as $contact)
                    <option value="{{ $contact->contact->id }}"  selected>
                        {{ $contact->contact->name }}
                    </option>
                @endforeach
            </select>
            
            <label>Organization <span  style="color:red" >*</span></label>
            <select class="organization_id form-control" style="width: 100% !important;" name="organization_id[]" multiple>
                @foreach ($organizations as $organization)
                    <option value="{{ $organization->id }}"
                        {{ in_array($organization->id, $org->pluck('organization_id')->toArray()) ? 'selected' : '' }}>
                        {{ $organization->name}}
                    </option>
                @endforeach
            </select>

            <label>Sales <span  style="color:red" >*</span></label>
            <select class="sales_id form-control" style="width: 100% !important;" name="sales_id[]" multiple>
                @foreach ($saleIds as $sale)
                    <option value="{{ $sale->sale->id }}" selected>
                        {{ $sale->sale->name}}
                    </option>
                @endforeach
            </select>

            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-dark btn-rounded mb-3 mt-3" data-dismiss="modal" onclick="showLastBigModal()">Close</button>
                <button type="submit" class="btn btn-primary btn-rounded mb-3 mt-3">Save</button>
            </div>
        </form>
    </div>

    <script>

    </script>
</x-modal-top-layout>