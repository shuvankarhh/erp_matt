@if (isset($layout) && $layout == 'true')
    <button type="button" class="btn btn-primary btn-rounded mb-4 mr-2" data-toggle="modal" data-target="#generalModal2"
        id="modal_display_button2" style="display:none;">
        Launch modal
    </button>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-xl" id="generalModal2" tabindex="-1" role="dialog"
        aria-labelledby="generalModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content" id="modal_content2">
@endif
{{ $slot }}

@if (isset($layout) && $layout == 'true')
    </div>
    </div>
    </div>
@endif