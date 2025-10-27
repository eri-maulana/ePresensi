@extends('layouts.main')

@section('title', 'Admin — Tambah Kelas')
@section('page-title', 'Tambah Kelas')

@section('content')
  <main class="flex-1 p-6">
        <div class="bg-white p-6 rounded-xl shadow-md max-w-3xl mx-auto">
          <h3 class="text-lg font-semibold text-gray-700 mb-5">Form Tambah Kelas</h3>

          <form class="bg-white p-6 rounded-xl shadow-md border border-gray-100 max-w-2xl mx-auto space-y-5">
            <!-- Nama Kelas -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Nama Kelas</label>
              <input
                type="text"
                placeholder="Contoh: TI-1A"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
              />
            </div>

            <!-- Tahun Ajaran -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Tahun Ajaran</label>
              <input
                type="text"
                placeholder="Contoh: 2025/2026"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
              />
            </div>

            <!-- Tombol -->
            <div class="flex justify-end pt-4">
              <a href="data-jadwal.html" 
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium shadow mr-2">
                Batal
              </a>
              <button
                type="submit"
                class="px-6 py-2.5 rounded-lg bg-accent text-white hover:bg-accent/90 transition-colors"
              >
                Simpan 
              </button>
            </div>
          </form>
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