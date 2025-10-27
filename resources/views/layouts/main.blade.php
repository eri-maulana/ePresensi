<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - ePresensi</title>
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-50 flex">

    {{-- Sidebar --}}
    @include('partials.sidebar')

    <div class="flex-1 flex flex-col">
        {{-- Navbar --}}
        @include('partials.navbar')

        {{-- Main Content --}}
        <main class="p-6">
            @yield('content')
        </main>

        {{-- Footer --}}
        @include('partials.footer')
    </div>

    <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>
