<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ePresensi')</title>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#D8F3DC',
                        accent: '#40916C',
                        sidebar: '#E9F7EF',
                        textdark: '#1B4332'
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif']
                    }
                }
            }
        }
    </script>
    {{-- Tailwind / CSS --}}
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans bg-[#F8FCFA] text-gray-800">
    {{-- Sidebar --}}
    @include('partials.sidebar')

    {{-- Overlay for mobile --}}
    <div id="overlay" class="fixed inset-0 bg-black opacity-30 hidden z-40"></div>

    {{-- Main Content --}}
    <div class="md:ml-64 min-h-screen flex flex-col">
        {{-- Navbar --}}
        @include('partials.navbar')

        {{-- Content --}}
        <main class="flex-1 p-6">
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('partials.footer')
    </div>

    {{-- Script --}}
    <script src="{{ asset('assets/js/app.js') }}" defer></script>

    @stack('scripts')
</body>

</html>
