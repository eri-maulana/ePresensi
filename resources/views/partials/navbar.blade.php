<header class="header bg-white flex items-center justify-between px-4 py-2">
    <div class="h-left flex items-center gap-3">
        <button id="openSidebar" class="toggle-btn md:hidden text-gray-600 text-2xl">☰</button>
        <h2 class="title text-lg font-semibold">ePresensi</h2>
    </div>

    <div class="header-right flex items-center gap-4 text-gray-600 font-medium">
        <div class="py-1 flex items-center gap-2"> 
            <span class="hidden md:inline">👤</span>
            <span>{{ Auth::user()->name ?? 'User' }}</span>
        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-gray-500 text-white px-3 py-1 rounded-md hover:bg-gray-50 hover:text-black hover:border-red-600">
                Logout
            </button>
        </form>
    </div>

</header>
