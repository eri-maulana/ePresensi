<aside id="sidebar"
    class="fixed top-0 left-0 w-64 h-full bg-white border-r shadow-lg transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out z-50">
    

    <nav class="nav p-4 space-y-2">
        <a href="{{ route('dosen.dashboard') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('dosen.dashboard') ? 'bg-mint text-gray-800 font-semibold' : '' }}">
            🏠 Dashboard
        </a>

        <a href="{{ route('dosen.jadwal-mengajar') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('dosen.jadwal-mengajar') ? 'bg-mint text-gray-800 font-semibold' : '' }}">
            🗓️ Jadwal Mengajar
        </a>

        <a href="{{ route('dosen.daftar-mahasiswa') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('dosen.daftar-mahasiswa') ? 'bg-mint text-gray-800 font-semibold' : '' }}">
            🎓 Daftar Mahasiswa
        </a>

        <a href="{{ route('dosen.rekap-presensi') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('dosen.rekap-presensi') ? 'bg-mint text-gray-800 font-semibold' : '' }}">
            📊 Rekap Presensi
        </a>

        <a href="{{ route('dosen.profil-dosen') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('dosen.profil-dosen') ? 'bg-mint text-gray-800 font-semibold' : '' }}">
            👤 Profil
        </a>
    </nav>
</aside>
