@extends('layouts.main')

@section('title', 'Mahasiswa — Presensi')
@section('page-title', 'Presensi')

@section('content')
    <main class="p-6 space-y-6">
      <!-- Status Card -->
      <div class="bg-white rounded-xl p-6 shadow">
        <div class="flex items-center justify-between mb-6">
          <div>
            <h2 class="text-xl font-semibold text-gray-800">Pemrograman Web</h2>
            <p class="text-gray-600">09:00 - 10:40 WIB • Pak Budi • Ruang 302</p>
          </div>
          <div class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">
            Belum Presensi
          </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
          <!-- Left Section - Instructions and Buttons -->
          <div class="space-y-6">
            <!-- Instructions Card -->
            <div class="bg-mint-light rounded-lg p-4">
              <h3 class="font-semibold text-gray-800 mb-2">📋 Instruksi Presensi</h3>
              <ul class="space-y-2 text-gray-600">
                <li class="flex items-center gap-2">
                  <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                  Aktifkan GPS perangkat Anda
                </li>
                <li class="flex items-center gap-2">
                  <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                  Izinkan akses kamera
                </li>
                <li class="flex items-center gap-2">
                  <svg class="w-5 h-5 text-accent" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                  </svg>
                  Pastikan wajah terlihat jelas
                </li>
              </ul>
            </div>

            <!-- Location Details -->
            <div class="bg-gray-50 rounded-lg p-4">
              <h3 class="font-semibold text-gray-800 mb-3">📍 Detail Lokasi</h3>
              <div class="grid grid-cols-2 gap-4">
                <div>
                  <p class="text-sm text-gray-500">Latitude</p>
                  <p class="font-medium text-gray-800">-6.95</p>
                </div>
                <div>
                  <p class="text-sm text-gray-500">Longitude</p>
                  <p class="font-medium text-gray-800">107.03</p>
                </div>
                <div class="col-span-2">
                  <p class="text-sm text-gray-500">Alamat</p>
                  <p class="font-medium text-gray-800">Kampus Utama, Gedung A</p>
                </div>
              </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3">
              <button class="flex-1 bg-mint text-white px-6 py-3 rounded-lg hover:bg-mint/90 shadow-sm flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Absen Masuk
              </button>
              <button class="flex-1 border border-accent text-accent px-6 py-3 rounded-lg hover:bg-mint shadow-sm flex items-center justify-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Absen Pulang
              </button>
            </div>
          </div>

          <!-- Right Section - Camera Preview -->
          <div class="bg-gray-900 rounded-lg overflow-hidden">
            <div class="p-4 bg-gray-800 text-white flex items-center justify-between">
              <h3 class="font-medium">📸 Preview Kamera</h3>
              <button class="text-sm text-gray-400 hover:text-white">
                Ganti Kamera
              </button>
            </div>
            <div class="aspect-[4/3] bg-black relative">
              <video id="camPreview" class="w-full h-full object-cover" autoplay playsinline muted></video>
              <div class="absolute inset-0 border-2 border-accent/50 m-4 rounded pointer-events-none"></div>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection

@push('scripts')
    <script>
        // Update current time (handles different id variants)
        function updateTime() {
            const now = new Date();
            const el = document.getElementById('current-time') || document.getElementById('currentTime');
            if (el) el.textContent = now.toLocaleString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
        }
        setInterval(updateTime, 1000);
        updateTime();

        // Camera initialization
        async function initCamera() {
            try {
                const stream = await navigator.mediaDevices.getUserMedia({ video: true });
                const video = document.getElementById('camPreview');
                if (video) video.srcObject = stream;
            } catch (err) {
                console.error('Error accessing camera:', err);
            }
        }
        initCamera();

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
