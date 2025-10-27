<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin — Edit Profil</title>
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
            <h1 class="text-lg font-bold text-gray-700">Admin Panel</h1>
            <button id="closeSidebar" class="md:hidden text-gray-500 hover:text-gray-700">✕</button>
        </div>
        <nav class="p-4 space-y-2">
            <a href="dashboard-admin.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">🏠 Dashboard</a>
            <a href="data-kampus.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">🏫 Data Kampus</a>
            <a href="data-mahasiswa.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">🎓 Data Mahasiswa</a>
            <a href="data-dosen.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">👨‍🏫 Data Dosen</a>
            <a href="data-mata-kuliah.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">📘 Data Mata Kuliah</a>
            <a href="data-kelas.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">🏷️ Data Kelas</a>
            <a href="data-jadwal.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">🗓️ Data Jadwal</a>
            <a href="data-pengguna.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">👥 Data Pengguna</a>
            <a href="rekap-presensi.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">📊 Rekap Presensi</a>
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
                    <h1 class="text-lg font-semibold text-gray-700">Edit Profil Admin</h1>
                </div>
                <div class="flex items-center gap-4">
                    <span id="current-time" class="text-sm text-gray-500">--:--:--</span>
                    <img src="https://ui-avatars.com/api/?name=Administrator&background=22c55e&color=fff" alt="Administrator" class="w-8 h-8 rounded-full">
                </div>
            </div>
        </header>

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
                                    <img id="avatarPreview" class="h-32 w-32 object-cover rounded-full"
                                         src="https://ui-avatars.com/api/?name=Administrator&background=22c55e&color=fff&size=128"
                                         alt="Current profile photo" />
                                </div>
                                <label class="block">
                                    <span class="sr-only">Choose profile photo</span>
                                    <input id="photoInput" type="file" accept="image/*"
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
                    <div class="flex justify-end gap-4">
                        <a href="profil-admin.html" class="px-6 py-2.5 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50 transition-colors">Batal</a>
                        <button id="saveBtn" type="button" class="px-6 py-2.5 rounded-lg bg-accent text-white hover:bg-accent/90 transition-colors">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </main>
    </div>

    <script>
        // Current Time Update
        function updateTime() {
            const now = new Date();
            const el = document.getElementById('current-time');
            if (el) el.textContent = now.toLocaleString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
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

        // Avatar preview
        document.getElementById('photoInput').addEventListener('change', function (e) {
            const [file] = this.files;
            if (!file) return;
            document.getElementById('avatarPreview').src = URL.createObjectURL(file);
        });

        // Mock save: basic validation and store to localStorage
        document.getElementById('saveBtn').addEventListener('click', () => {
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            if (!name || !email) {
                alert('Nama dan email wajib diisi.');
                return;
            }
            const data = {
                name,
                email,
                phone: document.getElementById('phone').value.trim(),
                address: document.getElementById('address').value.trim()
            };
            localStorage.setItem('adminProfile', JSON.stringify(data));
            alert('Perubahan disimpan (mock). Kembali ke halaman profil.');
            window.location.href = 'profil-admin.html';
        });
    </script>
</body>
</html>