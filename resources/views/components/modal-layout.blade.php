{{-- @if (isset($layout) && $layout == 'true')
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
@endif --}}

@if (isset($layout) && $layout == 'true')
    <div class="modal fade" tabindex="-1" id="generalModal">
        <div class="modal-dialog">
            <div class="modal-content" id="modal_content">
@endif

{{ $slot }}

@if (isset($layout) && $layout == 'true')
            </div>
        </div>
    </div>
@endif

{{-- @if (isset($layout) && $layout == 'true')
    <div x-data="{ isOpen: false }" x-init="$watch('isOpen', value => console.log('Modal open state:', value))" @keydown.escape.window="isOpen = false" x-show="isOpen"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" style="display: none;">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
            <!-- Modal Header -->
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-semibold">Modal Title</h2>
                <button @click="isOpen = false" class="text-gray-400 hover:text-gray-600">
                    &times;
                </button>
            </div>

            <!-- Modal Body -->
            <div>
                {{ $slot }}
            </div>
        </div>
    </div>
@endif --}}

<!-- resources/views/components/modal-layout.blade.php -->
{{-- <div x-data="{ isOpen: false }" @open-modal.window="isOpen = true" @close-modal.window="isOpen = false" x-show="isOpen"
    class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50" style="display: none;">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg p-6">
        <div class="modal-header">
            <h5 class="modal-title">Add Tag</h5>
            <button @click="$dispatch('close-modal')" class="close">&times;</button>
        </div>
        <div class="modal-body">
            <div id="modalContent">
                <!-- Dynamic content will be loaded here -->
            </div>
        </div>
        <div class="modal-footer">
            <button @click="$dispatch('close-modal')" class="btn btn-secondary">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </div>
</div> --}}
