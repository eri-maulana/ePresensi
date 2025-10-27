<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosen — Rekap Presensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#D8F3DC',
                        accent: '#40916C',
                        sidebar: '#E9F7EF',
                        textdark: '#1B4332',
                        mint: '#D8F3DC',
                        'mint-light': '#E9F7EF'
                    }
                }
            }
        }
    </script>
</head>
<body class="font-sans bg-[#F8FCFA] text-gray-800">
    <!-- Sidebar Overlay -->
    <div id="overlay" class="fixed inset-0 bg-black opacity-30 hidden z-40"></div>

    <!-- Sidebar -->
    <aside id="sidebar" class="fixed top-0 left-0 w-64 h-full bg-white border-r shadow-lg transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out z-50">
        <div class="p-4 flex justify-between items-center border-b">
            <h1 class="text-lg font-bold text-gray-700">Panel Dosen</h1>
            <button id="closeSidebar" class="md:hidden text-gray-500 hover:text-gray-700">✕</button>
        </div>
        <nav class="p-4 space-y-2">
            <a href="dashboard-dosen.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">
                <i class="fas fa-home mr-2"></i>Dashboard
            </a>
            <a href="daftar-mahasiswa.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">
                <i class="fas fa-users mr-2"></i>Daftar Mahasiswa
            </a>
            <a href="jadwal-mengajar.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">
                <i class="fas fa-calendar mr-2"></i>Jadwal Mengajar
            </a>
            <a href="rekap-presensi.html" class="block py-2 px-3 rounded bg-mint text-gray-800 font-semibold">
                <i class="fas fa-clipboard-list mr-2"></i>Rekap Presensi
            </a>
            <a href="profil-dosen.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">
                <i class="fas fa-user mr-2"></i>Profil
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="md:ml-64 transition-all duration-300">
        <!-- Header -->
        <header class="bg-white shadow-sm px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center gap-3">
                    <button id="hamburger" class="md:hidden p-2 rounded-lg hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    <h1 class="text-lg font-semibold text-gray-700">Rekap Presensi</h1>
                </div>
                <div class="flex items-center gap-4">
                    <span id="current-time" class="text-sm text-gray-500">--:--:--</span>
                    <img src="https://ui-avatars.com/api/?name=Dr.+Agus&background=22c55e&color=fff" 
                         alt="Dr. Agus" 
                         class="w-8 h-8 rounded-full">
                </div>
            </div>
        </header>

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
                        <button class="px-4 py-2 text-sm bg-accent text-white rounded-lg hover:bg-accent/90">
                            <i class="fas fa-download mr-2"></i>Export Excel
                        </button>
                        <button class="px-4 py-2 text-sm bg-accent text-white rounded-lg hover:bg-accent/90">
                            <i class="fas fa-print mr-2"></i>Cetak PDF
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
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
                                <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-mint text-sm font-medium text-gray-700">1</a>
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
    </div>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script>
        // Current Time Update
        function updateTime() {
            const now = new Date();
            document.getElementById('current-time').textContent = now.toLocaleTimeString('id-ID');
        }
        setInterval(updateTime, 1000);
        updateTime();

        // Sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const hamburger = document.getElementById('hamburger');
        const closeSidebar = document.getElementById('closeSidebar');

        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });

        [overlay, closeSidebar].forEach(el => {
            el.addEventListener('click', () => {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            });
        });
    </script>
</body>
</html>
