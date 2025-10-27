@extends('layouts.main')

@section('title', 'Dosen — Jadwal Mengajar')
@section('page-title', 'Jadwal Mengajar')

@section('content')
  <main class="p-6 space-y-6">
            <!-- Date Navigation -->
            <div class="bg-white rounded-lg shadow p-4">
                <div class="flex flex-wrap gap-4 items-center justify-between">
                    <div class="flex items-center gap-4">
                        <button class="p-2 hover:bg-gray-100 rounded-lg text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                            </svg>
                        </button>
                        <h2 class="text-lg font-semibold text-gray-800">Senin, 26 Oktober 2025</h2>
                        <button class="p-2 hover:bg-gray-100 rounded-lg text-gray-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                    <div class="flex items-center gap-3">
                        <button class="px-3 py-2 border border-gray-300 rounded-lg text-sm hover:bg-gray-50 text-gray-600">
                            Hari Ini
                        </button>
                        <select class="px-3 py-2 border rounded-lg text-sm focus:outline-none focus:border-accent">
                            <option>Tampilkan Minggu Ini</option>
                            <option>Tampilkan Bulan Ini</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Schedule Timeline -->
            <div class="space-y-4">
                <!-- Morning Schedule -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="px-6 py-4 bg-mint-light border-b">
                        <h3 class="font-semibold text-gray-800">Pagi (08:00 - 12:00)</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <!-- Class 1 -->
                        <div class="flex flex-col sm:flex-row items-start gap-4">
                            <div class="w-full sm:w-20 flex-shrink-0 mb-2 sm:mb-0">
                                <div class="flex sm:block items-center justify-between">
                                    <p class="text-sm font-medium text-gray-900">08:00</p>
                                    <p class="text-xs text-gray-500">09:40</p>
                                </div>
                            </div>
                            <div class="flex-grow bg-mint-light rounded-lg p-4 w-full">
                                <div class="flex flex-col sm:flex-row justify-between items-start gap-2 sm:gap-0 mb-3">
                                    <div>
                                        <h4 class="font-medium text-gray-900">Pemrograman Web</h4>
                                        <p class="text-sm text-gray-600">TI-2A • Semester 3</p>
                                    </div>
                                    <button class="w-full sm:w-auto bg-accent text-white px-3 py-1.5 rounded text-sm hover:bg-accent/90">
                                        Buka Presensi
                                    </button>
                                </div>
                                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4 text-sm text-gray-600">
                                    <span class="flex items-center gap-1">
                                        <i class="fas fa-map-marker-alt w-5"></i>
                                        Ruang 302
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class="fas fa-users w-5"></i>
                                        40 Mahasiswa
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class="fas fa-clock w-5"></i>
                                        100 Menit
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Class 2 -->
                        <div class="flex flex-col sm:flex-row items-start gap-4">
                            <div class="w-full sm:w-20 flex-shrink-0 mb-2 sm:mb-0">
                                <div class="flex sm:block items-center justify-between">
                                    <p class="text-sm font-medium text-gray-900">10:00</p>
                                    <p class="text-xs text-gray-500">11:40</p>
                                </div>
                            </div>
                            <div class="flex-grow bg-gray-50 rounded-lg p-4 w-full">
                                <div class="flex flex-col sm:flex-row justify-between items-start gap-2 sm:gap-0 mb-3">
                                    <div>
                                        <h4 class="font-medium text-gray-900">Basis Data</h4>
                                        <p class="text-sm text-gray-600">TI-3B • Semester 3</p>
                                    </div>
                                    <span class="text-sm text-gray-500 hidden sm:block">
                                        Belum Waktunya
                                    </span>
                                </div>
                                <div class="flex flex-col sm:flex-row items-start sm:items-center gap-2 sm:gap-4 text-sm text-gray-600">
                                    <span class="flex items-center gap-1">
                                        <i class="fas fa-map-marker-alt w-5"></i>
                                        Ruang 303
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class="fas fa-users w-5"></i>
                                        35 Mahasiswa
                                    </span>
                                    <span class="flex items-center gap-1">
                                        <i class="fas fa-clock w-5"></i>
                                        100 Menit
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Afternoon Schedule -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="px-6 py-4 bg-mint-light border-b">
                        <h3 class="font-semibold text-gray-800">Siang (13:00 - 17:00)</h3>
                    </div>
                    <div class="p-6">
                        <div class="text-center py-8 text-gray-500">
                            <svg class="w-12 h-12 mx-auto text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p class="text-sm">Tidak ada jadwal mengajar</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Weekly Summary -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 border-b">
                    <h3 class="font-semibold text-gray-800">Ringkasan Minggu Ini</h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-mint-light rounded-lg p-4">
                            <p class="text-sm text-gray-600">Total Jam Mengajar</p>
                            <p class="text-2xl font-bold text-gray-800 mt-1">12 Jam</p>
                        </div>
                        <div class="bg-mint-light rounded-lg p-4">
                            <p class="text-sm text-gray-600">Total Kelas</p>
                            <p class="text-2xl font-bold text-gray-800 mt-1">6 Kelas</p>
                        </div>
                        <div class="bg-mint-light rounded-lg p-4">
                            <p class="text-sm text-gray-600">Rata-rata Kehadiran</p>
                            <p class="text-2xl font-bold text-gray-800 mt-1">92%</p>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection

@push('scripts')
    {{-- Font Awesome (needed for icons in this page) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script>
        // Current Time Update (layout header uses id 'current-time')
        function updateTime() {
            const now = new Date();
            const el = document.getElementById('current-time');
            if (el) el.textContent = now.toLocaleTimeString('id-ID');
        }
        setInterval(updateTime, 1000);
        updateTime();

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
