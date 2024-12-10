@if (isset($layout) && $layout == 'true')
    <button type="button" class="btn btn-primary btn-rounded mb-4 mr-2" data-toggle="modal" data-target="#generalModal1" id="modal_display_Top" style="display:none;">
        Launch modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="generalModal1" tabindex="-1" role="dialog" aria-labelledby="generalModalTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="generalModalTop">
    @endif
                {{ $slot }}

    @if (isset($layout) && $layout == 'true')
            </div>
        </div>
    </div>
@endif