<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

// ===================== ADMIN =====================
Route::prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('admin.dashboard');
    Route::get('/data-mahasiswa', 'dataMahasiswa')->name('admin.data-mahasiswa');
    Route::get('/data-dosen', 'dataDosen')->name('admin.data-dosen');
    Route::get('/data-mata-kuliah', 'dataMataKuliah')->name('admin.data-mata-kuliah');
    Route::get('/data-kelas', 'dataKelas')->name('admin.data-kelas');
    Route::get('/data-kampus', 'dataKampus')->name('admin.data-kampus');
    Route::get('/data-jadwal', 'dataJadwal')->name('admin.data-jadwal');
    Route::get('/data-pengguna', 'dataPengguna')->name('admin.data-pengguna');
    Route::get('/rekap-presensi', 'rekapPresensi')->name('admin.rekap-presensi');
    Route::get('/profil', 'profil')->name('admin.profil');
    Route::get('/edit', 'edit')->name('admin.edit');
    Route::get('/tambah-pengguna', 'tambahPengguna')->name('admin.tambah-pengguna');
    Route::get('/tambah-mata-kuliah', 'tambahMataKuliah')->name('admin.tambah-mata-kuliah');
    Route::get('/tambah-mahasiswa', 'tambahMahasiswa')->name('admin.tambah-mahasiswa');
    Route::get('/tambah-kelas', 'tambahKelas')->name('admin.tambah-kelas');
    Route::get('/tambah-kampus', 'tambahKampus')->name('admin.tambah-kampus');
    Route::get('/tambah-jadwal', 'tambahJadwal')->name('admin.tambah-jadwal');
});

// ===================== DOSEN =====================
Route::prefix('dosen')->controller(DosenController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('dosen.dashboard');
    Route::get('/jadwal-mengajar', 'jadwalMengajar')->name('dosen.jadwal-mengajar');
    Route::get('/daftar-mahasiswa', 'daftarMahasiswa')->name('dosen.daftar-mahasiswa');
    Route::get('/rekap-presensi', 'rekapPresensi')->name('dosen.rekap-presensi');
    Route::get('/profil', 'profil')->name('dosen.profil-dosen');
    Route::get('/edit', 'edit')->name('dosen.edit-profil');
});

// ===================== MAHASISWA =====================
Route::prefix('mahasiswa')->controller(MahasiswaController::class)->group(function () {
    Route::get('/dashboard', 'dashboard')->name('mahasiswa.dashboard');
    Route::get('/presensi', 'presensi')->name('mahasiswa.presensi');
    Route::get('/riwayat-presensi', 'riwayatPresensi')->name('mahasiswa.riwayat-presensi');
    Route::get('/profil', 'profil')->name('mahasiswa.profil-mahasiswa');
    Route::get('/edit-profil', 'editProfil')->name('mahasiswa.edit-profil');
});
