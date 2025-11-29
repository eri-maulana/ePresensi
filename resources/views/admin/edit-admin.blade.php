@extends('layouts.main')

@section('title', 'Edit Profil Admin')
@section('page-title', 'Edit Profil Admin')

@section('content')
    <div class="max-w-4xl mx-auto">
        <form action="{{ route('admin.update-profil') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            @if($errors->any())
                <div class="mb-4 p-3 rounded bg-red-50 text-red-700">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Photo Upload Section -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-mint-light border-b">
                    <h3 class="font-semibold text-gray-800">Foto Profil</h3>
                </div>
                <div class="p-6">
                    <div class="flex items-center space-x-6">
                        <div class="shrink-0">
                            @if($user->foto)
                                <img id="avatarPreview" class="h-32 w-32 object-cover rounded-full" src="{{ asset('storage/' . $user->foto) }}" alt="{{ $user->name }}" />
                            @else
                                <img id="avatarPreview" class="h-32 w-32 object-cover rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=A5F3DC&color=000&size=128" alt="{{ $user->name }}" />
                            @endif
                        </div>
                        <label class="block">
                            <span class="sr-only">Choose profile photo</span>
                            <input id="photoInput" name="foto" type="file" accept="image/*" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-mint file:text-accent hover:file:bg-mint-light" />
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
                            <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}" class="w-full rounded-lg border border-gray-300 shadow-sm focus:border-mint focus:ring-mint px-4 py-2">
                            @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}" class="w-full rounded-lg border border-gray-300 shadow-sm focus:border-mint focus:ring-mint px-4 py-2">
                            @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">No. HP</label>
                            <input id="no_hp" name="no_hp" type="tel" value="{{ old('no_hp', $user->no_hp ?? '') }}" class="w-full rounded-lg border border-gray-300 shadow-sm focus:border-mint focus:ring-mint px-4 py-2">
                            @error('no_hp') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Role</label>
                            <input type="text" value="{{ ucfirst($user->role) }}" disabled class="w-full rounded-lg border border-gray-300 bg-gray-50 shadow-sm px-4 py-2">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                            <textarea id="alamat" name="alamat" rows="3" class="w-full rounded-lg border border-gray-300 shadow-sm focus:border-mint focus:ring-mint px-4 py-2">{{ old('alamat', $user->alamat ?? '') }}</textarea>
                            @error('alamat') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
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
                            <input id="password" name="password" type="password" placeholder="Kosongkan jika tidak ingin mengubah" class="w-full rounded-lg border border-gray-300 shadow-sm focus:border-mint focus:ring-mint px-4 py-2">
                            @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Konfirmasi password baru" class="w-full rounded-lg border border-gray-300 shadow-sm focus:border-mint focus:ring-mint px-4 py-2">
                        </div>
                    </div>
                    <p class="text-sm text-gray-500">Kosongkan jika tidak ingin mengubah password (minimum 8 karakter)</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end pt-4">
              <a href="{{ route('admin.profil') }}" 
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium shadow mr-2">
                Batal
              </a>
              <button
                type="submit"
                class="px-6 py-2.5 rounded-lg bg-mint text-white hover:bg-mint/90 transition-colors"
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
</script>
@endpush