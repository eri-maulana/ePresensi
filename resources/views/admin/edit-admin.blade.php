@extends('layouts.main')

@section('title', 'Edit Profil Admin')
@section('page-title', 'Edit Profil Admin')

@section('content')
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
                            <img id="avatarPreview" class="h-32 w-32 object-cover rounded-full" src="https://ui-avatars.com/api/?name=Administrator&background=22c55e&color=fff&size=128" alt="Current profile photo" />
                        </div>
                        <label class="block">
                            <span class="sr-only">Choose profile photo</span>
                            <input id="photoInput" type="file" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-mint file:text-accent hover:file:bg-mint-light" />
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
                            <input id="name" type="text" value="Administrator" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                            <input id="username" type="text" value="admin" disabled class="w-full rounded-lg border-gray-300 bg-gray-50 shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input id="email" type="email" value="admin@kampus.test" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">No. HP</label>
                            <input id="phone" type="tel" value="08123456789" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                            <textarea id="address" rows="3" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">Jl. Administrasi No. 1</textarea>
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
                            <input id="password" type="password" placeholder="Masukkan password baru" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                            <input id="passwordConfirm" type="password" placeholder="Konfirmasi password baru" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">
                        </div>
                    </div>
                    <p class="text-sm text-gray-500">Kosongkan jika tidak ingin mengubah password</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end pt-4">
              <a href="data-jadwal.html" 
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium shadow mr-2">
                Batal
              </a>
              <button
                type="submit"
                class="px-6 py-2.5 rounded-lg bg-accent text-white hover:bg-accent/90 transition-colors"
              >
                Simpan 
              </button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
<script>
    // Current Time Update
    function updateTime() {
        const now = new Date();
        const el = document.getElementById('current-time');
        if (el) el.textContent = now.toLocaleString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    }
    setInterval(updateTime, 1000);
    updateTime();

    // Sidebar toggle (layout-provided elements)
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const hamburger = document.getElementById('hamburger');
    const closeSidebar = document.getElementById('closeSidebar');

    if (hamburger) {
        hamburger.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });
    }

    [overlay, closeSidebar].forEach(el => { if (!el) return; el.addEventListener('click', () => { sidebar.classList.add('-translate-x-full'); overlay.classList.add('hidden'); }); });

    // Avatar preview
    const photoInput = document.getElementById('photoInput');
    if (photoInput) {
        photoInput.addEventListener('change', function () {
            const [file] = this.files;
            if (!file) return;
            const preview = document.getElementById('avatarPreview');
            if (preview) preview.src = URL.createObjectURL(file);
        });
    }

    // Mock save: basic validation and store to localStorage
    const saveBtn = document.getElementById('saveBtn');
    if (saveBtn) {
        saveBtn.addEventListener('click', () => {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            if (!name || !email) {
                alert('Nama dan email wajib diisi.');
                return;
            }
            const data = { name, email, phone: document.getElementById('phone').value.trim(), address: document.getElementById('address').value.trim() };
            localStorage.setItem('adminProfile', JSON.stringify(data));
            alert('Perubahan disimpan (mock). Kembali ke halaman profil.');
            window.location.href = '#';
        });
    }
</script>
@endpush