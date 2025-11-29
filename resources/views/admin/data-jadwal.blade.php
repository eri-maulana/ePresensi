@extends('layouts.main')



@section('title', 'Data Jadwal - Admin')
@section('page-title', 'Data Jadwal')

@section('content')
  <div class="bg-white p-6 rounded-xl shadow-md">
    <div class="flex justify-between items-center mb-6">
      <h3 class="text-lg font-semibold text-gray-700">Daftar Jadwal</h3>
      <a href="{{ route('admin.tambah-jadwal.create') }}" class="bg-mint hover:bg-mint/90 text-white px-4 py-2 rounded-lg  shadow">Tambah Jadwal</a>
    </div>

    @if(session('success'))
      <div class="mb-4 p-3 rounded bg-green-50 text-green-700">{{ session('success') }}</div>
    @endif

    <div class="overflow-x-auto rounded-lg border border-gray-200">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-mint-light">
          <tr class="text-gray-800">
            <th class="px-6 py-3 text-left font-semibold">#</th>
            <th class="px-6 py-3 text-left font-semibold">Mata Kuliah</th>
            <th class="px-6 py-3 text-left font-semibold">Kelas</th>
            <th class="px-6 py-3 text-left font-semibold">Dosen</th>
            <th class="px-6 py-3 text-left font-semibold">Hari</th>
            <th class="px-6 py-3 text-left font-semibold">Jam</th>
            <th class="px-6 py-3 text-center font-semibold">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @forelse($jadwals as $index => $jadwal)
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4">{{ $jadwals->firstItem() + $index }}</td>
              <td class="px-6 py-4">{{ optional($jadwal->mataKuliah)->kode_mk }} - {{ optional($jadwal->mataKuliah)->nama_mk }}</td>
              <td class="px-6 py-4">{{ optional($jadwal->kelas)->nama_kelas }}</td>
              <td class="px-6 py-4">{{ optional($jadwal->dosen)->name }}</td>
              <td class="px-6 py-4">{{ $jadwal->hari }}</td>
              <td class="px-6 py-4">{{ \Illuminate\Support\Str::limit($jadwal->jam_mulai,5) }} - {{ \Illuminate\Support\Str::limit($jadwal->jam_selesai,5) }}</td>
              <td class="px-6 py-4 text-center">
                <a href="{{ route('admin.detail-jadwal', $jadwal) }}" class="text-gray-600 hover:text-gray-800 mx-1">🔍</a>
                <a href="{{ route('admin.ubah-jadwal.edit', $jadwal) }}" class="text-blue-600 hover:text-blue-700 mx-1">✏️</a>
                <form action="{{ route('admin.hapus-jadwal', $jadwal) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus jadwal ini?');">
                  @csrf
                  @method('DELETE')
                  <button class="text-red-500 hover:text-red-600 mx-1">🗑️</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="px-6 py-4 text-center text-gray-500">Belum ada jadwal.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      {{ $jadwals->links() }}
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
