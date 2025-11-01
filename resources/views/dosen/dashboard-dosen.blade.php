@extends('layouts.main')

@section('title', 'Dashboard Dosen')
@section('page-title', 'Dashboard Dosen')

@section('content')
  <main class="p-6 space-y-6">
      <!-- Quick Actions -->
      <div class="flex flex-wrap gap-4 mb-2">
  <button class="flex items-center gap-2 bg-mint text-white px-4 py-2 rounded-lg hover:bg-mint/90 shadow-sm">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
          </svg>
          Buka Presensi
        </button>
  <button class="flex items-center gap-2 bg-white text-accent border border-accent px-4 py-2 rounded-lg hover:bg-mint shadow-sm">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
          </svg>
          Download Rekap
        </button>
      </div>

      <!-- Statistik -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-4 shadow">
          <div class="flex items-center gap-3">
            <div class="bg-mint p-3 rounded-lg">
              <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <div>
              <p class="text-gray-500 text-sm">Jadwal Hari Ini</p>
              <h2 class="text-2xl font-bold mt-1">2 Kelas</h2>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow">
          <div class="flex items-center gap-3">
            <div class="bg-mint p-3 rounded-lg">
              <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
              </svg>
            </div>
            <div>
              <p class="text-gray-500 text-sm">Total Mahasiswa</p>
              <h2 class="text-2xl font-bold mt-1">85 Orang</h2>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow">
          <div class="flex items-center gap-3">
            <div class="bg-mint p-3 rounded-lg">
              <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <div>
              <p class="text-gray-500 text-sm">Rata-rata Kehadiran</p>
              <h2 class="text-2xl font-bold mt-1">92%</h2>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow">
          <div class="flex items-center gap-3">
            <div class="bg-mint p-3 rounded-lg">
              <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
              </svg>
            </div>
            <div>
              <p class="text-gray-500 text-sm">Total Mata Kuliah</p>
              <h2 class="text-2xl font-bold mt-1">4 MK</h2>
            </div>
          </div>
        </div>
      </div>

      <!-- Jadwal Hari Ini & Status Presensi -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Jadwal Hari Ini -->
        <div class="bg-white rounded-xl p-4 shadow">
          <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-gray-700">Jadwal Mengajar Hari Ini</h3>
            <a href="jadwal-mengajar.html" class="text-sm text-accent hover:underline">Lihat Semua</a>
          </div>
          <div class="space-y-3">
            <div class="p-3 bg-mint-light rounded-lg">
              <div class="flex justify-between items-start mb-2">
                <div>
                  <h4 class="font-medium text-gray-800">Pemrograman Web</h4>
                  <p class="text-sm text-gray-600">08:00 - 09:40 WIB</p>
                </div>
                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Sedang Berlangsung</span>
              </div>
              <div class="flex items-center gap-4 mt-2 text-sm text-gray-600">
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                  </svg>
                  Ruang 302
                </span>
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                  </svg>
                  40 Mahasiswa
                </span>
              </div>
            </div>
            <div class="p-3 bg-gray-50 rounded-lg">
              <div class="flex justify-between items-start mb-2">
                <div>
                  <h4 class="font-medium text-gray-800">Basis Data</h4>
                  <p class="text-sm text-gray-600">10:00 - 11:40 WIB</p>
                </div>
                <span class="px-2 py-1 bg-gray-200 text-gray-600 text-xs rounded-full">Akan Datang</span>
              </div>
              <div class="flex items-center gap-4 mt-2 text-sm text-gray-600">
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                  </svg>
                  Ruang 303
                </span>
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                  </svg>
                  35 Mahasiswa
                </span>
              </div>
            </div>
          </div>
        </div>

        <!-- Grafik Kehadiran -->
        <div class="bg-white rounded-xl p-4 shadow">
          <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-gray-700">Rekap Kehadiran Minggu Ini</h3>
            <select class="text-sm border rounded-lg px-2 py-1">
              <option>Pemrograman Web</option>
              <option>Basis Data</option>
            </select>
          </div>
          <canvas id="attendanceChart" height="200"></canvas>
        </div>
      </div>

  <!-- Mahasiswa Perlu Perhatian -->
      <div class="bg-white rounded-xl p-4 shadow">
        <div class="flex justify-between items-center mb-4">
          <h3 class="font-semibold text-gray-700">Mahasiswa Perlu Perhatian</h3>
          <a href="daftar-mahasiswa.html" class="text-sm text-accent hover:underline">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full">
            <thead class="bg-mint-light">
              <tr>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">NIM</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Mata Kuliah</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Kehadiran</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr>
                <td class="px-4 py-2">
                  <div class="flex items-center">
                    <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=Budi+Santoso&background=40916C&color=fff" alt="">
                    <div class="ml-3">
                      <div class="text-sm font-medium text-gray-900">Budi Santoso</div>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-2 text-sm text-gray-500">2023001</td>
                <td class="px-4 py-2 text-sm text-gray-500">Pemrograman Web</td>
                <td class="px-4 py-2 text-sm text-gray-500">60%</td>
                <td class="px-4 py-2">
                  <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">
                    Perlu Perhatian
                  </span>
                </td>
              </tr>
              <tr>
                <td class="px-4 py-2">
                  <div class="flex items-center">
                    <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=Siti+Aminah&background=40916C&color=fff" alt="">
                    <div class="ml-3">
                      <div class="text-sm font-medium text-gray-900">Siti Aminah</div>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-2 text-sm text-gray-500">2023015</td>
                <td class="px-4 py-2 text-sm text-gray-500">Basis Data</td>
                <td class="px-4 py-2 text-sm text-gray-500">65%</td>
                <td class="px-4 py-2">
                  <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">
                    Perlu Dipantau
                  </span>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
  </main>
@endsection

@push('scripts')
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // Update current time (layout header uses id 'current-time')
    function updateTime() {
      const now = new Date();
      const el = document.getElementById('current-time');
      if (el) el.textContent = now.toLocaleString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    }
    setInterval(updateTime, 1000);
    updateTime();

    // Initialize chart
    (function () {
      const canvas = document.getElementById('attendanceChart');
      if (!canvas) return;
      const ctx = canvas.getContext('2d');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum'],
          datasets: [{ label: 'Kehadiran', data: [90, 85, 80, 92, 88], backgroundColor: '#40916C' }]
        },
        options: { scales: { y: { beginAtZero: true, max: 100 } } }
      });
    })();

    // Sidebar toggle (layout-provided elements)
    (function () {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');
      const openSidebar = document.getElementById('openSidebar') || document.getElementById('hamburger');
      const closeSidebar = document.getElementById('closeSidebar');
      if (openSidebar) {
        openSidebar.addEventListener('click', () => { sidebar.classList.toggle('-translate-x-full'); overlay.classList.toggle('hidden'); });
      }
      [overlay, closeSidebar].forEach(el => { if (!el) return; el.addEventListener('click', () => { sidebar.classList.add('-translate-x-full'); overlay.classList.add('hidden'); }); });
    })();
  </script>
@endpush
