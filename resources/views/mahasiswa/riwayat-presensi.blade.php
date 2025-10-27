<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Riwayat Presensi Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              primary: "#D8F3DC",
              accent: "#40916C",
              sidebar: "#E9F7EF",
              textdark: "#1B4332",
              mint: "#D8F3DC",
              "mint-light": "#E9F7EF",
            },
            fontFamily: {
              sans: ["Inter", "system-ui", "sans-serif"],
            },
          },
        },
      };
    </script>
  </head>
  <body class="font-sans bg-[#F8FCFA] text-gray-800">
    <!-- Sidebar -->
    <aside
      id="sidebar"
      class="fixed top-0 left-0 w-64 h-full bg-white border-r shadow-lg transform -translate-x-full md:translate-x-0 transition-transform duration-200 ease-in-out z-50"
    >
      <div class="p-4 flex justify-between items-center border-b">
        <h1 class="text-lg font-bold text-gray-700">Panel Mahasiswa</h1>
        <button
          id="closeSidebar"
          class="md:hidden text-gray-500 hover:text-gray-700"
        >
          ✕
        </button>
      </div>
      <nav class="p-4 space-y-2">
        <a
          href="dashboard-mahasiswa.html"
          class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700"
          >🏠 Dashboard</a
        >
        <a
          href="presensi.html"
          class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700"
          >📝 Presensi</a
        >
        <a
          href="riwayat-presensi.html"
          class="block py-2 px-3 rounded bg-mint text-gray-800 font-semibold"
          >📅 Riwayat Presensi</a
        >
        <a
          href="profil-mahasiswa.html"
          class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700"
          >👤 Profil</a
        >
      </nav>
    </aside>

    <!-- Overlay for mobile -->
    <div
      id="overlay"
      class="fixed inset-0 bg-black opacity-30 hidden z-40"
    ></div>

    <!-- Main Content -->
    <div class="md:ml-64 transition-all duration-300">
      <header
        class="flex justify-between items-center bg-white shadow-sm px-6 py-4"
      >
        <div class="flex items-center gap-3">
          <button
            id="hamburger"
            class="md:hidden p-2 rounded-lg hover:bg-gray-100"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h16"
              />
            </svg>
          </button>
          <h1 class="text-lg font-semibold text-gray-700">Riwayat Presensi</h1>
        </div>
        <div class="text-sm text-gray-500 flex items-center gap-4">
          <span id="currentTime">--:--:--</span>
          <button
            class="bg-accent text-white px-3 py-1 rounded-md hover:bg-accent/90"
          >
            Logout
          </button>
        </div>
      </header>

      <main class="p-6 space-y-6">
        <!-- Filter and Search Section -->
        <div class="bg-white rounded-xl p-4 shadow">
          <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Mata Kuliah</label
              >
              <select
                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-accent/50"
              >
                <option value="">Semua Mata Kuliah</option>
                <option>Pemrograman Web</option>
                <option>Basis Data</option>
                <option>Algoritma</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Status</label
              >
              <select
                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-accent/50"
              >
                <option value="">Semua Status</option>
                <option>Hadir</option>
                <option>Sakit</option>
                <option>Izin</option>
                <option>Alpha</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Periode</label
              >
              <select
                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-accent/50"
              >
                <option>7 Hari Terakhir</option>
                <option>30 Hari Terakhir</option>
                <option>Semester Ini</option>
              </select>
            </div>
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-1"
                >Cari</label
              >
              <input
                type="text"
                placeholder="Cari..."
                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-accent/50"
              />
            </div>
          </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
          <div class="bg-white rounded-xl p-4 shadow">
            <div class="flex items-center gap-3">
              <div class="bg-green-100 p-3 rounded-lg">
                <svg
                  class="w-6 h-6 text-green-600"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M5 13l4 4L19 7"
                  />
                </svg>
              </div>
              <div>
                <p class="text-sm text-gray-500">Total Hadir</p>
                <h3 class="text-xl font-semibold">42</h3>
              </div>
            </div>
          </div>
          <div class="bg-white rounded-xl p-4 shadow">
            <div class="flex items-center gap-3">
              <div class="bg-yellow-100 p-3 rounded-lg">
                <svg
                  class="w-6 h-6 text-yellow-600"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"
                  />
                </svg>
              </div>
              <div>
                <p class="text-sm text-gray-500">Total Izin</p>
                <h3 class="text-xl font-semibold">3</h3>
              </div>
            </div>
          </div>
          <div class="bg-white rounded-xl p-4 shadow">
            <div class="flex items-center gap-3">
              <div class="bg-blue-100 p-3 rounded-lg">
                <svg
                  class="w-6 h-6 text-blue-600"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"
                  />
                </svg>
              </div>
              <div>
                <p class="text-sm text-gray-500">Total Sakit</p>
                <h3 class="text-xl font-semibold">2</h3>
              </div>
            </div>
          </div>
          <div class="bg-white rounded-xl p-4 shadow">
            <div class="flex items-center gap-3">
              <div class="bg-red-100 p-3 rounded-lg">
                <svg
                  class="w-6 h-6 text-red-600"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"
                  />
                </svg>
              </div>
              <div>
                <p class="text-sm text-gray-500">Total Alpha</p>
                <h3 class="text-xl font-semibold">1</h3>
              </div>
            </div>
          </div>
        </div>

        <!-- Attendance History Table -->
        <div class="bg-white rounded-xl shadow overflow-hidden">
          <div class="flex justify-between items-center p-4 border-b">
            <h2 class="text-lg font-semibold text-gray-800">
              Detail Riwayat Presensi
            </h2>
            <button
              class="flex items-center gap-2 text-accent hover:text-accent/80"
            >
              <svg
                class="w-5 h-5"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
              >
                <path
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"
                />
              </svg>
              Export Excel
            </button>
          </div>
          <div class="overflow-x-auto">
            <table class="min-w-full">
              <thead class="bg-gray-50">
                <tr>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Tanggal
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Mata Kuliah
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Dosen
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Waktu
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Status
                  </th>
                  <th
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                  >
                    Keterangan
                  </th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">25 Okt 2025</td>
                  <td class="px-6 py-4">Pemrograman Web</td>
                  <td class="px-6 py-4">Pak Budi</td>
                  <td class="px-6 py-4">07:15</td>
                  <td class="px-6 py-4">
                    <span
                      class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800"
                      >Hadir</span
                    >
                  </td>
                  <td class="px-6 py-4">Tepat Waktu</td>
                </tr>
                <tr class="bg-gray-50">
                  <td class="px-6 py-4 whitespace-nowrap">24 Okt 2025</td>
                  <td class="px-6 py-4">Basis Data</td>
                  <td class="px-6 py-4">Ibu Sarah</td>
                  <td class="px-6 py-4">07:12</td>
                  <td class="px-6 py-4">
                    <span
                      class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800"
                      >Hadir</span
                    >
                  </td>
                  <td class="px-6 py-4">Tepat Waktu</td>
                </tr>
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">23 Okt 2025</td>
                  <td class="px-6 py-4">Algoritma</td>
                  <td class="px-6 py-4">Pak Ahmad</td>
                  <td class="px-6 py-4">-</td>
                  <td class="px-6 py-4">
                    <span
                      class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800"
                      >Sakit</span
                    >
                  </td>
                  <td class="px-6 py-4">Surat Dokter</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Pagination -->
          <div class="flex items-center justify-between px-6 py-3 bg-gray-50">
            <div class="flex items-center gap-2">
              <span class="text-sm text-gray-500">Rows per page:</span>
              <select class="border rounded px-2 py-1 text-sm">
                <option>10</option>
                <option>25</option>
                <option>50</option>
              </select>
            </div>
            <div class="flex items-center gap-2">
              <button class="p-2 rounded hover:bg-gray-200">
                <svg
                  class="w-5 h-5"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M15 19l-7-7 7-7"
                  />
                </svg>
              </button>
              <span class="text-sm text-gray-500">Page 1 of 5</span>
              <button class="p-2 rounded hover:bg-gray-200">
                <svg
                  class="w-5 h-5"
                  fill="none"
                  stroke="currentColor"
                  viewBox="0 0 24 24"
                >
                  <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M9 5l7 7-7 7"
                  />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </main>
    </div>

    <script>
      // Update current time
      function updateTime() {
        const now = new Date();
        document.getElementById("currentTime").textContent = now.toLocaleString(
          "id-ID",
          {
            hour: "2-digit",
            minute: "2-digit",
            second: "2-digit",
          }
        );
      }
      setInterval(updateTime, 1000);
      updateTime();

      // Sidebar toggle
      const sidebar = document.getElementById("sidebar");
      const overlay = document.getElementById("overlay");
      const hamburger = document.getElementById("hamburger");

      hamburger.addEventListener("click", () => {
        sidebar.classList.toggle("-translate-x-full");
        overlay.classList.toggle("hidden");
      });

      overlay.addEventListener("click", () => {
        sidebar.classList.add("-translate-x-full");
        overlay.classList.add("hidden");
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
