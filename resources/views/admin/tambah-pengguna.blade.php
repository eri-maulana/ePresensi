@extends('layouts.main')

@section('title', 'Admin — Tambah Pengguna')
@section('page-title', 'Tambah Pengguna')

@section('content')
      <main class="flex-1">
        <div class="max-w-4xl mx-auto">
          <form class="space-y-6" enctype="multipart/form-data">
            <!-- Form Section -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-mint-light border-b">
                    <h3 class="font-semibold text-gray-800">Form Tambah Pengguna</h3>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input type="text" placeholder="Nama lengkap" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">NIM/NIDN</label>
                            <input type="text" placeholder="Nama lengkap" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" placeholder="user@kampus.test" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <input type="password" placeholder="Password" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                            <select class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">
                                <option value="">-- Pilih Role --</option>
                                <option value="admin">admin</option>
                                <option value="dosen">dosen</option>
                                <option value="mahasiswa">mahasiswa</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">No HP</label>
                            <input type="tel" placeholder="0812xxxxxxx" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent" />
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                            <textarea rows="3" placeholder="Alamat lengkap" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent"></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Photo Upload Section -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-mint-light border-b">
                    <h3 class="font-semibold text-gray-800">Foto Profil (Opsional)</h3>
                </div>
                <div class="p-6">
                    <div class="flex items-center space-x-6">
                        <div class="shrink-0">
                            <img id="avatarPreview" class="h-32 w-32 object-cover rounded-full" src="https://ui-avatars.com/api/?name=User&background=22c55e&color=fff&size=128" alt="Profile photo preview" />
                        </div>
                        <label class="block">
                            <span class="sr-only">Choose profile photo</span>
                            <input type="file" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-mint file:text-accent hover:file:bg-mint-light" />
                        </label>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end pt-4">
              <a href="data-pengguna.html" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium shadow mr-2">Batal</a>
              <button type="submit" class="px-6 py-2.5 rounded-lg bg-accent text-white hover:bg-accent/90 transition-colors">Simpan</button>
            </div>
          </form>
        </div>
      </main>
@endsection

@push('scripts')
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
@endpush