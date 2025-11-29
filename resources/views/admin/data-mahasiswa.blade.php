@extends('layouts.main')

@section('title', 'Data Mahasiswa - Admin')
@section('page-title', 'Data Mahasiswa')

@section('content')
  <div class="bg-white p-4 sm:p-6 rounded-xl shadow-md">
    <div class="flex flex-col sm:flex-row justify-between items-center gap-4 mb-6">
      <h3 class="text-lg font-semibold text-gray-700">Informasi Mahasiswa</h3>
      <a href="{{ route('admin.tambah-pengguna.create') }}" class="w-full sm:w-auto bg-mint hover:bg-mint/90 text-white px-4 py-2 rounded-lg shadow text-center">Tambah Pengguna</a>
    </div>

    @if(session('success'))
      <div class="mb-4 p-3 rounded bg-green-50 text-green-700">{{ session('success') }}</div>
    @endif
    @if(session('error'))
      <div class="mb-4 p-3 rounded bg-red-50 text-red-700">{{ session('error') }}</div>
    @endif

    <!-- Detail Table -->
    <div class="relative overflow-hidden rounded-lg border border-gray-200">
      <div class="overflow-x-auto max-h-[70vh]">
        <table class="w-full divide-y divide-gray-200">
          <thead class="bg-mint-light">
            <tr>
              <th class="p-3 text-left font-semibold text-gray-700 whitespace-nowrap sticky top-0 bg-mint-light">#</th>
              <th class="p-3 text-left font-semibold text-gray-700 whitespace-nowrap sticky top-0 bg-mint-light">Nama</th>
              <th class="p-3 text-left font-semibold text-gray-700 whitespace-nowrap sticky top-0 bg-mint-light">Email</th>
              <th class="p-3 text-left font-semibold text-gray-700 whitespace-nowrap sticky top-0 bg-mint-light">No. HP</th>
              <th class="p-3 text-center font-semibold text-gray-700 whitespace-nowrap sticky top-0 bg-mint-light">Aksi</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @forelse($users as $index => $user)
              <tr class="hover:bg-gray-50">
                <td class="p-3 text-gray-700">{{ $users->firstItem() + $index }}</td>
                <td class="p-3 text-gray-700">{{ $user->name }}</td>
                <td class="p-3 text-gray-700">{{ $user->email }}</td>
                <td class="p-3 text-gray-700">{{ $user->no_hp ?? '-' }}</td>
                <td class="p-3 text-center">
                  <div class="flex justify-center gap-2">
                    <a href="{{ route('admin.detail-pengguna', $user) }}" class="text-gray-600 hover:text-gray-800">🔍</a>
                    <a href="{{ route('admin.ubah-pengguna.edit', $user) }}" class="text-blue-600 hover:text-blue-700">✏️</a>
                    <form action="{{ route('admin.hapus-pengguna', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus mahasiswa ini?');">
                      @csrf
                      @method('DELETE')
                      <button class="text-red-500 hover:text-red-600">🗑️</button>
                    </form>
                  </div>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="5" class="p-3 text-center text-gray-500">Belum ada data mahasiswa.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>

    <div class="mt-4">
      {{ $users->links() }}
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
