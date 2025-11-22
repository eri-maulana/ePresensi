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
    
    // Admin pengguna (custom paths) — gunakan halaman yang sudah Anda buat
    Route::get('/tambah-pengguna/create', [\App\Http\Controllers\Admin\UserController::class, 'create'])->name('admin.tambah-pengguna.create');
    Route::post('/tambah-pengguna', [\App\Http\Controllers\Admin\UserController::class, 'store'])->name('admin.tambah-pengguna.store');

    Route::get('/ubah-pengguna/{user}/edit', [\App\Http\Controllers\Admin\UserController::class, 'edit'])->name('admin.ubah-pengguna.edit');
    Route::put('/ubah-pengguna/{user}', [\App\Http\Controllers\Admin\UserController::class, 'update'])->name('admin.ubah-pengguna.update');
    Route::delete('/hapus-pengguna/{user}', [\App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('admin.hapus-pengguna');
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
