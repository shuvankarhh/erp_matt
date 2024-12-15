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

                <div id="myModal" x-data="{ open: false }" x-show="open" x-transition @open-modal.window="open = true"
                    class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
                    <div class="bg-white rounded-lg shadow-xl w-1/2">
                        <div id="modalContent">
                            <!-- Dynamic content will be appended here -->
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
