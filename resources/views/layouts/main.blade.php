<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'ePresensi' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Legacy/mockup stylesheet (overrides Tailwind where needed) -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body class="bg-gray-100 text-gray-800">
    <div class="app" style="max-width:100% !important; margin:0 !important; border-radius:0 !important;">

        {{-- Sidebar --}}
        @if (Auth::user()->role === 'admin')
            @include('partials.sidebar-admin')
        @elseif(Auth::user()->role === 'dosen')
            @include('partials.sidebar-dosen')
        @elseif(Auth::user()->role === 'mahasiswa')
            @include('partials.sidebar-mahasiswa')
        @endif

    {{-- Konten utama --}}
    <!-- overlay for mobile when sidebar is open -->
    <div id="overlay" class="hidden fixed inset-0 bg-black/30 z-40 md:hidden"></div>

    <div class="content md:ml-64 transition-all duration-300">
            @include('partials.navbar')

            <main class="md:p-6 md:pl-0">
                @yield('content')
            </main>
        </div>
    </div>
    @stack('scripts')
</body>

</html>
