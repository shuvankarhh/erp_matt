<x-modal-top-layout layout="{{ isset($layout) ? $layout : null }}">
    <div class="modal-header">
        <h5 class="modal-title" id="generalModalTitle" style="color:">Add / Edit Organization </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal_close_button" onclick="showLastBigModal()">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{ route('update_organization', $customer->encrypted_id()) }}" method="POST">
            @csrf
            <label>Organization<span  style="color:red" >*</span></label>
            <select class="form-control" name="organization_id">
                <option value="" {{ !$customer->organization ? 'selected' : '' }}> Select
                    An Organization </option>
                @foreach ($organizations as $organization)
                    <option value="{{ $organization->id }}"
                        {{ $customer->organization && $organization->id == $customer->organization->id ? 'selected' : '' }}>
                        {{ $organization->name }}
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