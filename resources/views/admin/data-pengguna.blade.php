@extends('layouts.main')

@section('title', 'Data Pengguna - Admin')
@section('page-title', 'Data Pengguna')

@section('content')
  <div class="bg-white p-6 rounded-xl shadow-md">
    <div class="flex justify-between items-center mb-6">
      <h3 class="text-lg font-semibold text-gray-700">Daftar Pengguna</h3>
  <a href="{{ route('admin.tambah-pengguna.create') }}" class="bg-mint hover:bg-mint/90 text-white px-4 py-2 rounded-lg  shadow">Tambah Pengguna</a>
    </div>

    @if(session('success'))
      <div class="mb-4 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded">
        {{ session('success') }}
      </div>
    @endif

    <!-- Detail Table -->
    <div class="overflow-x-auto rounded-lg border border-gray-200">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-mint-light">
          <tr>
            <th class="p-3 text-left font-semibold text-gray-700">#</th>
            <th class="p-3 text-left font-semibold text-gray-700">Foto</th>
            <th class="p-3 text-left font-semibold text-gray-700">Nama</th>
            <th class="p-3 text-left font-semibold text-gray-700">Email</th>
            <th class="p-3 text-left font-semibold text-gray-700">Role</th>
            <th class="p-3 text-left font-semibold text-gray-700">No HP</th>
            <th class="p-3 text-left font-semibold text-gray-700">Alamat</th>
            <th class="p-3 text-center font-semibold text-gray-700">Aksi</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @forelse($users as $index => $user)
          <tr class="hover:bg-gray-50 cursor-pointer" data-href="{{ route('admin.detail-pengguna', $user) }}">
            <td class="p-3 text-gray-700">{{ $users->firstItem() + $index }}</td>
            <td class="p-3">
              @if(!empty($user->foto))
                <img src="{{ asset('storage/' . $user->foto) }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full" />
              @else
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=A5F3DC&color=000" alt="{{ $user->name }}" class="w-10 h-10 rounded-full" />
              @endif
            </td>
            <td class="p-3 text-gray-700">{{ $user->name }}</td>
            <td class="p-3 text-gray-700">{{ $user->email }}</td>
            <td class="p-3 text-gray-700">{{ $user->role }}</td>
            <td class="p-3 text-gray-700">{{ $user->no_hp ?? '-' }}</td>
            <td class="p-3 text-gray-700">{{ $user->alamat ?? '-' }}</td>
            <td class="p-3 text-center">
              <a href="{{ route('admin.ubah-pengguna.edit', $user) }}" class="text-blue-600 hover:text-blue-700 mx-1" onclick="event.stopPropagation();">✏️</a>

              <form action="{{ route('admin.hapus-pengguna', $user) }}" method="POST" class="inline-block" onsubmit="event.stopPropagation(); return confirm('Hapus pengguna ini?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-600 mx-1">🗑️</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td class="p-3 text-gray-700" colspan="8">Belum ada pengguna.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      {{ $users->links() }}
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
  // make table rows clickable to go to detail page
  document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('tr[data-href]').forEach(function (row) {
      row.addEventListener('click', function () {
        const href = this.getAttribute('data-href');
        if (href) window.location = href;
      });
    });
  });
</script>
@endpush
