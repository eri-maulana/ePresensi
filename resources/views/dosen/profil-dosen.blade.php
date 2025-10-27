<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dosen — Profil</title>
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
            <a href="rekap-presensi.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">
                <i class="fas fa-clipboard-list mr-2"></i>Rekap Presensi
            </a>
            <a href="profil-dosen.html" class="block py-2 px-3 rounded bg-mint text-gray-800 font-semibold">
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
                    <h1 class="text-lg font-semibold text-gray-700">Profil Dosen</h1>
                </div>
                <div class="flex items-center gap-4">
                    <span id="current-time" class="text-sm text-gray-500">--:--:--</span>
                    <img src="https://ui-avatars.com/api/?name=Dr.+Agus&background=22c55e&color=fff" 
                         alt="Dr. Agus" 
                         class="w-8 h-8 rounded-full">
                </div>
            </div>
        </header>

        <main class="p-6">
            <div class="max-w-4xl mx-auto">
                <!-- Profile Header -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="md:flex">
                        <div class="md:flex-shrink-0 p-6 flex justify-center items-center bg-mint-light">
                            <img class="h-48 w-48 rounded-full object-cover border-4 border-white shadow-lg" 
                                 src="https://ui-avatars.com/api/?name=Dr.+Agus&background=22c55e&color=fff&size=200" 
                                 alt="Dr. Agus">
                        </div>
                        <div class="p-6 md:flex-1">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-900">Dr. Agus, M.Kom.</h2>
                                    <p class="text-gray-600">Dosen Teknik Informatika</p>
                                </div>
                                <a href="edit-profil-dosen.html" class="inline-flex items-center px-4 py-2 bg-accent text-white rounded-lg hover:bg-accent/90 transition-colors">
                                    <i class="fas fa-edit mr-2"></i>
                                    Edit Profil
                                </a>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <p class="text-sm text-gray-500">NIDN</p>
                                    <p class="font-medium">198701</p>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-500">Status</p>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Aktif
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Details -->
                <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
                    <!-- Personal Information -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="px-6 py-4 bg-mint-light border-b">
                            <h3 class="font-semibold text-gray-800">Informasi Pribadi</h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <div>
                                <p class="text-sm text-gray-500">Email</p>
                                <p class="font-medium">dr.agus@university.ac.id</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">No. HP</p>
                                <p class="font-medium">+62 812-3456-7890</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Alamat</p>
                                <p class="font-medium">Jl. Pendidikan No. 123, Kota Universitas</p>
                            </div>
                        </div>
                    </div>                   

                    <!-- Teaching Summary -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden md:col-span-2">
                        <div class="px-6 py-4 bg-mint-light border-b">
                            <h3 class="font-semibold text-gray-800">Ringkasan Mengajar (Semester Ini)</h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="bg-mint-light rounded-lg p-4">
                                    <p class="text-sm text-gray-600">Total Mata Kuliah</p>
                                    <p class="text-2xl font-bold text-gray-800">4</p>
                                </div>
                                <div class="bg-mint-light rounded-lg p-4">
                                    <p class="text-sm text-gray-600">Total Kelas</p>
                                    <p class="text-2xl font-bold text-gray-800">6</p>
                                </div>
                                <div class="bg-mint-light rounded-lg p-4">
                                    <p class="text-sm text-gray-600">Total Mahasiswa</p>
                                    <p class="text-2xl font-bold text-gray-800">180</p>
                                </div>
                                <div class="bg-mint-light rounded-lg p-4">
                                    <p class="text-sm text-gray-600">Jam Mengajar</p>
                                    <p class="text-2xl font-bold text-gray-800">24</p>
                                </div>
                            </div>
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
