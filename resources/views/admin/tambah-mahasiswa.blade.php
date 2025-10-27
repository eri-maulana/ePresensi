<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tambah Mahasiswa - Admin</title>
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
        <button
          id="closeSidebar"
          class="md:hidden text-gray-500 hover:text-gray-700"
        >
          ✕
        </button>
      </div>
      <nav class="p-4 space-y-2">
        <a
          href="dashboard-admin.html"
          class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700"
          >🏠 Dashboard</a
        >
        <a
          href="data-kampus.html"
          class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700"
          >🏫 Data Kampus</a
        >
        <a
          href="data-mahasiswa.html"
          class="block py-2 px-3 rounded bg-mint text-gray-800 font-semibold"
          >🎓 Data Mahasiswa</a
        >
        <a
          href="data-dosen.html"
          class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700"
          >👨‍🏫 Data Dosen</a
        >
        <a
          href="data-mata-kuliah.html"
          class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700"
          >📘 Data Mata Kuliah</a
        >
        <a
          href="data-kelas.html"
          class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700"
          >🏷️ Data Kelas</a
        >
        <a
          href="data-jadwal.html"
          class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700"
          >🗓️ Data Jadwal</a
        >
        <a
          href="data-user.html"
          class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700"
          >👥 Data User</a
        >
        <a
          href="rekap-presensi.html"
          class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700"
          >📊 Rekap Presensi</a
        >
        <a
          href="pengaturan.html"
          class="block py-2 px-3 rounded hover:bg-mint-light text-gray-700"
          >⚙️ Pengaturan</a
        >
      </nav>
    </aside>

    <!-- Overlay for mobile -->
    <div
      id="overlay"
      class="fixed inset-0 bg-black opacity-30 hidden z-40"
    ></div>

    <!-- Main Content -->
    <div class="md:ml-64 min-h-screen flex flex-col">
      <!-- Topbar -->
      <header
        class="flex items-center justify-between bg-white border-b px-4 py-3 shadow-sm"
      >
        <div class="flex items-center space-x-3">
          <button id="openSidebar" class="md:hidden text-gray-600 text-2xl">
            ☰
          </button>
          <h2 class="text-lg font-semibold text-gray-700">Tambah Mahasiswa</h2>
        </div>
  <a href="profil-admin.html" class="text-gray-600 font-medium">👤 Admin</a>
      </header>

      <!-- Content -->
      <main class="flex-1 p-6">
        <div class="bg-white p-6 rounded-xl shadow-md max-w-3xl mx-auto">
          <h3 class="text-lg font-semibold text-gray-700 mb-5">
            Form Tambah Mahasiswa
          </h3>

          <form
            class="bg-white p-6 rounded-xl shadow-md border border-gray-100 max-w-2xl mx-auto space-y-5"
          >
            <!-- NIM -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">NIM</label>
              <select
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
              >
                <option value="">-- Pilih NIM Mahasiswa--</option>
                <option value="1">123</option>
                <option value="2">234</option>
                <option value="3">456</option>
              </select>
            </div>

            <!-- Nama -->
            <div>
              <label class="block text-gray-700 font-medium mb-2"
                >Nama Mahasiswa</label
              >
              <input
                disabled type="text"
                placeholder="Kolom ini terisi otomatis"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
              />
            </div>

            <!-- Email -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Email</label>
              <input
                disabled type="email"
                placeholder="Kolom ini terisi otomatis"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
              />
            </div>

            <!-- No HP -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">No. HP</label>
              <input
                disabled type="text"
                placeholder="Kolom ini terisi otomatis"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
              />
            </div>

            <!-- Alamat -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Alamat</label>
              <textarea disabled
                rows="3"
                placeholder="Kolom ini terisi otomatis"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
              ></textarea>
            </div>

            <!-- Kelas -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Kelas</label>
              <select
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
              >
                <option value="">-- Pilih Kelas --</option>
                <option value="1">TI-1A</option>
                <option value="2">TI-1B</option>
                <option value="3">SI-2A</option>
              </select>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end pt-4">
              <button
                type="submit"
                class="bg-mint hover:bg-emerald-200 text-gray-800 font-semibold px-6 py-2 rounded-lg shadow"
              >
                Simpan Data
              </button>
            </div>
          </form>
        </div>
      </main>
    </div>

    <!-- JS Sidebar -->
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
