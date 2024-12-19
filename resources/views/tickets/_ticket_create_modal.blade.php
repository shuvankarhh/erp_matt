<x-modal-top-layout layout="{{ isset($layout) ? $layout : null }}">
    <div class="modal-header">
        <h5 class="modal-title" id="generalModalTitle" style="color:">Create New Ticket</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal_close_button" onclick="showLastBigModal()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div id="errors">
            @include('vendor._errors')
        </div>
        <form id="create" action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Name<span  style="color:red" >*</span></label>
            <input type="text" placeholder="Enter name" name="name" class="form-control mb-2" >

            <label>Pipeline<span  style="color:red" >*</span></label>
            <select name="pipeline_id" class="form-control mb-2" id="pipeline_id">
                <option value="" >Select one</option>
                @foreach ($support_pipelines as $support_pipeline)
                    <option value="{{$support_pipeline->id}}">{{$support_pipeline->name}}</option>
                @endforeach
            </select>

            <label>Pipeline Stage<span  style="color:red" >*</span></label>
            <select name="pipeline_stage_id" class="form-control mb-2" id="pipeline_stage_id">
                <option value="">Select one</option>
                @foreach ($support_pipeline_stages as $support_pipeline_stage)
                    <option value="{{$support_pipeline_stage->id}}">{{$support_pipeline_stage->name}}</option>
                @endforeach
            </select>

            <label>Description<span  style="color:red" >*</span></label>
            <textarea name="description" class="form-control mb-2" id="" cols="30" rows="1"></textarea>

            <label>Source<span  style="color:red" >*</span></label>
            <select name="source_id" class="form-control mb-2" id="source_id ">
                <option value="">Select one</option>
                @foreach ($ticket_sources as $ticket_source)
                    <option value="{{$ticket_source->id}}">{{$ticket_source->name}}</option>
                @endforeach
            </select>

            <label>Owner<span  style="color:red" >*</span></label>
            <select name="owner_id" class="form-control mb-2" id="owner ">
                <option value="">Select one</option>
                @foreach ($staffs as $staff)
                    <option value="{{$staff->id}}">{{$staff->name}}</option>
                @endforeach
            </select>

            <label>priority</label>
            <select name="priority" class="form-control mb-2" id="priority ">
                <option value="">Select one</option>
                <option value="1">Low</option>
                <option value="2">Medium</option>
                <option value="3">High</option>
            </select>

            <label>Contacts <span  style="color:red" >*</span></label>
            <select class="contact_id form-control" name="contact_id[]" style="width: 100% !important;" multiple></select>

            <label>Organization <span  style="color:red" >*</span></label>
            <select class="organization_id form-control" style="width: 100% !important;" name="organization_id[]" multiple></select>

            <label>Sales <span  style="color:red" >*</span></label>
            <select class="sales_id form-control" style="width: 100% !important;" name="sales_id[]" multiple></select>
            
            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-dark btn-rounded mb-3 mt-3" data-dismiss="modal" onclick="showLastBigModal()">Close</button>
                <button type="submit" class="btn btn-primary btn-rounded mb-3 mt-3">Save</button>
            </div>
        </form>
    </div>

    <script>

    </script>
</x-modal-top-layout>