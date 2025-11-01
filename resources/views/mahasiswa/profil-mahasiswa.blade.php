@extends('layouts.main')

@section('title', 'Mahasiswa — Profil')
@section('page-title', 'Profil Mahasiswa')

@section('content')
    <main class="p-6">
            <div class="max-w-4xl mx-auto">
                <!-- Profile Header -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
                    <div class="md:flex">
                        <div class="md:flex-shrink-0 p-6 flex justify-center items-center bg-mint-light">
                            <img class="h-48 w-48 rounded-full object-cover border-4 border-white shadow-lg" 
                                 src="https://ui-avatars.com/api/?name=Putri+Narila&background=22c55e&color=fff&size=200" 
                                 alt="Putri Narila">
                        </div>
                        <div class="p-6 md:flex-1">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h2 class="text-2xl font-bold text-gray-900">Putri Narila</h2>
                                    <p class="text-gray-600">Mahasiswa Teknik Informatika</p>
                                </div>
                                <a href="edit-profil-mahasiswa.html" class="inline-flex items-center px-4 py-2 bg-mint text-white rounded-lg hover:bg-mint/90 transition-colors">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                        Edit Profil
                                    </a>
                            </div>
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <p class="text-sm text-gray-500">NIM</p>
                                    <p class="font-medium">NIM0001</p>
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
                                <p class="font-medium">putri@kampus.test</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">No. HP</p>
                                <p class="font-medium">+62 812-3456-7890</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Alamat</p>
                                <p class="font-medium">Jl. Mahasiswa No. 456, Kota Universitas</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Tempat, Tanggal Lahir</p>
                                <p class="font-medium">Jakarta, 15 Agustus 2003</p>
                            </div>
                        </div>
                    </div>                   

                    <!-- Academic Summary -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden md:col-span-2">
                        <div class="px-6 py-4 bg-mint-light border-b">
                            <h3 class="font-semibold text-gray-800">Ringkasan Akademik (Semester Ini)</h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                                <div class="bg-mint-light rounded-lg p-4">
                                    <p class="text-sm text-gray-600">Total SKS</p>
                                    <p class="text-2xl font-bold text-gray-800">20</p>
                                </div>
                                <div class="bg-mint-light rounded-lg p-4">
                                    <p class="text-sm text-gray-600">Mata Kuliah</p>
                                    <p class="text-2xl font-bold text-gray-800">6</p>
                                </div>
                                <div class="bg-mint-light rounded-lg p-4">
                                    <p class="text-sm text-gray-600">Tingkat Kehadiran</p>
                                    <p class="text-2xl font-bold text-gray-800">92%</p>
                                </div>
                                <div class="bg-mint-light rounded-lg p-4">
                                    <p class="text-sm text-gray-600">Semester</p>
                                    <p class="text-2xl font-bold text-gray-800">5</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection

@push('scripts')
    <script>
        // Current Time Update (handles different id variants)
        function updateTime() {
            const now = new Date();
            const el = document.getElementById('current-time') || document.getElementById('currentTime');
            if (el) el.textContent = now.toLocaleString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
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
                openSidebar.addEventListener('click', () => { sidebar.classList.toggle('-translate-x-full'); overlay.classList.toggle('hidden'); });
            }

            [overlay, closeSidebar].forEach(el => { if (!el || !sidebar) return; el.addEventListener('click', () => { sidebar.classList.add('-translate-x-full'); overlay.classList.add('hidden'); }); });
        })();
    </script>
@endpush
