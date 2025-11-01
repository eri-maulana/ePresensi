@extends('layouts.main')

@section('title', 'Admin — Tambah Mata Kuliah')
@section('page-title', 'Tambah Mata Kuliah')

@section('content')
      <!-- Content -->
      <main class="flex-1 p-6">
        <div class="bg-white p-6 rounded-xl shadow-md max-w-3xl mx-auto">
          <h3 class="text-lg font-semibold text-gray-700 mb-5">Form Tambah Mata Kuliah</h3>

          <form class="bg-white p-6 rounded-xl shadow-md border border-gray-100 max-w-2xl mx-auto space-y-5">
            <!-- Kode MK -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Kode Mata Kuliah</label>
              <input
                type="text"
                placeholder="Contoh: IF101"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
                maxlength="10"
              />
            </div>

            <!-- Nama MK -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Nama Mata Kuliah</label>
              <input
                type="text"
                placeholder="Contoh: Pemrograman Dasar"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
                maxlength="50"
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
                class="px-6 py-2.5 rounded-lg bg-mint text-white hover:bg-mint/90 transition-colors"
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
  const sidebar = document.getElementById("sidebar");
  const overlay = document.getElementById("overlay");
  const openSidebar = document.getElementById("openSidebar");
  const closeSidebar = document.getElementById("closeSidebar");

  openSidebar.addEventListener("click", () => {
    sidebar.classList.remove("-translate-x-full");
    overlay.classList.remove("hidden");
  });

  closeSidebar.addEventListener("click", () => {
    sidebar.classList.add("-translate-x-full");
    overlay.classList.add("hidden");
  });

  overlay.addEventListener("click", () => {
    sidebar.classList.add("-translate-x-full");
    overlay.classList.add("hidden");
  });
</script>
@endpush