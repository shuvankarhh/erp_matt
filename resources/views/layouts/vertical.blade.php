<!DOCTYPE html>
<html lang="en" data-sidenav-view="{{ $sidenav ?? 'default' }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.shared/title-meta', ['title' => $title])
    @yield('css')
    @include('layouts.shared/head-css')
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

    @vite(['resources/js/app.js'])
    <script src="{{ asset('build/assets/app.js') }}" defer></script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('modal', {
                open: false
            });
        });
    </script>

</body>


</html>
