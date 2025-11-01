@extends('layouts.main')

@section('title', 'Admin — Tambah Jadwal')
@section('page-title', 'Tambah Jadwal')

@section('content')
      <!-- Content -->
      <main class="flex-1 p-6">
        <div class="bg-white p-6 rounded-xl shadow-md max-w-3xl mx-auto">
          <h3 class="text-lg font-semibold text-gray-700 mb-5">Form Tambah Jadwal</h3>

          <form class="bg-white p-6 rounded-xl shadow-md border border-gray-100 max-w-2xl mx-auto space-y-5">
            <!-- Mata Kuliah -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Mata Kuliah</label>
              <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint">
                <option value="">-- Pilih Mata Kuliah --</option>
                <option value="1">Pemrograman Dasar (IF101)</option>
                <option value="2">Basis Data I (DB201)</option>
                <option value="3">Jaringan Komputer (JK301)</option>
              </select>
            </div>

            <!-- Kelas -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Kelas</label>
              <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint">
                <option value="">-- Pilih Kelas --</option>
                <option value="1">TI-1A</option>
                <option value="2">TI-1B</option>
                <option value="3">SI-2A</option>
              </select>
            </div>

            <!-- Dosen -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Dosen</label>
              <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint">
                <option value="">-- Pilih Dosen --</option>
                <option value="1">Dr. Agus (198701)</option>
                <option value="2">Prof. Sari (199102)</option>
                <option value="3">Ir. Budi (198512)</option>
              </select>
            </div>

            <!-- Hari -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Hari</label>
              <select class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint">
                <option value="">-- Pilih Hari --</option>
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
              </select>
            </div>

            <!-- Jam -->
            <div class="grid grid-cols-2 gap-4">
              <div>
                <label class="block text-gray-700 font-medium mb-2">Jam Mulai</label>
                <input
                  type="time"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
                />
              </div>
              <div>
                <label class="block text-gray-700 font-medium mb-2">Jam Selesai</label>
                <input
                  type="time"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
                />
              </div>
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