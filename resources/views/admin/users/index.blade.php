@extends('layouts.main')

@section('title', 'Users - Admin')

@section('content')
<div class="p-6">
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-xl font-semibold">Manajemen Pengguna</h1>
    <a href="{{ route('admin.users.create') }}" class="px-4 py-2 bg-mint text-white rounded">Tambah Pengguna</a>
  </div>

  @if(session('success'))
    <div class="mb-4 p-3 bg-green-50 text-green-700 rounded">{{ session('success') }}</div>
  @endif

  <div class="bg-white rounded shadow overflow-hidden">
    <table class="min-w-full divide-y">
      <thead class="bg-gray-50">
        <tr>
          <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Nama</th>
          <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Email</th>
          <th class="px-4 py-2 text-left text-sm font-medium text-gray-600">Role</th>
          <th class="px-4 py-2 text-right text-sm font-medium text-gray-600">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y">
        @foreach($users as $user)
        <tr>
          <td class="px-4 py-2">{{ $user->name }}</td>
          <td class="px-4 py-2">{{ $user->email }}</td>
          <td class="px-4 py-2">{{ ucfirst($user->role) }}</td>
          <td class="px-4 py-2 text-right">
            <a href="{{ route('admin.users.edit', $user) }}" class="text-sm text-accent mr-3">Edit</a>
            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus user ini?');">
              @csrf
              @method('DELETE')
              <button class="text-sm text-red-600">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-4">{{ $users->links() }}</div>
</div>
@endsection
