<!DOCTYPE html>
<html lang="en" data-sidenav-view="{{ $sidenav ?? 'default' }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.shared/title-meta', ['title' => $title])
    @yield('css')
    @include('layouts.shared/head-css')

    <!-- Notyf CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    {{-- jQuery CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Select2 CSS CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

    {{-- Select2 JS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
</head>

<body>

    <div class="flex wrapper">

        @include('layouts.shared/sidebar')

        <div class="page-content">

            @include('layouts.shared/topbar')

            <main class="flex-grow p-6">

                @include('layouts.shared/page-title', [
                    'title' => $title,
                    'sub_title' => $sub_title,
                ])

                @yield('content')

                {{-- Modal --}}
                <div x-data @keydown.escape.window="$store.modal.open = false" x-show="$store.modal.open"
                    x-transition.opacity
                    class="fixed inset-0 bg-gray-500 bg-opacity-50 flex justify-center items-center z-50"
                    @open-modal.window="document.body.classList.add('modal-open')"
                    @close-modal.window="document.body.classList.remove('modal-open')">

                    <div @click.stop
                        class="bg-white rounded-lg shadow-lg w-full max-w-lg max-h-[90vh] overflow-hidden flex flex-col"
                        style="overscroll-behavior: contain; -ms-overflow-style: none; scrollbar-width: none;">

                        <div id="modalContent" class="p-4 flex-1 overflow-y-auto">

                        </div>
                    </div>
                </div>
            </main>

            @include('layouts.shared/footer')

        </div>

    </div>

    @include('layouts.shared/customizer')

    @include('layouts.shared/footer-scripts')

    @vite('resources/js/app.js')

    {{-- alpinejs cdn --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('modal', {
                open: false
            });
        });
    </script>

    <!-- Notyf JS -->
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    @if (session('success_message'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const notyf = new Notyf({
                    position: {
                        x: 'right',
                        y: 'top'
                    },
                    duration: 5000,
                    dismissible: false
                });

                window.notyf = notyf;

                notyf.success("{{ session('success_message') }}");

                @php
                    session()->forget('success_message');
                @endphp
            });
        </script>
    @endif

    @if (session('error_message'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const notyf = new Notyf({
                    position: {
                        x: 'right',
                        y: 'top'
                    },
                    duration: 5000,
                    dismissible: false
                });

                window.notyf = notyf;

                notyf.error("{{ session('error_message') }}");

                @php
                    session()->forget('error_message');
                @endphp
            });
        </script>
    @endif
</body>

</html>
