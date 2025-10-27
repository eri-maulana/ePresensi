@extends('layouts.main')

@section('title', 'Admin — Tambah Mahasiswa')
@section('page-title', 'Tambah Mahasiswa')

@section('content')
  <main class="flex-1 p-6">
        <div class="bg-white p-6 rounded-xl shadow-md max-w-3xl mx-auto">
          <h3 class="text-lg font-semibold text-gray-700 mb-5">
            Form Tambah Mahasiswa
          </h3>

          <form
            class="bg-white p-6 rounded-xl shadow-md border border-gray-100 max-w-2xl mx-auto space-y-5"
          >
            <!-- NIM -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">NIM</label>
              <select
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
              >
                <option value="">-- Pilih NIM Mahasiswa--</option>
                <option value="1">123</option>
                <option value="2">234</option>
                <option value="3">456</option>
              </select>
            </div>

            <!-- Nama -->
            <div>
              <label class="block text-gray-700 font-medium mb-2"
                >Nama Mahasiswa</label
              >
              <input
                disabled type="text"
                placeholder="Kolom ini terisi otomatis"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
              />
            </div>

            <!-- Email -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Email</label>
              <input
                disabled type="email"
                placeholder="Kolom ini terisi otomatis"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
              />
            </div>

            <!-- No HP -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">No. HP</label>
              <input
                disabled type="text"
                placeholder="Kolom ini terisi otomatis"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
              />
            </div>

            <!-- Alamat -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Alamat</label>
              <textarea disabled
                rows="3"
                placeholder="Kolom ini terisi otomatis"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
              ></textarea>
            </div>

            <!-- Kelas -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Kelas</label>
              <select
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
              >
                <option value="">-- Pilih Kelas --</option>
                <option value="1">TI-1A</option>
                <option value="2">TI-1B</option>
                <option value="3">SI-2A</option>
              </select>
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
