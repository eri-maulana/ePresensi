@extends('layouts.main')

@section('title', 'Data Kelas - Admin')
@section('page-title', 'Data Kelas')

@section('content')
  <div class="bg-white p-6 rounded-xl shadow-md">
    <div class="flex justify-between items-center mb-6">
      <h3 class="text-lg font-semibold text-gray-700">Informasi Kelas</h3>
      <a href="{{ route('admin.tambah-kelas.create') }}" class="bg-mint hover:bg-mint/90 text-white px-4 py-2 rounded-lg  shadow">Tambah Data Kelas</a>
    </div>

    @if(session('success'))
      <div class="mb-4 p-3 rounded bg-green-50 text-green-700">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto rounded-lg border border-gray-200">
      <table class="min-w-full divide-y divide-gray-200">
  <thead class="bg-mint-light">
          <tr class="text-gray-800">
            <th scope="col" class="px-6 py-3 text-left font-semibold whitespace-nowrap">#</th>
            <th scope="col" class="px-6 py-3 text-left font-semibold whitespace-nowrap">Nama Kelas</th>
            <th scope="col" class="px-6 py-3 text-left font-semibold whitespace-nowrap">Tahun Ajaran</th>
            <th scope="col" class="px-6 py-3 text-center font-semibold whitespace-nowrap">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @forelse($kelas as $i => $k)
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $kelas->firstItem() + $i }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $k->nama_kelas }}</td>
              <td class="px-6 py-4 whitespace-nowrap text-gray-700">{{ $k->tahun_ajaran }}</td>
              <td class="px-6 py-4 text-center whitespace-nowrap">
                <a href="{{ route('admin.detail-kelas', $k) }}" class="text-gray-600 hover:text-gray-800 mx-1">🔍</a>
                <a href="{{ route('admin.ubah-kelas.edit', $k) }}" class="text-blue-600 hover:text-blue-700 mx-1">✏️</a>
                <form action="{{ route('admin.hapus-kelas', $k) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus kelas ini?');">
                  @csrf
                  @method('DELETE')
                  <button class="text-red-500 hover:text-red-600 mx-1">🗑️</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="4" class="px-6 py-4 text-center text-gray-500">Belum ada data kelas.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      {{ $kelas->links() }}
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
