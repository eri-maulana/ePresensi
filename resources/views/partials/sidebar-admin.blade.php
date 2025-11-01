<aside id="sidebar"
    class="fixed top-0 left-0 w-64 h-full bg-white border-r shadow-lg transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out z-50">
    

    <nav class="nav p-4 space-y-2">
        <a href="{{ route('admin.dashboard') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('admin.dashboard') ? 'bg-mint font-semibold' : '' }}">🏠
            Dashboard</a>
        <a href="{{ route('admin.data-kampus') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('admin.data-kampus') ? 'bg-mint font-semibold' : '' }}">🏫
            Data Kampus</a>
        <a href="{{ route('admin.data-mahasiswa') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('admin.data-mahasiswa') ? 'bg-mint font-semibold' : '' }}">🎓
            Data Mahasiswa</a>
        <a href="{{ route('admin.data-dosen') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('admin.data-dosen') ? 'bg-mint font-semibold' : '' }}">👨‍🏫
            Data Dosen</a>
        <a href="{{ route('admin.data-mata-kuliah') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('admin.data-mata-kuliah') ? 'bg-mint font-semibold' : '' }}">📘
            Data Mata Kuliah</a>
        <a href="{{ route('admin.data-kelas') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('admin.data-kelas') ? 'bg-mint font-semibold' : '' }}">🏷️
            Data Kelas</a>
        <a href="{{ route('admin.data-jadwal') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('admin.data-jadwal') ? 'bg-mint font-semibold' : '' }}">🗓️
            Data Jadwal</a>
        <a href="{{ route('admin.data-pengguna') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('admin.data-pengguna') ? 'bg-mint font-semibold' : '' }}">👥
            Data User</a>
        <a href="{{ route('admin.rekap-presensi') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('admin.rekap-presensi') ? 'bg-mint font-semibold' : '' }}">📊
            Rekap Presensi</a>
        <a href="{{ route('admin.profil') }}"
            class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700 {{ request()->routeIs('admin.profil') ? 'bg-mint font-semibold' : '' }}">📊
            Profil</a>
    </nav>
</aside>
