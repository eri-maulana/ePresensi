@extends('layouts.main')

@section('title', 'Dosen — Rekap Presensi')
@section('page-title', 'Rekap Presensi')

@section('content')
  <main class="p-6 space-y-6">
            <!-- Filter Section -->
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
                        <select class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">
                            <option>Pemrograman Web</option>
                            <option>Basis Data</option>
                            <option>Algoritma</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Kelas</label>
                        <select class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">
                            <option>TI-2A</option>
                            <option>TI-3B</option>
                        </select>
                    </div>
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Periode</label>
                        <select class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">
                            <option>Oktober 2025</option>
                            <option>September 2025</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="bg-white rounded-lg shadow-md p-4">
                    <p class="text-sm text-gray-600">Total Pertemuan</p>
                    <p class="text-2xl font-bold text-gray-800">12</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-4">
                    <p class="text-sm text-gray-600">Rata-rata Kehadiran</p>
                    <p class="text-2xl font-bold text-green-600">95%</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-4">
                    <p class="text-sm text-gray-600">Total Mahasiswa</p>
                    <p class="text-2xl font-bold text-gray-800">40</p>
                </div>
                <div class="bg-white rounded-lg shadow-md p-4">
                    <p class="text-sm text-gray-600">Status Semester</p>
                    <p class="text-2xl font-bold text-blue-600">Aktif</p>
                </div>
            </div>

            <!-- Attendance Table -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6 border-b border-gray-200 flex justify-between items-center">
                    <h2 class="text-lg font-semibold text-gray-800">Daftar Kehadiran Mahasiswa</h2>
                    <div class="flex gap-3">
                        <button class="px-4 py-2 text-sm bg-mint text-white rounded-lg hover:bg-mint/90">
                            <i class="fas fa-download mr-2"></i>Export Excel
                        </button>
                        <button class="px-4 py-2 text-sm bg-mint text-white rounded-lg hover:bg-mint/90">
                            <i class="fas fa-print mr-2"></i>Cetak PDF
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-mint-light">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIM</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Mahasiswa</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Hadir</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Persentase</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">1</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2023001</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=Putri+Narila" alt="">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Putri Narila</div>
                                            <div class="text-sm text-gray-500">TI-2A</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">12/12</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">100%</div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-green-600 h-2 rounded-full" style="width: 100%"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Memenuhi Syarat
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <button class="text-accent hover:text-accent/80">
                                        <i class="fas fa-eye"></i> Detail
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">2023002</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <img class="h-8 w-8 rounded-full" src="https://ui-avatars.com/api/?name=Asep" alt="">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">Asep</div>
                                            <div class="text-sm text-gray-500">TI-2A</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">11/12</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">92%</div>
                                    <div class="w-full bg-gray-200 rounded-full h-2">
                                        <div class="bg-green-600 h-2 rounded-full" style="width: 92%"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Memenuhi Syarat
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <button class="text-accent hover:text-accent/80">
                                        <i class="fas fa-eye"></i> Detail
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Menampilkan <span class="font-medium">1</span> sampai <span class="font-medium">2</span> dari <span class="font-medium">2</span> mahasiswa
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px">
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Previous</span>
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700">1</a>
                                <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <span class="sr-only">Next</span>
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection

@push('scripts')
    {{-- Font Awesome (icons) --}}
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
