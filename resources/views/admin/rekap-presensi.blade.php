@extends('layouts.main')

@section('title', 'Admin — Rekap Presensi')
@section('page-title', 'Rekap Presensi')

@section('content')
  <main class="flex-1 p-6">
        <div class="max-w-6xl mx-auto">
          <div class="flex items-center justify-between mb-6">
            <div class="space-x-2">
              <a href="#" class="inline-flex items-center gap-2 bg-mint hover:bg-mint-dark text-gray-800 px-3 py-2 rounded-lg font-medium shadow">Export Excel</a>
            </div>
          </div>

          <!-- Filter card -->
          <div class="bg-white p-6 rounded-xl shadow-md mb-6">
            <h3 class="text-lg font-semibold text-gray-700">Filter</h3>
            <form class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
              <div>
                <label class="block text-sm text-gray-600 mb-1">Tanggal Mulai</label>
                <input type="date" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-mint" />
              </div>
              <div>
                <label class="block text-sm text-gray-600 mb-1">Tanggal Akhir</label>
                <input type="date" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-mint" />
              </div>
              <div class="flex gap-2">
                <button type="submit" class="bg-mint hover:bg-mint-dark text-gray-800 px-4 py-2 rounded-lg font-medium shadow">Terapkan</button>
                <a href="#" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg font-medium">Reset</a>
              </div>
            </form>
          </div>

          <!-- Results table -->
          <div class="bg-white rounded-xl shadow overflow-hidden border">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-mint-light">
                <tr>
                  <th class="p-3 text-left font-semibold text-gray-700">Tanggal</th>
                  <th class="p-3 text-left font-semibold text-gray-700">Jumlah Hadir</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                <tr class="hover:bg-gray-50">
                  <td class="p-3">2025-10-25</td>
                  <td class="p-3">120</td>
                </tr>
                <tr class="hover:bg-gray-50">
                  <td class="p-3">2025-10-24</td>
                  <td class="p-3">110</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
  </main>
@endsection

@push('scripts')
<script>
  // Sidebar toggle (layout-provided elements)
  (function () {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const openSidebar = document.getElementById('openSidebar');
    const closeSidebar = document.getElementById('closeSidebar');

    if (openSidebar) {
      openSidebar.addEventListener("click", () => {
        sidebar.classList.remove("-translate-x-full");
        overlay.classList.remove("hidden");
      });
    }

    [overlay, closeSidebar].forEach(el => {
      if (!el) return;
      el.addEventListener("click", () => {
        sidebar.classList.add("-translate-x-full");
        overlay.classList.add("hidden");
      });
    });
  })();
</script>
@endpush
