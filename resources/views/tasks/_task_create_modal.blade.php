<x-modal-top-layout layout="{{ isset($layout) ? $layout : null }}">
    <div class="modal-header" style="background: linear-gradient(90deg, rgba(9,21,127,1) 18%, rgba(0,251,252,1) 62%);">
        <h5 class="modal-title" id="generalModalTitle" style="color:white">Create New Tasks</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal_close_button" onclick="showLastBigModal()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div id="errors">
            @include('vendor._errors')
        </div>
        <form id="create" action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>Name<span  style="color:red" >*</span></label>
            <input type="text" placeholder="Enter name" name="name" class="form-control mb-2" >

            <div class="row">
                <div class="col">
                    <label>Type<span  style="color:red" >*</span></label>
                    <select name="type" class="form-control mb-2" id="type">
                        <option value="1" >To-do</option>
                        <option value="2">Call</option>
                        <option value="3">Email</option>
                    </select>
                </div>
                <div class="col">
                    <label>Priority</label>
                    <select name="priority" class="form-control mb-2" id="priority">
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">High</option>
                    </select>
                </div>
            </div>

            <label>Assigned To<span  style="color:red" >*</span></label>
            <select name="assigned_to" class="form-control mb-2" id="assigned_to">
                <option value="">Select one</option>
                @foreach ($users as $user)
                    <option value="{{$user->id}}">{{$user->name}} #{{$user->staff->staff_reference_id ?? null}} </option>
                @endforeach
            </select>

            <label>Completion status<span  style="color:red" >*</span></label>
            <select name="completion_status" class="form-control mb-2" id="completion_status">
                <option value="1">Not Started</option>
                <option value="2">In Progress</option>
                <option value="3">On Hold</option>
                <option value="4">Canceled</option>
                <option value="5">Finished</option>
            </select>

            <div class="row">
                <div class="col">
                    <label>Start Date<span  style="color:red" >*</span></label>
                    <input type="Date" name="start_date" class="form-control mb-2" >
                </div>
                <div class="col">
                    <label>End Date<span  style="color:red" >*</span></label>
                    <input type="Date" name="end_date" class="form-control mb-2">
                </div>
            </div>
             <label>User Timezone<span  style="color:red" >*</span></label>
            <select name="user_timezone_id" class="form-control mb-2" id="user_timezone_id " required>
                <option value="" >Select one</option>
                @foreach ($timezones as $timezone)
                    <option value="{{$timezone->id}}">{{$timezone->name}}</option>
                @endforeach
            </select>

            <label>Description<span  style="color:red" >*</span></label>
            <textarea name="description" class="form-control mb-2" id="" cols="30" rows="1"></textarea>

            <label >Contacts <span  style="color:red" >*</span></label>
            <select class="contact_id form-control mb-2" name="contact_id[]" style="width: 100% !important;" multiple></select>
            <label class="mt-2">Organization <span  style="color:red" >*</span></label>
            <select class="organization_id form-control mb-2" style="width: 100% !important;" name="organization_id[]" multiple></select>

            <label class="mt-2">Sales <span  style="color:red" >*</span></label>
            <select class="sales_id form-control mb-2" style="width: 100% !important;" name="sales_id[]" multiple></select>

            <label class="mt-2">Ticket <span  style="color:red" >*</span></label>
            <select class="tickets_id form-control mb-2" style="width: 100% !important;" name="tickets_id[]" multiple></select>

            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-dark btn-rounded mb-1 mt-2" data-dismiss="modal" onclick="showLastBigModal()">Close</button>
                <button type="submit" class="btn btn-primary btn-rounded mb-1 mt-2">Save</button>
            </div>
            
        </form>
    </div>

    <script>

    </script>
</x-modal-top-layout>