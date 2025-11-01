@extends('layouts.main')

@section('title', 'Data Mahasiswa - Admin')
@section('page-title', 'Data Mahasiswa')

@section('content')
  <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-6">
      <h3 class="text-lg font-semibold text-gray-700">Informasi Mahasiswa</h3>
      <a href="#" class="w-full sm:w-auto bg-mint hover:bg-mint/90 text-white px-4 py-2 rounded-lg shadow text-center">Tambah Data Mahasiswa</a>
    </div>

    <!-- Detail Table -->
    <div class="relative overflow-hidden rounded-lg border border-gray-200">
      <div class="overflow-x-auto max-h-[70vh]">
        <table class="w-full divide-y divide-gray-200">
          <thead class="bg-mint-light">
            <tr>
              <th class="p-3 text-left font-semibold text-gray-700 whitespace-nowrap sticky top-0 bg-mint-light">#</th>
              <th class="p-3 text-left font-semibold text-gray-700 whitespace-nowrap sticky top-0 bg-mint-light">Foto</th>
              <th class="p-3 text-left font-semibold text-gray-700 whitespace-nowrap sticky top-0 bg-mint-light">NIM</th>
              <th class="p-3 text-left font-semibold text-gray-700 whitespace-nowrap sticky top-0 bg-mint-light">Nama</th>
              <th class="hidden md:table-cell p-3 text-left font-semibold text-gray-700 whitespace-nowrap sticky top-0 bg-mint-light">Email</th>
              <th class="hidden sm:table-cell p-3 text-left font-semibold text-gray-700 whitespace-nowrap sticky top-0 bg-mint-light">No HP</th>
              <th class="hidden lg:table-cell p-3 text-left font-semibold text-gray-700 whitespace-nowrap sticky top-0 bg-mint-light">Alamat</th>
              <th class="p-3 text-left font-semibold text-gray-700 whitespace-nowrap sticky top-0 bg-mint-light">Kelas</th>
              <th class="p-3 text-center font-semibold text-gray-700 whitespace-nowrap sticky top-0 bg-mint-light">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <tr class="hover:bg-gray-50">
              <td class="p-3 text-gray-700">#</td>
              <td class="p-3">
                <img src="https://ui-avatars.com/api/?name=Andi+Setiawan&background=A5F3DC&color=000" alt="Andi Setiawan" class="w-8 h-8 sm:w-10 sm:h-10 rounded-full"/>
              </td>
              <td class="p-3 text-gray-700">2023001</td>
              <td class="p-3 text-gray-700">Andi Setiawan</td>
              <td class="hidden md:table-cell p-3 text-gray-700">andi@example.com</td>
              <td class="hidden sm:table-cell p-3 text-gray-700">08123456789</td>
              <td class="hidden lg:table-cell p-3 text-gray-700 max-w-[200px] truncate" title="Jl. Cibeureum No.10, Sukabumi">
                Jl. Cibeureum No.10, Sukabumi
              </td>
              <td class="p-3 text-gray-700">TI-1A</td>
              <td class="p-3 text-center">
                <div class="flex justify-center gap-2">
                  <button class="text-blue-600 hover:text-blue-700 p-1">✏️</button>
                  <button class="text-red-500 hover:text-red-600 p-1">🗑️</button>
                </div>
              </td>
            </tr>
            <!-- Tambahkan baris data lainnya di sini untuk testing scroll -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('overlay');
  const openSidebar = document.getElementById('openSidebar');
  const closeSidebar = document.getElementById('closeSidebar');

  if (openSidebar) {
    openSidebar.addEventListener('click', () => {
      sidebar.classList.remove('-translate-x-full');
      overlay.classList.remove('hidden');
    });
  }

  if (closeSidebar) {
    closeSidebar.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });
  }

  if (overlay) {
    overlay.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });
  }
</script>
@endpush
