<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $role = 'admin';

    public function dashboard()
    {
        return view('admin.dashboard-admin', ['role' => $this->role]);
    }
    public function dataMahasiswa()
    {
        return view('admin.data-mahasiswa', ['role' => $this->role]);
    }
    public function dataDosen()
    {
        return view('admin.data-dosen', ['role' => $this->role]);
    }
    public function dataMataKuliah()
    {
        return view('admin.data-mata-kuliah', ['role' => $this->role]);
    }
    public function dataKelas()
    {
        return view('admin.data-kelas', ['role' => $this->role]);
    }
    public function dataKampus()
    {
        return view('admin.data-kampus', ['role' => $this->role]);
    }
    public function dataJadwal()
    {
        return view('admin.data-jadwal', ['role' => $this->role]);
    }
    public function dataPengguna()
    {
        return view('admin.data-pengguna', ['role' => $this->role]);
    }
    public function rekapPresensi()
    {
        return view('admin.rekap-presensi', ['role' => $this->role]);
    }
    public function profil()
    {
        return view('admin.profil-admin', ['role' => $this->role]);
    }
    public function edit()
    {
        return view('admin.edit-admin', ['role' => $this->role]);
    }
    public function tambahPengguna()
    {
        return view('admin.tambah-pengguna', ['role' => $this->role]);
    }
    public function tambahMataKuliah()
    {
        return view('admin.tambah-mata-kuliah', ['role' => $this->role]);
    }
    public function tambahMahasiswa()
    {
        return view('admin.tambah-mahasiswa', ['role' => $this->role]);
    }
    public function tambahKelas()
    {
        return view('admin.tambah-kelas', ['role' => $this->role]);
    }
    public function tambahKampus()
    {
        return view('admin.tambah-kampus', ['role' => $this->role]);
    }
    public function tambahJadwal()
    {
        return view('admin.tambah-jadwal', ['role' => $this->role]);
    }
}
