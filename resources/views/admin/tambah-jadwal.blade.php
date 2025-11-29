@extends('layouts.main')

@section('title', isset($jadwal) ? 'Ubah Jadwal' : 'Tambah Jadwal')
@section('page-title', isset($jadwal) ? 'Ubah Jadwal' : 'Tambah Jadwal')

@section('content')
  <div class="bg-white p-6 rounded-xl shadow-md">
    <form action="{{ isset($jadwal) ? route('admin.ubah-jadwal.update', $jadwal) : route('admin.tambah-jadwal.store') }}" method="POST">
      @csrf
      @if(isset($jadwal)) @method('PUT') @endif

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
          <select name="mata_kuliah_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <option value="">Pilih mata kuliah</option>
            @foreach($mata_kuliahs as $mk)
              <option value="{{ $mk->id }}" {{ old('mata_kuliah_id', $jadwal->mata_kuliah_id ?? '') == $mk->id ? 'selected' : '' }}>{{ $mk->kode_mk }} - {{ $mk->nama_mk }}</option>
            @endforeach
          </select>
          @error('mata_kuliah_id') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Kelas</label>
          <select name="kelas_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <option value="">Pilih kelas</option>
            @foreach($kelas as $k)
              <option value="{{ $k->id }}" {{ old('kelas_id', $jadwal->kelas_id ?? '') == $k->id ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
            @endforeach
          </select>
          @error('kelas_id') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Dosen (opsional)</label>
          <select name="dosen_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <option value="">Pilih dosen</option>
            @foreach($dosens as $d)
              <option value="{{ $d->id }}" {{ old('dosen_id', $jadwal->dosen_id ?? '') == $d->id ? 'selected' : '' }}>{{ $d->name }}</option>
            @endforeach
          </select>
          @error('dosen_id') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Hari</label>
          <select name="hari" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
            <option value="">Pilih hari</option>
            @foreach(['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu'] as $h)
              <option value="{{ $h }}" {{ old('hari', $jadwal->hari ?? '') == $h ? 'selected' : '' }}>{{ $h }}</option>
            @endforeach
          </select>
          @error('hari') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Jam Mulai</label>
          <input type="time" name="jam_mulai" value="{{ old('jam_mulai', $jadwal->jam_mulai ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
          @error('jam_mulai') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700">Jam Selesai</label>
          <input type="time" name="jam_selesai" value="{{ old('jam_selesai', $jadwal->jam_selesai ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
          @error('jam_selesai') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
        </div>

        <div class="md:col-span-2">
          <label class="block text-sm font-medium text-gray-700">Ruangan (opsional)</label>
          <input type="text" name="ruangan" value="{{ old('ruangan', $jadwal->ruangan ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
          @error('ruangan') <p class="text-sm text-red-600">{{ $message }}</p> @enderror
        </div>
      </div>

      <div class="mt-6 flex items-center justify-between">
        <div>
          <a href="{{ url()->previous() }}" class="text-gray-600 hover:text-gray-800">Batal</a>
        </div>
        <button type="submit" class="bg-mint hover:bg-mint/90 text-white px-4 py-2 rounded-lg">Simpan</button>
      </div>
    </form>
  </div>
@endsection
