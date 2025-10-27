@extends('layouts.main')

@section('title', 'Mahasiswa — Dashboard')
@section('page-title', 'Dashboard Mahasiswa')

@section('content')
    <main class="p-6 space-y-6">
      <!-- Quick Actions -->
      <div class="flex flex-wrap gap-4 mb-2">
        <button class="flex items-center gap-2 bg-accent text-white px-4 py-2 rounded-lg hover:bg-accent/90 shadow-sm">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
          </svg>
          Presensi Sekarang
        </button>
        <button class="flex items-center gap-2 bg-white text-accent border border-accent px-4 py-2 rounded-lg hover:bg-mint shadow-sm">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
          </svg>
          Download Rekap
        </button>
      </div>

      <!-- Overview Statistics -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="bg-white rounded-xl p-4 shadow">
          <div class="flex items-center gap-3">
            <div class="bg-mint p-3 rounded-lg">
              <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
              </svg>
            </div>
            <div>
              <p class="text-gray-500 text-sm">Status Hari Ini</p>
              <h2 class="text-2xl font-bold mt-1">Belum Presensi</h2>
            </div>
          </div>
        </div>
        <div class="bg-white rounded-xl p-4 shadow">
          <div class="flex items-center gap-3">
            <div class="bg-mint p-3 rounded-lg">
              <svg class="w-6 h-6 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
              </svg>
            </div>
            <div>
              <p class="text-gray-500 text-sm">Total Kehadiran</p>
              <h2 class="text-2xl font-bold mt-1">10 Kali</h2>
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
              <p class="text-gray-500 text-sm">Persentase Kehadiran</p>
              <h2 class="text-2xl font-bold mt-1">83%</h2>
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
              <h2 class="text-2xl font-bold mt-1">6 MK</h2>
            </div>
          </div>
        </div>
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Jadwal Kuliah Hari Ini -->
        <div class="bg-white rounded-xl p-4 shadow">
          <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-gray-700">Jadwal Kuliah Hari Ini</h3>
            <a href="#" class="text-sm text-accent hover:underline">Lihat Semua</a>
          </div>
          <div class="space-y-3">
            <div class="p-3 bg-mint-light rounded-lg">
              <div class="flex justify-between items-start mb-2">
                <div>
                  <h4 class="font-medium text-gray-800">Pemrograman Web</h4>
                  <p class="text-sm text-gray-600">09:00 - 10:40 WIB</p>
                </div>
                <span class="px-2 py-1 bg-green-100 text-green-800 text-xs rounded-full">Sedang Berlangsung</span>
              </div>
              <div class="flex items-center gap-4 mt-2 text-sm text-gray-600">
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                  </svg>
                  Ruang 302
                </span>
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                  </svg>
                  Pak Budi
                </span>
              </div>
            </div>
            <div class="p-3 bg-gray-50 rounded-lg">
              <div class="flex justify-between items-start mb-2">
                <div>
                  <h4 class="font-medium text-gray-800">Basis Data</h4>
                  <p class="text-sm text-gray-600">11:00 - 12:40 WIB</p>
                </div>
                <span class="px-2 py-1 bg-gray-200 text-gray-600 text-xs rounded-full">Akan Datang</span>
              </div>
              <div class="flex items-center gap-4 mt-2 text-sm text-gray-600">
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                  </svg>
                  Ruang 303
                </span>
                <span class="flex items-center gap-1">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                  </svg>
                  Ibu Sarah
                </span>
              </div>
            </div>
          </div>
        </div>

        <!-- Grafik Kehadiran -->
        <div class="bg-white rounded-xl p-4 shadow">
          <div class="flex justify-between items-center mb-4">
            <h3 class="font-semibold text-gray-700">Grafik Kehadiran</h3>
            <select class="text-sm border rounded-lg px-2 py-1">
              <option>7 Hari Terakhir</option>
              <option>30 Hari Terakhir</option>
              <option>3 Bulan Terakhir</option>
            </select>
          </div>
          <canvas id="attendanceChart" height="200"></canvas>
        </div>
      </div>

      <!-- Rekap Status Presensi -->
      <div class="bg-white rounded-xl p-4 shadow">
        <div class="flex justify-between items-center mb-4">
          <h3 class="font-semibold text-gray-700">Rekap Status Presensi</h3>
          <a href="riwayat-presensi.html" class="text-sm text-accent hover:underline">Lihat Semua</a>
        </div>
        <div class="overflow-x-auto">
          <table class="min-w-full">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Mata Kuliah</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Waktu</th>
                <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <tr>
                <td class="px-4 py-2">
                  <div class="font-medium text-gray-800">Pemrograman Web</div>
                  <div class="text-sm text-gray-500">Pak Budi</div>
                </td>
                <td class="px-4 py-2 text-sm text-gray-500">26/10/2025</td>
                <td class="px-4 py-2 text-sm text-gray-500">09:00</td>
                <td class="px-4 py-2">
                  <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">
                    Hadir
                  </span>
                </td>
              </tr>
              <tr>
                <td class="px-4 py-2">
                  <div class="font-medium text-gray-800">Basis Data</div>
                  <div class="text-sm text-gray-500">Ibu Sarah</div>
                </td>
                <td class="px-4 py-2 text-sm text-gray-500">26/10/2025</td>
                <td class="px-4 py-2 text-sm text-gray-500">11:00</td>
                <td class="px-4 py-2">
                  <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">
                    Hadir
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
        // Update current time (works with id 'currentTime' or 'current-time')
        function updateTime() {
            const now = new Date();
            const el = document.getElementById('current-time') || document.getElementById('currentTime');
            if (el) el.textContent = now.toLocaleString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        }
        setInterval(updateTime, 1000);
        updateTime();

        // Initialize chart (guard element presence)
        (function () {
            const canvas = document.getElementById('attendanceChart');
            if (canvas) {
                const ctx = canvas.getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum'],
                        datasets: [{ label: 'Kehadiran', data: [100, 100, 80, 100, 0], backgroundColor: '#40916C' }]
                    },
                    options: { scales: { y: { beginAtZero: true, max: 100 } } }
                });
            }
        })();

        // Sidebar toggle (use openSidebar if present, fallback to hamburger)
        (function () {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const openSidebar = document.getElementById('openSidebar') || document.getElementById('hamburger');
            const closeSidebar = document.getElementById('closeSidebar');

            if (openSidebar && sidebar && overlay) {
                openSidebar.addEventListener('click', () => { sidebar.classList.toggle('-translate-x-full'); overlay.classList.toggle('hidden'); });
            }

            [overlay, closeSidebar].forEach(el => { if (!el || !sidebar) return; el.addEventListener('click', () => { sidebar.classList.add('-translate-x-full'); overlay.classList.add('hidden'); }); });
        })();
    </script>
@endpush
