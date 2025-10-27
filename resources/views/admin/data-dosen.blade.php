@extends('layouts.main')

@section('title', 'Data Dosen - Admin')
@section('page-title', 'Data Dosen')

@section('content')
  <div class="bg-white p-6 rounded-xl shadow-md">
    <div class="flex justify-between items-center mb-6">
      <h3 class="text-lg font-semibold text-gray-700">Daftar Dosen</h3>
    </div>

    <!-- Detail Table -->
    <div class="overflow-x-auto rounded-lg border border-gray-200">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-mint-light">
          <tr>
            <th class="p-3 text-left font-semibold text-gray-700">#</th>
            <th class="p-3 text-left font-semibold text-gray-700">Foto</th>
            <th class="p-3 text-left font-semibold text-gray-700">NIDN</th>
            <th class="p-3 text-left font-semibold text-gray-700">Nama</th>
            <th class="p-3 text-left font-semibold text-gray-700">Email</th>
            <th class="p-3 text-left font-semibold text-gray-700">No HP</th>
            <th class="p-3 text-left font-semibold text-gray-700">Alamat</th>
            <th class="p-3 text-center font-semibold text-gray-700">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr class="hover:bg-gray-50">
            <td class="p-3 text-gray-700">1</td>
            <td class="p-3">
              <img src="https://ui-avatars.com/api/?name=Agus&background=A5F3DC&color=000" alt="Dr. Agus" class="w-10 h-10 rounded-full" />
            </td>
            <td class="p-3 text-gray-700">198701</td>
            <td class="p-3 text-gray-700">Dr. Agus</td>
            <td class="p-3 text-gray-700">agus@stmikalfath.ac.id</td>
            <td class="p-3 text-gray-700">08123456789</td>
            <td class="p-3 text-gray-700">Jl. Sukabumi No. 10</td>
            <td class="p-3 text-center">
              <button class="text-blue-600 hover:text-blue-700 mx-1">✏️</button>
              <button class="text-red-500 hover:text-red-600 mx-1">🗑️</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection

@push('scripts')
<script>
  const sidebar = document.getElementById("sidebar");
  const overlay = document.getElementById("overlay");
  const openSidebar = document.getElementById("openSidebar");
  const closeSidebar = document.getElementById("closeSidebar");

  if (openSidebar) {
    openSidebar.addEventListener("click", () => {
      sidebar.classList.remove("-translate-x-full");
      overlay.classList.remove("hidden");
    });
  }

  if (closeSidebar) {
    closeSidebar.addEventListener("click", () => {
      sidebar.classList.add("-translate-x-full");
      overlay.classList.add("hidden");
    });
  }

  if (overlay) {
    overlay.addEventListener("click", () => {
      sidebar.classList.add("-translate-x-full");
      overlay.classList.add("hidden");
    });
  }
</script>
@endpush
