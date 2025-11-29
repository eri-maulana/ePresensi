@extends('layouts.main')

@section('title', 'Detail Jadwal - Admin')
@section('page-title', 'Detail Jadwal')

@section('content')
  <div class="bg-white p-6 rounded-xl shadow-md max-w-3xl mx-auto">
    <h3 class="text-lg font-semibold text-gray-700 mb-4">Detail Jadwal</h3>

    <div class="grid grid-cols-1 gap-4">
      <div>
        <strong>Mata Kuliah:</strong>
        <div>{{ optional($jadwal->mataKuliah)->kode_mk }} - {{ optional($jadwal->mataKuliah)->nama_mk }}</div>
      </div>

      <div>
        <strong>Kelas:</strong>
        <div>{{ optional($jadwal->kelas)->nama_kelas }}</div>
      </div>

      <div>
        <strong>Dosen:</strong>
        <div>{{ optional($jadwal->dosen)->name ?? '-' }}</div>
      </div>

      <div>
        <strong>Hari:</strong>
        <div>{{ $jadwal->hari }}</div>
      </div>

      <div>
        <strong>Jam:</strong>
        <div>{{ $jadwal->jam_mulai }} - {{ $jadwal->jam_selesai }}</div>
      </div>

      <div>
        <strong>Ruangan:</strong>
        <div>{{ $jadwal->ruangan ?? '-' }}</div>
      </div>

      <div class="pt-4">
        <a href="{{ route('admin.data-jadwal') }}" class="text-gray-600 hover:text-gray-800">Kembali</a>
      </div>
    </div>
  </div>
@endsection
