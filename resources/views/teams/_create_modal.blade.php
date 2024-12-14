<x-modal-top-layout layout="{{ isset($layout) ? $layout : null }}">
    <div class="modal-header">
        <h5 class="modal-title" id="generalModalTitle" style="color:">Add New Team</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal_close_button" onclick="showLastBigModal()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{ route('teams.store') }}" method="POST">
            @csrf

            <label> Name <span  style="color:red" >*</span></label>
            <input type="text" placeholder="Enter team name" name="name" class="form-control mb-4" required>

            <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-dark btn-rounded mb-3 mt-3" data-dismiss="modal" onclick="showLastBigModal()">Close</button>
                <button type="submit" class="btn btn-primary btn-rounded mb-3 mt-3">Save</button>
            </div>
        </form>
    </div>
</x-modal-top-layout>
