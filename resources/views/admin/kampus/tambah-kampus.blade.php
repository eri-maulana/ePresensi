@extends('layouts.main')

@section('title', 'Admin — Tambah Kampus')
@section('page-title', 'Tambah Kampus')

@section('content')
      <!-- Content -->
      <main class="flex-1 p-6">
        <div class="bg-white p-6 rounded-xl shadow-md max-w-3xl mx-auto">
          <h3 class="text-lg font-semibold text-gray-700 mb-5">{{ isset($kampus) ? 'Ubah Kampus' : 'Form Tambah Kampus' }}</h3>

          @if($errors->any())
            <div class="mb-4 p-3 rounded bg-red-50 text-red-700">
              <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          @php
            $isEdit = isset($kampus);
          @endphp

          <form action="{{ $isEdit ? route('admin.ubah-kampus.update', $kampus) : route('admin.tambah-kampus.store') }}" method="POST" class="bg-white p-6 rounded-xl shadow-md border border-gray-100 max-w-2xl mx-auto space-y-5">
            @csrf
            @if($isEdit)
              @method('PUT')
            @endif

            <!-- Nama Kampus -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Nama Kampus <span class="text-red-500">*</span></label>
              <input
                name="nama_kampus"
                value="{{ old('nama_kampus', $kampus->nama_kampus ?? '') }}"
                type="text"
                placeholder="Contoh: Kampus Pusat"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
                maxlength="150"
                required
              />
              @error('nama_kampus')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Alamat -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Alamat</label>
              <textarea
                name="alamat"
                placeholder="Contoh: Jalan Pendidikan No. 123"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
                rows="3"
                maxlength="500"
              >{{ old('alamat', $kampus->alamat ?? '') }}</textarea>
              @error('alamat')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Latitude & Longitude (side by side) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block text-gray-700 font-medium mb-2">Latitude</label>
                <input
                  name="latitude"
                  value="{{ old('latitude', $kampus->latitude ?? '') }}"
                  type="number"
                  step="0.0000001"
                  placeholder="-6.1234567"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
                />
                @error('latitude')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div>
                <label class="block text-gray-700 font-medium mb-2">Longitude</label>
                <input
                  name="longitude"
                  value="{{ old('longitude', $kampus->longitude ?? '') }}"
                  type="number"
                  step="0.0000001"
                  placeholder="106.1234567"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
                />
                @error('longitude')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <!-- Radius Presensi -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Radius Presensi (meter)</label>
              <input
                name="radius_m"
                value="{{ old('radius_m', $kampus->radius_m ?? 300) }}"
                type="number"
                placeholder="300"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
                min="1"
                max="9999"
              />
              <p class="text-gray-500 text-sm mt-1">Jarak maksimal dari GPS untuk presensi diterima</p>
              @error('radius_m')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Telepon & Email (side by side) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <label class="block text-gray-700 font-medium mb-2">Telepon</label>
                <input
                  name="telepon"
                  value="{{ old('telepon', $kampus->telepon ?? '') }}"
                  type="text"
                  placeholder="Contoh: 021-1234567"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
                  maxlength="20"
                />
                @error('telepon')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>

              <div>
                <label class="block text-gray-700 font-medium mb-2">Email</label>
                <input
                  name="email"
                  value="{{ old('email', $kampus->email ?? '') }}"
                  type="email"
                  placeholder="Contoh: info@kampus.ac.id"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
                  maxlength="100"
                />
                @error('email')
                  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <!-- Website -->
            <div>
              <label class="block text-gray-700 font-medium mb-2">Website</label>
              <input
                name="website"
                value="{{ old('website', $kampus->website ?? '') }}"
                type="text"
                placeholder="Contoh: https://www.kampus.ac.id"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-mint"
                maxlength="100"
              />
              @error('website')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
              @enderror
            </div>

            <!-- Tombol -->
            <div class="flex justify-end pt-4">
              <a href="{{ route('admin.data-kampus') }}" 
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg font-medium shadow mr-2">
                Batal
              </a>
              <button
                type="submit"
                class="px-6 py-2.5 rounded-lg bg-mint text-white hover:bg-mint/90 transition-colors"
              >
                {{ $isEdit ? 'Perbarui' : 'Simpan' }}
              </button>
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

  if (openSidebar) {
    openSidebar.addEventListener("click", () => {
      sidebar.classList.remove("-translate-x-full");
      overlay.classList.remove("hidden");
    });
  }

  if (closeSidebar) {
    closeSidebar.addEventListener("click", () => {
      sidebar.classList.add("-translate-x-full");
      overlay.classList.add("hidden");
    });
  }

  if (overlay) {
    overlay.addEventListener("click", () => {
      sidebar.classList.add("-translate-x-full");
      overlay.classList.add("hidden");
    });
  }
</script>
@endpush
