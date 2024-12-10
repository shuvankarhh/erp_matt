@if (isset($layout) && $layout == 'true')
    <button type="button" class="btn btn-primary btn-rounded mb-4 mr-2" data-toggle="modal" data-target="#generalModal" id="modal_display_button" style="display:none;">
        Launch modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="generalModal" tabindex="-1" role="dialog" aria-labelledby="generalModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="modal_content">
    @endif
                {{ $slot }}

    @if (isset($layout) && $layout == 'true')
            </div>
        </div>
    </div>
@endif