@extends('layouts.main')

@section('title', 'Detail Mata Kuliah - Admin')
@section('page-title', 'Detail Mata Kuliah')

@section('content')
  <div class="bg-white p-6 rounded-xl shadow-md max-w-3xl mx-auto">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-lg font-semibold text-gray-700">Detail Mata Kuliah</h3>
      <div>
        <a href="{{ route('admin.ubah-mata-kuliah.edit', $mataKuliah) }}" class="text-blue-600 hover:text-blue-800 mr-3">✏️ Ubah</a>
        <form action="{{ route('admin.hapus-mata-kuliah', $mataKuliah) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus mata kuliah ini?');">
          @csrf
          @method('DELETE')
          <button class="text-red-500 hover:text-red-700">🗑️ Hapus</button>
        </form>
      </div>
    </div>

    <div class="space-y-4">
      <div>
        <label class="block text-sm text-gray-500">Kode Mata Kuliah</label>
        <div class="mt-1 text-lg font-medium">{{ $mataKuliah->kode_mk }}</div>
      </div>

      <div>
        <label class="block text-sm text-gray-500">Nama Mata Kuliah</label>
        <div class="mt-1 text-lg font-medium">{{ $mataKuliah->nama_mk }}</div>
      </div>
    </div>

    <div class="mt-6">
      <a href="{{ route('admin.data-mata-kuliah') }}" class="px-4 py-2 bg-gray-200 rounded">Kembali</a>
    </div>
  </div>

@endsection
