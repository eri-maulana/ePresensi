@extends('layouts.main')

@section('title', 'Data Kampus - Admin')
@section('page-title', 'Data Kampus')

@section('content')
  <div class="bg-white p-6 rounded-xl shadow-md">
    <div class="flex justify-between items-center mb-6">
      <h3 class="text-lg font-semibold text-gray-700">Informasi Kampus</h3>
      <a href="#" class="bg-accent hover:bg-accent/90 text-white px-4 py-2 rounded-lg shadow">Ubah Data Kampus</a>
    </div>

    <!-- Detail Table -->
    <div class="overflow-hidden rounded-lg border border-gray-200">
      <table class="min-w-full divide-y divide-gray-200">
        <tbody class="bg-white text-gray-700">
          <tr class="hover:bg-gray-50">
            <td class="w-1/3 p-3 font-semibold bg-mint-light border-r">ID</td>
            <td class="p-3">1</td>
          </tr>
          <tr class="hover:bg-gray-50">
            <td class="p-3 font-semibold bg-mint-light border-r">Nama Kampus</td>
            <td class="p-3">STMIK AL FATH Sukabumi</td>
          </tr>
          <tr class="hover:bg-gray-50">
            <td class="p-3 font-semibold bg-mint-light border-r">Alamat</td>
            <td class="p-3">Jl. Otista No.20, Sukabumi</td>
          </tr>
          <tr class="hover:bg-gray-50">
            <td class="p-3 font-semibold bg-mint-light border-r">Latitude</td>
            <td class="p-3">-6.95344</td>
          </tr>
          <tr class="hover:bg-gray-50">
            <td class="p-3 font-semibold bg-mint-light border-r">Longitude</td>
            <td class="p-3">107.03528</td>
          </tr>
          <tr class="hover:bg-gray-50">
            <td class="p-3 font-semibold bg-mint-light border-r">Radius (m)</td>
            <td class="p-3">300</td>
          </tr>
          <tr class="hover:bg-gray-50">
            <td class="p-3 font-semibold bg-mint-light border-r">Telepon</td>
            <td class="p-3">0266-123456</td>
          </tr>
          <tr class="hover:bg-gray-50">
            <td class="p-3 font-semibold bg-mint-light border-r">Email</td>
            <td class="p-3">info@stmikalfath.ac.id</td>
          </tr>
          <tr class="hover:bg-gray-50">
            <td class="p-3 font-semibold bg-mint-light border-r">Website</td>
            <td class="p-3">
              <a href="https://stmikalfath.ac.id" target="_blank" class="text-mint-dark hover:underline">stmikalfath.ac.id</a>
            </td>
          </tr>
        </tbody>
      </table>
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
