@extends('layouts.main')

@section('title', 'Admin — Tambah Pengguna')
@section('page-title', 'Tambah Pengguna')

@section('content')
      <main class="flex-1">
        <div class="max-w-4xl mx-auto">
          <form class="space-y-6" enctype="multipart/form-data"
                action="{{ isset($user) ? route('admin.ubah-pengguna.update', $user) : route('admin.tambah-pengguna.store') }}"
                method="POST">
            @csrf
            @if(isset($user))
                @method('PUT')
            @endif
            <!-- Form Section -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-mint-light border-b">
                    <h3 class="font-semibold text-gray-800">Form Tambah Pengguna</h3>
                </div>
                <div class="p-6 space-y-6">
                                        @if($errors->any())
                                            <div class="mb-4 rounded border border-red-200 bg-red-50 p-3 text-sm text-red-700">
                                                <ul class="list-disc ml-5">
                                                    @foreach($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input id="inputName" name="name" type="text" placeholder="Nama lengkap" value="{{ old('name', $user->name ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent" />
                            @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">NIM/NIDN</label>
                            <input name="kode_identitas" type="text" placeholder="NIM/NIDN" value="{{ old('kode_identitas', $user->kode_identitas ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent" />
                            @error('kode_identitas') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input name="email" type="email" placeholder="user@kampus.test" value="{{ old('email', $user->email ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent" />
                            @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                            <input name="password" type="password" placeholder="Password" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent" />
                            @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                                                                                    <div class="relative">
                                                                                        <select id="selectRole" name="role" class="block w-full appearance-none rounded-lg border border-gray-300 bg-white py-2 pl-3 pr-10 text-sm shadow-sm focus:border-accent focus:ring-accent">
                                                                                                <option value="">-- Pilih Role --</option>
                                                                                                <option value="admin" {{ old('role', $user->role ?? '') == 'admin' ? 'selected' : '' }}>admin</option>
                                                                                                <option value="dosen" {{ old('role', $user->role ?? '') == 'dosen' ? 'selected' : '' }}>dosen</option>
                                                                                                <option value="mahasiswa" {{ old('role', $user->role ?? '') == 'mahasiswa' ? 'selected' : '' }}>mahasiswa</option>
                                                                                        </select>
                                                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                                                <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                                                    @error('role') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        
                        <div id="kelasContainer">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kelas (jika mahasiswa)</label>
                            <div class="relative">
                                <select id="selectKelas" name="kelas_id" class="block w-full appearance-none rounded-lg border border-gray-300 bg-white py-2 pl-3 pr-10 text-sm shadow-sm focus:border-accent focus:ring-accent">
                                    <option value="">-- Pilih Kelas --</option>
                                    @if(isset($kelas))
                                        @foreach($kelas as $k)
                                            <option value="{{ $k->id }}" {{ old('kelas_id', $user->mahasiswa->kelas_id ?? '') == $k->id ? 'selected' : '' }}>{{ $k->nama_kelas }} {{ $k->tahun_ajaran ? '(' . $k->tahun_ajaran . ')' : '' }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                                    <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                            @error('kelas_id') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div id="nohpContainer">
                            <label class="block text-sm font-medium text-gray-700 mb-2">No HP</label>
                            <input name="no_hp" type="tel" placeholder="0812xxxxxxx" value="{{ old('no_hp', $user->no_hp ?? '') }}" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent" />
                            @error('no_hp') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div id="alamatContainer" class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                            <textarea name="alamat" rows="3" placeholder="Alamat lengkap" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-accent focus:ring-accent">{{ old('alamat', $user->alamat ?? '') }}</textarea>
                            @error('alamat') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
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
                            <input name="foto" type="file" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-mint file:text-accent hover:file:bg-mint-light" />
                        </label>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end pt-4">
                              <a href="{{ url()->previous() }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium shadow mr-2">Batal</a>
                            <button type="submit" class="px-6 py-2.5 rounded-lg bg-mint text-white hover:bg-mint/90 transition-colors">{{ isset($user) ? 'Perbarui' : 'Simpan' }}</button>
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
<script>
    // Form UX: photo preview + role-based visibility/layout
    document.addEventListener('DOMContentLoaded', function () {
        const selectRole = document.getElementById('selectRole');
        const kelasContainer = document.getElementById('kelasContainer');
        const nohpContainer = document.getElementById('nohpContainer');
        const alamatContainer = document.getElementById('alamatContainer');
        const fotoInput = document.querySelector('input[name="foto"]');
        const avatarPreview = document.getElementById('avatarPreview');

        function updateRoleUI() {
            const role = selectRole ? selectRole.value : '';
            if (role === 'mahasiswa') {
                // show kelas and make alamat side-by-side with no_hp on md
                if (kelasContainer) kelasContainer.style.display = '';
                if (alamatContainer) {
                    alamatContainer.classList.remove('md:col-span-2');
                }
            } else {
                if (kelasContainer) kelasContainer.style.display = 'none';
                if (alamatContainer) {
                    alamatContainer.classList.add('md:col-span-2');
                }
            }
        }

        // initialize state (use server-side selected value if any)
        if (selectRole) {
            updateRoleUI();
            selectRole.addEventListener('change', updateRoleUI);
        }

        // photo preview
        if (fotoInput && avatarPreview) {
            fotoInput.addEventListener('change', function (e) {
                const file = e.target.files && e.target.files[0];
                if (!file) return;
                const url = URL.createObjectURL(file);
                avatarPreview.src = url;
            });
        }
    });
</script>
@endpush