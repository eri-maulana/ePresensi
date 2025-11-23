@extends('layouts.main')

@section('title', 'Detail Kelas - Admin')
@section('page-title', 'Detail Kelas')

@section('content')
  <div class="bg-white p-6 rounded-xl shadow-md max-w-3xl mx-auto">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-lg font-semibold text-gray-700">Detail Kelas</h3>
      <div>
        <a href="{{ route('admin.ubah-kelas.edit', $kelas) }}" class="text-blue-600 hover:text-blue-800 mr-3">✏️ Ubah</a>
        <form action="{{ route('admin.hapus-kelas', $kelas) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus kelas ini?');">
          @csrf
          @method('DELETE')
          <button class="text-red-500 hover:text-red-700">🗑️ Hapus</button>
        </form>
      </div>
    </div>

    <div class="space-y-4">
      <div>
        <label class="block text-sm text-gray-500">Nama Kelas</label>
        <div class="mt-1 text-lg font-medium">{{ $kelas->nama_kelas }}</div>
      </div>

      <div>
        <label class="block text-sm text-gray-500">Tahun Ajaran</label>
        <div class="mt-1 text-lg font-medium">{{ $kelas->tahun_ajaran }}</div>
      </div>
    </div>

    <div class="mt-6">
      <a href="{{ route('admin.data-kelas') }}" class="px-4 py-2 bg-gray-200 rounded">Kembali</a>
    </div>
  </div>

@endsection
