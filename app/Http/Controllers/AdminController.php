<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{
    public function dashboard() { return view('admin.dashboard-admin'); }
    public function dataMahasiswa() { return view('admin.data-mahasiswa'); }
    public function dataDosen() { return view('admin.data-dosen'); }
    public function dataMataKuliah() { return view('admin.data-mata-kuliah'); }
    public function dataKelas() { return view('admin.data-kelas'); }
    public function dataKampus() { return view('admin.data-kampus'); }
    public function dataJadwal() { return view('admin.data-jadwal'); }
    public function dataPengguna() { return view('admin.data-pengguna'); }
    public function rekapPresensi() { return view('admin.rekap-presensi'); }
    public function profil() { return view('admin.profil-admin'); }
    public function edit() { return view('admin.edit-admin'); }
    public function tambahPengguna() { return view('admin.tambah-pengguna'); }
    public function tambahMataKuliah() { return view('admin.tambah-mata-kuliah'); }
    public function tambahMahasiswa() { return view('admin.tambah-mahasiswa'); }
    public function tambahKelas() { return view('admin.tambah-kelas'); }
    public function tambahKampus() { return view('admin.tambah-kampus'); }
    public function tambahJadwal() { return view('admin.tambah-jadwal'); }
}
