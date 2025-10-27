@extends('layouts.main')

@section('title', 'Dosen — Profil')
@section('page-title', 'Profil')

@section('content')
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
@endsection

@push('scripts')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script>
        // Current Time Update
        function updateTime() {
            const now = new Date();
            const el = document.getElementById('current-time');
            if (el) el.textContent = now.toLocaleTimeString('id-ID');
        }
        setInterval(updateTime, 1000);
        updateTime();

        // Sidebar toggle (use openSidebar if present, fallback to hamburger)
        (function () {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');
            const openSidebar = document.getElementById('openSidebar') || document.getElementById('hamburger');
            const closeSidebar = document.getElementById('closeSidebar');

            if (openSidebar && sidebar && overlay) {
                openSidebar.addEventListener('click', () => {
                    sidebar.classList.toggle('-translate-x-full');
                    overlay.classList.toggle('hidden');
                });
            }

            [overlay, closeSidebar].forEach(el => {
                if (!el || !sidebar) return;
                el.addEventListener('click', () => { sidebar.classList.add('-translate-x-full'); overlay.classList.add('hidden'); });
            });
        })();
    </script>
@endpush
