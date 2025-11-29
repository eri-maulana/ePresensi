@extends('layouts.main')

@section('title', 'Profil Admin')
@section('page-title', 'Profil Admin')

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Profile Header -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden mb-6">
            <div class="md:flex">
                <div class="md:flex-shrink-0 p-6 flex justify-center items-center ">
                    @if($user->foto)
                        <img class="h-48 w-48 rounded-full object-cover border-4 border-white shadow-lg" src="{{ asset('storage/' . $user->foto) }}" alt="{{ $user->name }}">
                    @else
                        <img class="h-48 w-48 rounded-full object-cover border-4 border-white shadow-lg" src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=A5F3DC&color=000&size=200" alt="{{ $user->name }}">
                    @endif
                </div>
                <div class="p-6 md:flex-1">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h2>
                            <p class="text-gray-600">{{ ucfirst($user->role) }}</p>
                        </div>
                        <a href="{{ route('admin.edit') }}" class="inline-flex items-center px-4 py-2 bg-mint text-white rounded-lg hover:bg-mint/90 transition-colors">
                            ✏️ Edit Profil
                        </a>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <p class="text-sm text-gray-500">Email</p>
                            <p class="font-medium">{{ $user->email }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">No. HP</p>
                            <p class="font-medium">{{ $user->no_hp ?? '-' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profile Details -->
        <div class="grid grid-cols-1 md:grid-cols-1 gap-6">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-mint-light border-b">
                    <h3 class="font-semibold text-gray-800">Informasi Akun</h3>
                </div>
                <div class="p-6 space-y-4">
                    <div>
                        <p class="text-sm text-gray-500">Nama Lengkap</p>
                        <p class="font-medium">{{ $user->name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Role</p>
                        <p class="font-medium">{{ ucfirst($user->role) }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Alamat</p>
                        <p class="font-medium">{{ $user->alamat ?? '-' }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Kode Identitas</p>
                        <p class="font-medium">{{ $user->kode_identitas ?? '-' }}</p>
                    </div>
                </div>
            </div>
        </div>

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

    // Sidebar toggle (using elements from layout)
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

    [overlay, closeSidebar].forEach(el => {
        if (!el) return;
        el.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    });
</script>
@endpush
