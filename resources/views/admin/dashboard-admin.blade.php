@extends('layouts.main')

@section('title', 'Dashboard - Admin')
@section('page-title', 'Dashboard')
@section('page-id', 'admin/dashboard-admin')

@section('content')
  <!-- Quick Actions -->
  <div class="flex md:flex-wrap gap-4 mb-4">
    <a href="{{ route('admin.tambah-jadwal.create') }}" class="flex items-center bg-mint hover:bg-mint/90 text-white gap-2 px-4 py-2 rounded-lg  shadow-sm">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
      </svg>
      Tambah Jadwal
    </a>
    <a href="{{ route('admin.rekap-presensi') }}" class="flex items-center gap-2 bg-white text-accent border border-accent px-4 py-2 rounded-lg hover:bg-mint shadow-sm">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
      </svg>
      Generate Laporan
    </a>
  </div>

  <!-- Overview Statistics -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    <div class="bg-white rounded-xl p-4 shadow">
      <div class="flex items-center gap-3">
        <div class="bg-mint p-3 rounded-lg">
          <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1z"/>
          </svg>
        </div>
        <div>
          <p class="text-gray-500 text-sm">Total Mahasiswa</p>
          <h2 class="text-2xl font-bold mt-1">{{ $data['total_mahasiswa'] }}</h2>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-xl p-4 shadow">
      <div class="flex items-center gap-3">
        <div class="bg-mint p-3 rounded-lg">
          <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
          </svg>
        </div>
        <div>
          <p class="text-gray-500 text-sm">Total Kelas Aktif</p>
          <h2 class="text-2xl font-bold mt-1">{{ $data['total_kelas'] }}</h2>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-xl p-4 shadow">
      <div class="flex items-center gap-3">
        <div class="bg-mint p-3 rounded-lg">
          <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10m-9 4h4m1 4h-5a2 2 0 01-2-2V7a2 2 0 012-2h5"/>
          </svg>
        </div>
        <div>
          <p class="text-gray-500 text-sm">Total Dosen</p>
          <h2 class="text-2xl font-bold mt-1">{{ $data['total_dosen'] }}</h2>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-xl p-4 shadow">
      <div class="flex items-center gap-3">
        <div class="bg-mint p-3 rounded-lg">
          <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 5h16M4 10h16M4 15h16M4 20h16"/>
          </svg>
        </div>
        <div>
          <p class="text-gray-500 text-sm">Total Mata Kuliah</p>
          <h2 class="text-2xl font-bold mt-1">{{ $data['total_mk'] }}</h2>
        </div>
      </div>
    </div>
  </div>


  <!-- Grafik & Kelas -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
    <div class="bg-white rounded-xl p-4 shadow">
      <div class="flex justify-between items-center mb-4">
        <h3 class="font-semibold text-gray-700">Tren Kehadiran</h3>
        <select class="text-sm border rounded-lg px-2 py-1">
          <option>7 Hari Terakhir</option>
          <option>30 Hari Terakhir</option>
          <option>3 Bulan Terakhir</option>
        </select>
      </div>
      <canvas id="attendanceChart" height="200"></canvas>
    </div>

    <div class="bg-white rounded-xl p-4 shadow">
      <div class="flex justify-between items-center mb-4">
        <h3 class="font-semibold text-gray-700">Kelas Terbaru Ditambahkan</h3>
        <a href="{{ route('admin.data-kelas') }}" class="text-sm text-accent hover:underline">Lihat Semua</a>
      </div>
      <div class="space-y-3">
        @foreach ($data['kelas_terbaru'] as $kelas)
        <div class="p-3 bg-gray-50 rounded-lg">
          <div class="flex justify-between items-start">
            <div>
              <h4 class="font-medium text-gray-800">{{ $kelas->nama_kelas }}</h4>
              <p class="text-sm text-gray-600 mt-1">Semester {{ $kelas->tahun_ajaran ?? '-' }}</p>
            </div>
            <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">
              Aktif
            </span>
          </div>
          <div class="flex items-center gap-4 mt-2 text-sm text-gray-500">
            <span class="flex items-center gap-1">👨‍🏫 {{ $kelas->jadwals->first()->dosen->name ?? '-' }}</span>
            <span class="flex items-center gap-1">🎓 {{ $kelas->mahasiswas->count() }} Mahasiswa</span>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>

  <!-- Aktivitas & Peringatan -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
    <div class="bg-white rounded-xl p-4 shadow">
      <h3 class="font-semibold text-gray-700 mb-4">Aktivitas Terbaru</h3>
      <div class="space-y-4">
        @foreach ($data['aktivitas'] as $act)
        <div class="flex gap-3 items-start">
          <div class="flex-none flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-blue-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
          </div>
          <div>
            <p class="text-sm font-medium text-gray-900">{{ $act['title'] }}</p>
            <p class="text-sm text-gray-500">{{ $act['desc'] }}</p>
            <p class="text-xs text-gray-400 mt-0.5">{{ $act['time'] }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>

    <div class="bg-white rounded-xl p-4 shadow">
      <div class="flex justify-between items-center mb-4">
        <h3 class="font-semibold text-gray-700">Peringatan Sistem</h3>
        <a href="{{ route('admin.data-kelas') }}" class="text-sm text-accent hover:underline">Lihat Semua</a>
      </div>
      <div class="space-y-3">
        @foreach ($data['peringatan'] as $warn)
        <div class="flex items-center justify-between p-3 bg-yellow-50 text-yellow-800 rounded-lg">
          <span class="text-sm">{{ $warn['msg'] }}</span>
          <a href="{{ $warn['action'] }}" class="text-xs font-medium hover:underline">Tindakan</a>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('attendanceChart');
  if (ctx) {
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
        datasets: [{
          label: 'Jumlah',
          data: [70, 80, 65, 90, 85, 55],
          backgroundColor: '#40916C'
        }]
      },
      options: { scales: { y: { beginAtZero: true } } }
    });
  }
</script>
@endpush
