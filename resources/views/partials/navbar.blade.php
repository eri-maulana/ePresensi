<header class="flex items-center justify-between bg-white px-4 py-3 shadow-sm">
  <div class="flex items-center space-x-3">
    <button id="openSidebar" class="md:hidden text-gray-600 text-2xl">☰</button>
    <h2 class="text-lg font-semibold text-gray-700">@yield('page-title', 'Dashboard')</h2>
  </div>
  <div class="text-gray-600 font-medium">👤 {{ Auth::user()->name ?? 'Admin' }}</div>
</header>
