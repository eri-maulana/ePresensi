@extends('layouts.main')

@section('title', 'Dashboard Admin')
@section('page-title', 'Dashboard Admin')

@section('content')
  <!-- Quick Actions -->
  <div class="flex flex-wrap gap-4 mb-2">
    <button class="flex items-center bg-accent hover:bg-accent/90 text-white gap-2 px-4 py-2 rounded-lg  shadow-sm">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
      </svg>
      Tambah Jadwal
    </button>
    <button class="flex items-center gap-2 bg-white text-accent border border-accent px-4 py-2 rounded-lg hover:bg-mint shadow-sm">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
      </svg>
      Generate Laporan
    </button>
  </div>

  <!-- Overview Statistics -->
  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
    @php
      $cards = [
        ['label' => 'Total Mahasiswa', 'iconColor' => 'text-accent', 'value' => '2,560', 'desc' => '+12 hari ini', 'descColor' => 'text-green-600'],
        ['label' => 'Total Kelas Aktif', 'iconColor' => 'text-accent', 'value' => '86', 'desc' => '8 sedang berlangsung', 'descColor' => 'text-blue-600'],
        ['label' => 'Total Dosen', 'iconColor' => 'text-accent', 'value' => '124', 'desc' => '5 dosen baru', 'descColor' => 'text-blue-600'],
        ['label' => 'Total Mata Kuliah', 'iconColor' => 'text-accent', 'value' => '48', 'desc' => '12 aktif minggu ini', 'descColor' => 'text-yellow-600'],
      ];
    @endphp

    @foreach ($cards as $c)
    <div class="bg-white rounded-xl p-4 shadow">
      <div class="flex items-center gap-3">
        <div class="bg-mint p-3 rounded-lg">
          <svg class="w-6 h-6 {{ $c['iconColor'] }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1z"/>
          </svg>
        </div>
        <div>
          <p class="text-gray-500 text-sm">{{ $c['label'] }}</p>
          <h2 class="text-2xl font-bold mt-1">{{ $c['value'] }}</h2>
        </div>
      </div>
      <div class="mt-2 text-sm {{ $c['descColor'] }}">
        <span class="flex items-center gap-1">
          <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
          </svg>
          {{ $c['desc'] }}
        </span>
      </div>
    </div>
    @endforeach
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
        <a href="#" class="text-sm text-accent hover:underline">Lihat Semua</a>
      </div>
      {{-- Data kelas bisa diganti nanti dari database --}}
      <div class="space-y-3">
        @foreach ([['Pemrograman Web','TI-2A','Dr. Agus','40 Mahasiswa','Aktif'],
                   ['Basis Data Lanjut','TI-3B','Dr. Budi','35 Mahasiswa','Aktif'],
                   ['Jaringan Komputer','TI-2C','Dr. Citra','38 Mahasiswa','Menunggu']] as $k)
        <div class="p-3 bg-gray-50 rounded-lg">
          <div class="flex justify-between items-start">
            <div>
              <h4 class="font-medium text-gray-800">{{ $k[0] }}</h4>
              <p class="text-sm text-gray-600 mt-1">{{ $k[1] }} - Semester Ganjil 2025/2026</p>
            </div>
            <span class="px-2 py-1 bg-{{ $k[4]=='Aktif'?'green':'yellow' }}-100 text-{{ $k[4]=='Aktif'?'green':'yellow' }}-800 text-xs rounded-full">
              {{ $k[4] }}
            </span>
          </div>
          <div class="flex items-center gap-4 mt-2 text-sm text-gray-500">
            <span class="flex items-center gap-1">👨‍🏫 {{ $k[2] }}</span>
            <span class="flex items-center gap-1">🎓 {{ $k[3] }}</span>
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
        <div class="flex gap-3 items-start">
          <div class="flex-none flex h-8 w-8 items-center justify-center rounded-full bg-blue-100 text-blue-600">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
          </div>
          <div>
            <p class="text-sm font-medium text-gray-900">Kelas Baru Ditambahkan</p>
            <p class="text-sm text-gray-500">Pemrograman Web - TI-2A</p>
            <p class="text-xs text-gray-400 mt-0.5">2 menit yang lalu</p>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-white rounded-xl p-4 shadow">
      <div class="flex justify-between items-center mb-4">
        <h3 class="font-semibold text-gray-700">Peringatan Sistem</h3>
        <button class="text-sm text-accent hover:underline">Lihat Semua</button>
      </div>
      <div class="space-y-3">
        <div class="flex items-center justify-between p-3 bg-yellow-50 text-yellow-800 rounded-lg">
          <span class="text-sm">3 kelas belum ada jadwalnya minggu depan</span>
          <button class="text-xs font-medium hover:underline">Tindakan</button>
        </div>
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
