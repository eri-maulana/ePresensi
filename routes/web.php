<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProfileController;

// Default
Route::redirect('/', '/login');

// ========== ADMIN ==========
Route::middleware(['auth'])->prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/data-mahasiswa', 'dataMahasiswa')->name('admin.data-mahasiswa');
    Route::get('/data-dosen', 'dataDosen')->name('admin.data-dosen');
    Route::get('/data-mata-kuliah', 'dataMataKuliah')->name('admin.data-mata-kuliah');
    Route::get('/data-kelas', 'dataKelas')->name('admin.data-kelas');
    Route::get('/data-kampus', 'dataKampus')->name('admin.data-kampus');
    Route::get('/data-jadwal', 'dataJadwal')->name('admin.data-jadwal');
    Route::get('/data-pengguna', 'dataPengguna')->name('admin.data-pengguna');
        // detail pengguna
        Route::get('/detail-pengguna/{user}', [\App\Http\Controllers\Admin\UserController::class, 'show'])->name('admin.detail-pengguna');
    Route::get('/rekap-presensi', 'rekapPresensi')->name('admin.rekap-presensi');
    Route::get('/profil', 'profil')->name('admin.profil');
    Route::get('/edit', 'edit')->name('admin.edit');
    Route::get('/tambah-pengguna', 'tambahPengguna')->name('admin.tambah-pengguna');
    Route::get('/tambah-mata-kuliah', 'tambahMataKuliah')->name('admin.tambah-mata-kuliah');
    Route::get('/tambah-mahasiswa', 'tambahMahasiswa')->name('admin.tambah-mahasiswa');
    Route::get('/tambah-kelas', 'tambahKelas')->name('admin.tambah-kelas');
    Route::get('/tambah-kampus', 'tambahKampus')->name('admin.tambah-kampus');
    Route::get('/tambah-jadwal', 'tambahJadwal')->name('admin.tambah-jadwal');
    
    // Admin kelas (custom CRUD routes)
    Route::get('/tambah-kelas/create', [\App\Http\Controllers\Admin\KelasController::class, 'create'])->name('admin.tambah-kelas.create');
    Route::post('/tambah-kelas', [\App\Http\Controllers\Admin\KelasController::class, 'store'])->name('admin.tambah-kelas.store');

    Route::get('/ubah-kelas/{kelas}/edit', [\App\Http\Controllers\Admin\KelasController::class, 'edit'])->name('admin.ubah-kelas.edit');
    Route::put('/ubah-kelas/{kelas}', [\App\Http\Controllers\Admin\KelasController::class, 'update'])->name('admin.ubah-kelas.update');
    Route::delete('/hapus-kelas/{kelas}', [\App\Http\Controllers\Admin\KelasController::class, 'destroy'])->name('admin.hapus-kelas');
    Route::get('/detail-kelas/{kelas}', [\App\Http\Controllers\Admin\KelasController::class, 'show'])->name('admin.detail-kelas');
    
    // Admin pengguna (custom paths) — gunakan halaman yang sudah Anda buat
    Route::get('/tambah-pengguna/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.tambah-pengguna.create');
    Route::post('/tambah-pengguna', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.tambah-pengguna.store');

    Route::get('/ubah-pengguna/{user}/edit', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.ubah-pengguna.edit');
    Route::put('/ubah-pengguna/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.ubah-pengguna.update');
    Route::delete('/hapus-pengguna/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.hapus-pengguna');

    // Admin mata kuliah (custom CRUD routes)
    Route::get('/tambah-mata-kuliah/create', [\App\Http\Controllers\Admin\MataKuliahController::class, 'create'])->name('admin.tambah-mata-kuliah.create');
    Route::post('/tambah-mata-kuliah', [\App\Http\Controllers\Admin\MataKuliahController::class, 'store'])->name('admin.tambah-mata-kuliah.store');

    Route::get('/ubah-mata-kuliah/{mataKuliah}/edit', [\App\Http\Controllers\Admin\MataKuliahController::class, 'edit'])->name('admin.ubah-mata-kuliah.edit');
    Route::put('/ubah-mata-kuliah/{mataKuliah}', [\App\Http\Controllers\Admin\MataKuliahController::class, 'update'])->name('admin.ubah-mata-kuliah.update');
    Route::delete('/hapus-mata-kuliah/{mataKuliah}', [\App\Http\Controllers\Admin\MataKuliahController::class, 'destroy'])->name('admin.hapus-mata-kuliah');
    Route::get('/detail-mata-kuliah/{mataKuliah}', [\App\Http\Controllers\Admin\MataKuliahController::class, 'show'])->name('admin.detail-mata-kuliah');

    // Admin kampus (custom CRUD routes)
    Route::get('/tambah-kampus/create', [\App\Http\Controllers\Admin\KampusController::class, 'create'])->name('admin.tambah-kampus.create');
    Route::post('/tambah-kampus', [\App\Http\Controllers\Admin\KampusController::class, 'store'])->name('admin.tambah-kampus.store');

    Route::get('/ubah-kampus/{kampus}/edit', [\App\Http\Controllers\Admin\KampusController::class, 'edit'])->name('admin.ubah-kampus.edit');
    Route::put('/ubah-kampus/{kampus}', [\App\Http\Controllers\Admin\KampusController::class, 'update'])->name('admin.ubah-kampus.update');
    Route::delete('/hapus-kampus/{kampus}', [\App\Http\Controllers\Admin\KampusController::class, 'destroy'])->name('admin.hapus-kampus');
    Route::get('/detail-kampus/{kampus}', [\App\Http\Controllers\Admin\KampusController::class, 'show'])->name('admin.detail-kampus');
});

// ========== DOSEN ==========
Route::middleware(['auth'])->prefix('dosen')->controller(DosenController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dosen.dashboard');
    Route::get('/jadwal-mengajar', 'jadwalMengajar')->name('dosen.jadwal-mengajar');
    Route::get('/daftar-mahasiswa', 'daftarMahasiswa')->name('dosen.daftar-mahasiswa');
    Route::get('/rekap-presensi', 'rekapPresensi')->name('dosen.rekap-presensi');
    Route::get('/profil', 'profil')->name('dosen.profil-dosen');
    Route::get('/edit', 'edit')->name('dosen.edit-profil');
});

// ========== MAHASISWA ==========
Route::middleware(['auth'])->prefix('mahasiswa')->controller(MahasiswaController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('mahasiswa.dashboard');
    Route::get('/presensi', 'presensi')->name('mahasiswa.presensi');
    Route::post('/presensi', 'storePresensi')->name('mahasiswa.presensi.store');
    Route::get('/riwayat-presensi', 'riwayatPresensi')->name('mahasiswa.riwayat-presensi');
    Route::get('/profil', 'profil')->name('mahasiswa.profil-mahasiswa');
    Route::get('/edit-profil', 'editProfil')->name('mahasiswa.edit-profil');
});

require __DIR__ . '/auth.php';
