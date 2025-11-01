@extends('layouts.main')

@section('title', 'Data Mata Kuliah - Admin')
@section('page-title', 'Data Mata Kuliah')

@section('content')
  <div class="bg-white p-6 rounded-xl shadow-md">
    <div class="flex justify-between items-center mb-6">
      <h3 class="text-lg font-semibold text-gray-700">Daftar Mata Kuliah</h3>
      <a href="#" class="bg-mint hover:bg-mint/90 text-white px-4 py-2 rounded-lg  shadow">Tambah Mata Kuliah</a>
    </div>

    <!-- Detail Table -->
    <div class="overflow-x-auto rounded-lg border border-gray-200">
      <table class="min-w-full divide-y divide-gray-200">
  <thead class="bg-mint-light">
          <tr class="text-gray-800">
            <th scope="col" class="px-6 py-3 text-left font-semibold whitespace-nowrap">#</th>
            <th scope="col" class="px-6 py-3 text-left font-semibold whitespace-nowrap">Kode Mata Kuliah</th>
            <th scope="col" class="px-6 py-3 text-left font-semibold whitespace-nowrap">Nama Mata Kuliah</th>
            <th scope="col" class="px-6 py-3 text-center font-semibold whitespace-nowrap">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          <tr class="hover:bg-gray-50">
            <td class="px-6 py-4 whitespace-nowrap text-gray-700">1</td>
            <td class="px-6 py-4 whitespace-nowrap text-gray-700">IF101</td>
            <td class="px-6 py-4 whitespace-nowrap text-gray-700">Pemrograman Dasar</td>
            <td class="px-6 py-4 text-center whitespace-nowrap">
              <button class="text-blue-600 hover:text-blue-700 mx-1 transition-colors">✏️</button>
              <button class="text-red-500 hover:text-red-600 mx-1 transition-colors">🗑️</button>
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
