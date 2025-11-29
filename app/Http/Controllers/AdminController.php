<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MataKuliah;
use App\Models\Kelas;
use App\Models\Kampus;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Dashboard handled by App\Http\Controllers\DashboardController
        return redirect()->action([\App\Http\Controllers\DashboardController::class, 'index']);
    }

    public function dataMahasiswa()
    {
        return view('admin.data-mahasiswa');
    }

    public function dataDosen()
    {
        return view('admin.data-dosen');
    }

    public function dataMataKuliah()
    {
        $mata_kuliahs = MataKuliah::orderBy('kode_mk')->paginate(20);
        return view('admin.data-mata-kuliah', compact('mata_kuliahs'));
    }

    public function dataKelas()
    {
        $kelas = Kelas::orderBy('nama_kelas')->paginate(20);
        return view('admin.data-kelas', compact('kelas'));
    }

    public function dataKampus()
    {
        $kampuses = Kampus::orderBy('nama_kampus')->paginate(20);
        return view('admin.kampus.data-kampus', compact('kampuses'));
    }

    public function dataJadwal()
    {
        return view('admin.data-jadwal');
    }

    public function dataPengguna()
    {
        // load users with pagination and pass to the existing view so it can render dynamic rows
        $users = User::orderBy('role')->orderBy('name')->paginate(20);
        return view('admin.data-pengguna', compact('users'));
    }

    public function rekapPresensi()
    {
        return view('admin.rekap-presensi');
    }

    public function profil()
    {
        return view('admin.profil-admin');
    }

    public function edit()
    {
        return view('admin.edit-admin');
    }

    public function tambahPengguna()
    {
        // Reuse the tambah-pengguna form for creating a user
        return view('admin.tambah-pengguna');
    }

    public function tambahMataKuliah()
    {
        return view('admin.tambah-mata-kuliah');
    }

    public function tambahMahasiswa()
    {
        return view('admin.tambah-mahasiswa');
    }

    public function tambahKelas()
    {
        return view('admin.tambah-kelas');
    }

    public function tambahKampus()
    {
        return view('admin.tambah-kampus');
    }

    public function tambahJadwal()
    {
        return view('admin.tambah-jadwal');
    }
}
