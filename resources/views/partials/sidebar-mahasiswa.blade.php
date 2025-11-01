<aside id="sidebar"
    class="fixed top-0 left-0 w-64 h-full bg-white border-r shadow-lg transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out z-50">
    

    <nav class="nav p-4 space-y-2">
        <a href="{{ route('mahasiswa.dashboard') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('mahasiswa.dashboard') ? 'bg-mint text-gray-800 font-semibold' : '' }}">
            🏠 Dashboard
        </a>

        <a href="{{ route('mahasiswa.presensi') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('mahasiswa.presensi') ? 'bg-mint text-gray-800 font-semibold' : '' }}">
            🕒 Presensi
        </a>

        <a href="{{ route('mahasiswa.riwayat-presensi') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('mahasiswa.riwayat-presensi') ? 'bg-mint text-gray-800 font-semibold' : '' }}">
            📜 Riwayat Presensi
        </a>

        <a href="{{ route('mahasiswa.profil-mahasiswa') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('mahasiswa.profil-mahasiswa') ? 'bg-mint text-gray-800 font-semibold' : '' }}">
            👤 Profil
        </a>
    </nav>
</aside>
