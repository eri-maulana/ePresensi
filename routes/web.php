<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Admin
Route::view('/admin/dashboard', 'admin.dashboard-admin');
Route::view('/admin/data-mahasiswa', 'admin.data-mahasiswa');
Route::view('/admin/data-dosen', 'admin.data-dosen');
Route::view('/admin/data-mata-kuliah', 'admin.data-mata-kuliah');
Route::view('/admin/data-kelas', 'admin.data-kelas');
Route::view('/admin/data-kampus', 'admin.data-kampus');
Route::view('/admin/data-jadwal', 'admin.data-jadwal');
Route::view('/admin/data-pengguna', 'admin.data-pengguna');
Route::view('/admin/rekap-presensi', 'admin.rekap-presensi');
Route::view('/admin/profil', 'admin.profil-admin');
Route::view('/admin/edit', 'admin.edit-admin');
Route::view('/admin/tambah-pengguna', 'admin.tambah-pengguna');
Route::view('/admin/tambah-mata-kuliah', 'admin.tambah-mata-kuliah');
Route::view('/admin/tambah-mahasiswa', 'admin.tambah-mahasiswa');
Route::view('/admin/tambah-kelas', 'admin.tambah-kelas');
Route::view('/admin/tambah-kampus', 'admin.tambah-kampus');
Route::view('/admin/tambah-jadwal', 'admin.tambah-jadwal');

// Dosen
Route::view('/dosen/dashboard', 'dosen.dashboard-dosen');
Route::view('/dosen/jadwal-mengajar', 'dosen.jadwal-mengajar');
Route::view('/dosen/daftar-mahasiswa', 'dosen.daftar-mahasiswa');
Route::view('/dosen/rekap-presensi', 'dosen.rekap-presensi');
Route::view('/dosen/profil', 'dosen.profil-dosen');
Route::view('/dosen/edit', 'dosen.edit-profil-dosen');

// Mahasiswa
Route::view('/mahasiswa/dashboard', 'mahasiswa.dashboard-mahasiswa');
Route::view('/mahasiswa/presensi', 'mahasiswa.presensi');
Route::view('/mahasiswa/riwayat-presensi', 'mahasiswa.riwayat-presensi');
Route::view('/mahasiswa/profil', 'mahasiswa.profil-mahasiswa');
Route::view('/mahasiswa/edit-profil', 'mahasiswa.edit-profil-mahasiswa');