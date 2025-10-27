@extends('layouts.main')

@section('title', 'Admin — Tambah Kampus')
@section('page-title', 'Tambah Kampus')

@section('content')
  <main class="flex-1 p-6">
      <div class="bg-white p-6 rounded-xl shadow-md max-w-3xl mx-auto">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Form Tambah Kampus</h3>
        <form action="data-kampus.html" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Nama Kampus -->
          <div class="col-span-2">
            <label class="block text-gray-600 font-medium mb-1">Nama Kampus</label>
            <input type="text" placeholder="Masukkan nama kampus"
              class="w-full border rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-mint-dark" required />
          </div>

          <!-- Alamat -->
          <div class="col-span-2">
            <label class="block text-gray-600 font-medium mb-1">Alamat</label>
            <textarea placeholder="Masukkan alamat kampus"
              class="w-full border rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-mint-dark" rows="3" required></textarea>
          </div>

          <!-- Latitude -->
          <div>
            <label class="block text-gray-600 font-medium mb-1">Latitude</label>
            <input type="number" step="0.0000001" placeholder="-6.1234567"
              class="w-full border rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-mint-dark" required />
          </div>

          <!-- Longitude -->
          <div>
            <label class="block text-gray-600 font-medium mb-1">Longitude</label>
            <input type="number" step="0.0000001" placeholder="107.1234567"
              class="w-full border rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-mint-dark" required />
          </div>

          <!-- Radius -->
          <div>
            <label class="block text-gray-600 font-medium mb-1">Radius (meter)</label>
            <input type="number" placeholder="300"
              class="w-full border rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-mint-dark" required />
          </div>

          <!-- Telepon -->
          <div>
            <label class="block text-gray-600 font-medium mb-1">Telepon</label>
            <input type="text" placeholder="08xxxxxx"
              class="w-full border rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-mint-dark" />
          </div>

          <!-- Email -->
          <div>
            <label class="block text-gray-600 font-medium mb-1">Email</label>
            <input type="email" placeholder="info@kampus.ac.id"
              class="w-full border rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-mint-dark" />
          </div>

          <!-- Website -->
          <div>
            <label class="block text-gray-600 font-medium mb-1">Website</label>
            <input type="url" placeholder="https://kampus.ac.id"
              class="w-full border rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-mint-dark" />
          </div>

          <!-- Tombol -->
          <div class="col-span-2 flex justify-end  pt-4">
              <a href="data-kampus.html" 
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
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('overlay');
  const openSidebar = document.getElementById('openSidebar');
  const closeSidebar = document.getElementById('closeSidebar');

  openSidebar.addEventListener('click', () => {
    sidebar.classList.remove('-translate-x-full');
    overlay.classList.remove('hidden');
  });

  closeSidebar.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
    overlay.classList.add('hidden');
  });

  overlay.addEventListener('click', () => {
    sidebar.classList.add('-translate-x-full');
    overlay.classList.add('hidden');
  });
</script>
@endpush
