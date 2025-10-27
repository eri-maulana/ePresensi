<!doctype html>
<html lang="id">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Admin — Rekap Presensi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              mint: {
                DEFAULT: "#A5F3DC",
                dark: "#7BD8BE",
                light: "#D2FFF1",
              },
            },
            fontFamily: {
              sans: ['"Poppins"', "ui-sans-serif", "system-ui"],
            },
          },
        },
      };
    </script>
  </head>
  <body class="bg-gray-50 font-sans">
    <!-- Sidebar -->
    <aside
      id="sidebar"
      class="fixed top-0 left-0 w-64 h-full bg-white border-r shadow-lg transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out z-50"
    >
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
        <a href="rekap-presensi.html" class="block py-2 px-3 rounded bg-mint text-gray-800 font-semibold">📊 Rekap Presensi</a>
      </nav>
    </aside>

    <div id="overlay" class="fixed inset-0 bg-black opacity-30 hidden z-40"></div>

    <div class="md:ml-64 min-h-screen flex flex-col">
      <!-- Topbar -->
      <header class="flex items-center justify-between bg-white border-b px-4 py-3 shadow-sm">
        <div class="flex items-center space-x-3">
          <button id="openSidebar" class="md:hidden text-gray-600 text-2xl">☰</button>
          <h2 class="text-lg font-semibold text-gray-700">Rekap Presensi</h2>
        </div>
        <a href="profil-admin.html" class="text-gray-600 font-medium">👤 Admin</a>
      </header>

      <main class="flex-1 p-6">
        <div class="max-w-6xl mx-auto">
          <div class="flex items-center justify-between mb-6">
            <div class="text-sm text-gray-500">Laporan &gt; Rekap Presensi</div>
            <div class="space-x-2">
              <a href="#" class="inline-flex items-center gap-2 bg-mint hover:bg-mint-dark text-gray-800 px-3 py-2 rounded-lg font-medium shadow">Export Excel</a>
            </div>
          </div>

          <!-- Filter card -->
          <div class="bg-white p-6 rounded-xl shadow-md mb-6">
            <h3 class="text-lg font-semibold text-gray-700">Filter</h3>
            <form class="mt-4 grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
              <div>
                <label class="block text-sm text-gray-600 mb-1">Tanggal Mulai</label>
                <input type="date" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-mint" />
              </div>
              <div>
                <label class="block text-sm text-gray-600 mb-1">Tanggal Akhir</label>
                <input type="date" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-mint" />
              </div>
              <div class="flex gap-2">
                <button type="submit" class="bg-mint hover:bg-mint-dark text-gray-800 px-4 py-2 rounded-lg font-medium shadow">Terapkan</button>
                <a href="#" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg font-medium">Reset</a>
              </div>
            </form>
          </div>

          <!-- Results table -->
          <div class="bg-white rounded-xl shadow overflow-hidden border">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-mint-light">
                <tr>
                  <th class="p-3 text-left font-semibold text-gray-700">Tanggal</th>
                  <th class="p-3 text-left font-semibold text-gray-700">Jumlah Hadir</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200 text-sm text-gray-700">
                <tr class="hover:bg-gray-50">
                  <td class="p-3">2025-10-25</td>
                  <td class="p-3">120</td>
                </tr>
                <tr class="hover:bg-gray-50">
                  <td class="p-3">2025-10-24</td>
                  <td class="p-3">110</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>

    <script>
      const sidebar = document.getElementById("sidebar");
      const overlay = document.getElementById("overlay");
      const openSidebar = document.getElementById("openSidebar");
      const closeSidebar = document.getElementById("closeSidebar");

      openSidebar.addEventListener("click", () => {
        sidebar.classList.remove("-translate-x-full");
        overlay.classList.remove("hidden");
      });

      closeSidebar.addEventListener("click", () => {
        sidebar.classList.add("-translate-x-full");
        overlay.classList.add("hidden");
      });

      overlay.addEventListener("click", () => {
        sidebar.classList.add("-translate-x-full");
        overlay.classList.add("hidden");
      });
    </script>
  </body>
</html>
