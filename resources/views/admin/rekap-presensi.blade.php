@extends('layouts.main')

@section('title', 'Rekap Presensi - Admin')
@section('page-title', 'Rekap Presensi')

@section('content')
  <div class="bg-white p-6 rounded-xl shadow-md">
    <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Dari</label>
        <input type="date" name="date_from" value="{{ request('date_from') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Sampai</label>
        <input type="date" name="date_to" value="{{ request('date_to') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Kelas</label>
        <select name="kelas_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
          <option value="">Semua kelas</option>
          @foreach($kelasList as $k)
            <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>{{ $k->nama_kelas }}</option>
          @endforeach
        </select>
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
        <select name="mata_kuliah_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
          <option value="">Semua mata kuliah</option>
          @foreach($mataList as $m)
            <option value="{{ $m->id }}" {{ request('mata_kuliah_id') == $m->id ? 'selected' : '' }}>{{ $m->kode_mk }} - {{ $m->nama_mk }}</option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Status</label>
        <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
          <option value="">Semua</option>
          <option value="present" {{ request('status') == 'present' ? 'selected' : '' }}>Hadir</option>
          <option value="late" {{ request('status') == 'late' ? 'selected' : '' }}>Telat</option>
          <option value="absent" {{ request('status') == 'absent' ? 'selected' : '' }}>Absen</option>
        </select>
      </div>

      <div class="md:col-span-4 flex justify-between items-end">
        <div>
          <a href="{{ route('admin.rekap-presensi') }}" class="text-gray-600">Reset</a>
        </div>
        <div class="space-x-2">
          <a href="{{ url()->full() . (strpos(url()->full(), '?') === false ? '?' : '&') . 'export=csv' }}" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">Export CSV</a>
          <button type="submit" class="px-4 py-2 rounded bg-mint text-white">Tampilkan</button>
        </div>
      </div>
    </form>

    <div class="overflow-x-auto rounded-lg border border-gray-200">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-mint-light">
          <tr class="text-gray-800">
            <th class="px-6 py-3 text-left font-semibold">#</th>
            <th class="px-6 py-3 text-left font-semibold">Waktu</th>
            <th class="px-6 py-3 text-left font-semibold">Nama</th>
            <th class="px-6 py-3 text-left font-semibold">Mata Kuliah</th>
            <th class="px-6 py-3 text-left font-semibold">Kelas</th>
            <th class="px-6 py-3 text-left font-semibold">Jam</th>
            <th class="px-6 py-3 text-left font-semibold">Status</th>
            <th class="px-6 py-3 text-left font-semibold">Lokasi (m)</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @forelse($presensis as $i => $p)
            <tr class="hover:bg-gray-50">
              <td class="px-6 py-4">{{ $presensis->firstItem() + $i }}</td>
              <td class="px-6 py-4">{{ $p->created_at }}</td>
              <td class="px-6 py-4">{{ optional($p->user)->name }}</td>
              <td class="px-6 py-4">{{ optional($p->jadwal->mataKuliah)->kode_mk }} - {{ optional($p->jadwal->mataKuliah)->nama_mk }}</td>
              <td class="px-6 py-4">{{ optional($p->jadwal->kelas)->nama_kelas }}</td>
              <td class="px-6 py-4">{{ optional($p->jadwal)->jam_mulai }} - {{ optional($p->jadwal)->jam_selesai }}</td>
              <td class="px-6 py-4">{{ $p->status }}</td>
              <td class="px-6 py-4">{{ $p->distance_m ?? '-' }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="8" class="px-6 py-4 text-center text-gray-500">Tidak ada data.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-4">
      {{ $presensis->links() }}
    </div>
  </div>
@endsection

