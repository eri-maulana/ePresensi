@extends('layouts.main')

@section('title', 'Tambah Pengguna - Admin')

@section('content')
<div class="p-6 max-w-2xl mx-auto">
  <h1 class="text-xl font-semibold mb-4">Tambah Pengguna</h1>

  <form action="{{ route('admin.users.store') }}" method="POST">
    @csrf
    <div class="space-y-4 bg-white p-4 rounded shadow">
      <div>
        <label class="block text-sm text-gray-600">Nama</label>
        <input name="name" value="{{ old('name') }}" class="w-full border rounded p-2" required />
        @error('name')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
      </div>

      <div>
        <label class="block text-sm text-gray-600">Email</label>
        <input name="email" type="email" value="{{ old('email') }}" class="w-full border rounded p-2" required />
        @error('email')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
      </div>

      <div>
        <label class="block text-sm text-gray-600">Role</label>
        <select name="role" class="w-full border rounded p-2" required>
          <option value="admin">Admin</option>
          <option value="dosen">Dosen</option>
          <option value="mahasiswa">Mahasiswa</option>
        </select>
        @error('role')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
      </div>

      <div>
        <label class="block text-sm text-gray-600">Password</label>
        <input name="password" type="password" class="w-full border rounded p-2" required />
        @error('password')<div class="text-red-600 text-sm">{{ $message }}</div>@enderror
      </div>

      <div class="flex justify-end">
        <a href="{{ route('admin.users.index') }}" class="mr-2 px-3 py-2 border rounded">Batal</a>
        <button class="px-4 py-2 bg-mint text-white rounded">Simpan</button>
      </div>
    </div>
  </form>
</div>
@endsection
