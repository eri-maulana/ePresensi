@extends('layouts.main')

@section('title', 'Detail Kampus - Admin')
@section('page-title', 'Detail Kampus')

@section('content')
  <div class="bg-white p-6 rounded-xl shadow-md max-w-3xl mx-auto">
    <div class="flex justify-between items-center mb-4">
      <h3 class="text-lg font-semibold text-gray-700">Detail Kampus</h3>
      <div>
        <a href="{{ route('admin.ubah-kampus.edit', $kampus) }}" class="text-blue-600 hover:text-blue-800 mr-3">✏️ Ubah</a>
        <form action="{{ route('admin.hapus-kampus', $kampus) }}" method="POST" class="inline-block" onsubmit="return confirm('Hapus kampus ini?');">
          @csrf
          @method('DELETE')
          <button class="text-red-500 hover:text-red-700">🗑️ Hapus</button>
        </form>
      </div>
    </div>

    <div class="space-y-6">
      <!-- Nama Kampus -->
      <div>
        <label class="block text-sm text-gray-500 font-medium">Nama Kampus</label>
        <div class="mt-1 text-lg font-medium text-gray-700">{{ $kampus->nama_kampus }}</div>
      </div>

      <!-- Alamat -->
      <div>
        <label class="block text-sm text-gray-500 font-medium">Alamat</label>
        <div class="mt-1 text-gray-700">{{ $kampus->alamat ?? '-' }}</div>
      </div>

      <!-- Latitude & Longitude -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="block text-sm text-gray-500 font-medium">Latitude</label>
          <div class="mt-1 text-gray-700">{{ $kampus->latitude ?? '-' }}</div>
        </div>
        <div>
          <label class="block text-sm text-gray-500 font-medium">Longitude</label>
          <div class="mt-1 text-gray-700">{{ $kampus->longitude ?? '-' }}</div>
        </div>
      </div>

      <!-- Radius Presensi -->
      <div>
        <label class="block text-sm text-gray-500 font-medium">Radius Presensi</label>
        <div class="mt-1 text-gray-700">{{ $kampus->radius_m ?? 300 }} meter</div>
      </div>

      <!-- Telepon & Email -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="block text-sm text-gray-500 font-medium">Telepon</label>
          <div class="mt-1 text-gray-700">{{ $kampus->telepon ?? '-' }}</div>
        </div>
        <div>
          <label class="block text-sm text-gray-500 font-medium">Email</label>
          <div class="mt-1 text-gray-700">{{ $kampus->email ?? '-' }}</div>
        </div>
      </div>

      <!-- Website -->
      <div>
        <label class="block text-sm text-gray-500 font-medium">Website</label>
        <div class="mt-1">
          @if($kampus->website)
            <a href="{{ $kampus->website }}" target="_blank" class="text-mint hover:underline">{{ $kampus->website }}</a>
          @else
            <span class="text-gray-700">-</span>
          @endif
        </div>
      </div>

      <!-- Dibuat & Diubah -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-gray-200">
        <div>
          <label class="block text-sm text-gray-500 font-medium">Dibuat Pada</label>
          <div class="mt-1 text-gray-700">{{ $kampus->created_at->format('d M Y H:i') }}</div>
        </div>
        <div>
          <label class="block text-sm text-gray-500 font-medium">Diubah Pada</label>
          <div class="mt-1 text-gray-700">{{ $kampus->updated_at->format('d M Y H:i') }}</div>
        </div>
      </div>
    </div>

    <div class="mt-6">
      <a href="{{ route('admin.data-kampus') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Kembali</a>
    </div>
  </div>

@endsection
