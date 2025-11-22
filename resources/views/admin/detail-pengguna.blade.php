@extends('layouts.main')

@section('title', 'Detail Pengguna - Admin')
@section('page-title', 'Detail Pengguna')

@section('content')
  <div class="max-w-3xl mx-auto">
    <div class="bg-white p-6 rounded-xl shadow-md">
      <div class="flex items-center space-x-6">
        <div class="shrink-0">
          @if(!empty($user->foto))
            <img src="{{ asset('storage/' . $user->foto) }}" alt="{{ $user->name }}" class="h-32 w-32 object-cover rounded-full" />
          @else
            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=A5F3DC&color=000&size=128" alt="{{ $user->name }}" class="h-32 w-32 object-cover rounded-full" />
          @endif
        </div>
        <div class="flex-1">
          <h2 class="text-2xl font-semibold text-gray-800">{{ $user->name }}</h2>
          <p class="text-sm text-gray-600">{{ ucfirst($user->role) }} • {{ $user->kode_identitas }}</p>
          <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="bg-gray-50 p-4 rounded">
              <p class="text-xs text-gray-500">Email</p>
              <p class="font-medium text-gray-800">{{ $user->email ?? '-' }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded">
              <p class="text-xs text-gray-500">No HP</p>
              <p class="font-medium text-gray-800">{{ $user->no_hp ?? '-' }}</p>
            </div>
            <div class="bg-gray-50 p-4 rounded md:col-span-2">
              <p class="text-xs text-gray-500">Alamat</p>
              <p class="font-medium text-gray-800">{{ $user->alamat ?? '-' }}</p>
            </div>
            @if($user->mahasiswa)
              <div class="bg-gray-50 p-4 rounded md:col-span-2">
                <p class="text-xs text-gray-500">Kelas</p>
                <p class="font-medium text-gray-800">{{ $user->mahasiswa->kelas->nama_kelas ?? '-' }} {{ $user->mahasiswa->kelas->tahun_ajaran ? '(' . $user->mahasiswa->kelas->tahun_ajaran . ')' : '' }}</p>
              </div>
            @endif
          </div>
        </div>
      </div>

      <div class="mt-6 flex justify-end space-x-3">
        <a href="{{ route('admin.ubah-pengguna.edit', $user) }}" class="px-4 py-2 bg-mint text-white rounded hover:bg-mint/90">Ubah</a>

        <form action="{{ route('admin.hapus-pengguna', $user) }}" method="POST" onsubmit="return confirm('Hapus pengguna ini?');">
          @csrf
          @method('DELETE')
          <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
        </form>

        <a href="{{ route('admin.data-pengguna') }}" class="px-4 py-2 border rounded">Kembali</a>
      </div>
    </div>
  </div>
@endsection
