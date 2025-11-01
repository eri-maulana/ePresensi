@extends('layouts.main')

@section('title', 'Mahasiswa — Edit Profil')
@section('page-title', 'Edit Profil Mahasiswa')

@section('content')
    <main class="p-6">
            <div class="max-w-4xl mx-auto">
                <form class="space-y-6">
                    <!-- Photo Upload Section -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="px-6 py-4 bg-mint-light border-b">
                            <h3 class="font-semibold text-gray-800">Foto Profil</h3>
                        </div>
                        <div class="p-6">
                            <div class="flex items-center space-x-6">
                                <div class="shrink-0">
                                    <img class="h-32 w-32 object-cover rounded-full"
                                         src="https://ui-avatars.com/api/?name=Putri+Narila&background=22c55e&color=fff&size=128"
                                         alt="Current profile photo" />
                                </div>
                                <label class="block">
                                    <span class="sr-only">Choose profile photo</span>
                                    <input type="file" accept="image/*"
                                           class="block w-full text-sm text-gray-500
                                                  file:mr-4 file:py-2 file:px-4
                                                  file:rounded-full file:border-0
                                                  file:text-sm file:font-semibold
                                                  file:bg-mint file:text-accent
                                                  hover:file:bg-mint-light"/>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Personal Information -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="px-6 py-4 bg-mint-light border-b">
                            <h3 class="font-semibold text-gray-800">Informasi Pribadi</h3>
                        </div>
                        <div class="p-6 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                    <input type="text" value="Putri Narila" 
                                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                    <input type="email" value="putri@kampus.test"
                                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">No. HP</label>
                                    <input type="tel" value="+62 812-3456-7890"
                                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                                    <textarea rows="3" 
                                              class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">Jl. Mahasiswa No. 456, Kota Universitas</textarea>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tempat, Tanggal Lahir</label>
                                    <input type="text" value="Jakarta, 15 Agustus 2003"
                                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">
                                </div>
                                
                            </div>
                        </div>
                    </div>


                    <!-- Password Change -->
                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        <div class="px-6 py-4 bg-mint-light border-b">
                            <h3 class="font-semibold text-gray-800">Ubah Password</h3>
                        </div>
                        <div class="p-6 space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Password Baru</label>
                                    <input type="password" placeholder="Masukkan password baru"
                                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                                    <input type="password" placeholder="Konfirmasi password baru"
                                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">
                                </div>
                            </div>
                            <p class="text-sm text-gray-500">Kosongkan jika tidak ingin mengubah password</p>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-end gap-4">
                        <a href="profil-mahasiswa.html" 
                           class="px-6 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 transition-colors">
                            Batal
                        </a>
                        <button type="submit" 
                                class="px-6 py-2.5 rounded-lg bg-mint text-white hover:bg-mint/90 transition-colors">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
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