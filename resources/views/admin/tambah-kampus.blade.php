<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tambah Kampus - Admin</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            mint: {
              DEFAULT: '#A5F3DC',
              dark: '#7BD8BE',
              light: '#D2FFF1',
            },
          },
          fontFamily: {
            sans: ['"Poppins"', 'ui-sans-serif', 'system-ui'],
          },
        },
      },
    }
  </script>
</head>

<body class="bg-gray-50 font-sans">
  <!-- Sidebar -->
  <aside id="sidebar"
    class="fixed top-0 left-0 w-64 h-full bg-white border-r shadow-lg transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out z-50">
    <div class="p-4 flex justify-between items-center border-b">
      <h1 class="text-lg font-bold text-gray-700">Admin Panel</h1>
      <button id="closeSidebar" class="md:hidden text-gray-500 hover:text-gray-700">
        ✕
      </button>
    </div>
    <nav class="p-4 space-y-2">
      <a href="dashboard-admin.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">🏠 Dashboard</a>
      <a href="data-kampus.html" class="block py-2 px-3 rounded bg-mint text-gray-800 font-semibold">🏫 Data Kampus</a>
      <a href="data-mahasiswa.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">🎓 Data Mahasiswa</a>
      <a href="data-dosen.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">👨‍🏫 Data Dosen</a>
      <a href="data-mata-kuliah.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">📘 Data Mata Kuliah</a>
      <a href="data-kelas.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">🏷️ Data Kelas</a>
      <a href="data-jadwal.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">🗓️ Data Jadwal</a>
      <a href="data-user.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">👥 Data User</a>
      <a href="rekap-presensi.html" class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700">📊 Rekap Presensi</a>
    </nav>
  </aside>

  <!-- Overlay for mobile -->
  <div id="overlay" class="fixed inset-0 bg-black opacity-30 hidden z-40"></div>

  <!-- Main Content -->
  <div class="md:ml-64 min-h-screen flex flex-col">
    <!-- Topbar -->
    <header class="flex items-center justify-between bg-white border-b px-4 py-3 shadow-sm">
      <div class="flex items-center space-x-3">
        <button id="openSidebar" class="md:hidden text-gray-600 text-2xl">☰</button>
        <h2 class="text-lg font-semibold text-gray-700">Tambah Kampus</h2>
      </div>
  <a href="profil-admin.html" class="text-gray-600 font-medium">👤 Admin</a>
    </header>

    <!-- Content -->
    <main class="flex-1 p-6">
      <div class="bg-white p-6 rounded-xl shadow-md max-w-3xl mx-auto">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">Form Tambah Kampus</h3>
        <form action="data-kampus.html" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <!-- Nama Kampus -->
          <div class="col-span-2">
            <label class="block text-gray-600 font-medium mb-1">Nama Kampus</label>
            <input type="text" placeholder="Masukkan nama kampus"
              class="w-full border rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-mint-dark" required />
          </div>

          <!-- Alamat -->
          <div class="col-span-2">
            <label class="block text-gray-600 font-medium mb-1">Alamat</label>
            <textarea placeholder="Masukkan alamat kampus"
              class="w-full border rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-mint-dark" rows="3" required></textarea>
          </div>

          <!-- Latitude -->
          <div>
            <label class="block text-gray-600 font-medium mb-1">Latitude</label>
            <input type="number" step="0.0000001" placeholder="-6.1234567"
              class="w-full border rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-mint-dark" required />
          </div>

          <!-- Longitude -->
          <div>
            <label class="block text-gray-600 font-medium mb-1">Longitude</label>
            <input type="number" step="0.0000001" placeholder="107.1234567"
              class="w-full border rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-mint-dark" required />
          </div>

          <!-- Radius -->
          <div>
            <label class="block text-gray-600 font-medium mb-1">Radius (meter)</label>
            <input type="number" placeholder="300"
              class="w-full border rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-mint-dark" required />
          </div>

          <!-- Telepon -->
          <div>
            <label class="block text-gray-600 font-medium mb-1">Telepon</label>
            <input type="text" placeholder="08xxxxxx"
              class="w-full border rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-mint-dark" />
          </div>

          <!-- Email -->
          <div>
            <label class="block text-gray-600 font-medium mb-1">Email</label>
            <input type="email" placeholder="info@kampus.ac.id"
              class="w-full border rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-mint-dark" />
          </div>

          <!-- Website -->
          <div>
            <label class="block text-gray-600 font-medium mb-1">Website</label>
            <input type="url" placeholder="https://kampus.ac.id"
              class="w-full border rounded-lg p-2.5 focus:outline-none focus:ring-2 focus:ring-mint-dark" />
          </div>

          <!-- Tombol -->
          <div class="col-span-2 flex justify-end space-x-3 pt-4">
            <a href="data-kampus.html"
              class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium">Batal</a>
            <button type="submit"
              class="bg-mint-dark hover:bg-mint text-gray-800 px-5 py-2 rounded-lg font-medium shadow">
              Simpan
            </button>
          </div>
        </form>
      </div>
    </main>
  </div>

  <!-- JS Sidebar -->
  <script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const openSidebar = document.getElementById('openSidebar');
    const closeSidebar = document.getElementById('closeSidebar');

    openSidebar.addEventListener('click', () => {
      sidebar.classList.remove('-translate-x-full');
      overlay.classList.remove('hidden');
    });

    closeSidebar.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });

    overlay.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });
  </script>
</body>
</html>
