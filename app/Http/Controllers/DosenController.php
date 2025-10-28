<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DosenController extends Controller
{
    private $role = 'dosen';

    public function dashboard()
    {
        return view('dosen.dashboard-dosen', ['role' => $this->role]);
    }
    public function jadwalMengajar()
    {
        return view('dosen.jadwal-mengajar', ['role' => $this->role]);
    }
    public function daftarMahasiswa()
    {
        return view('dosen.daftar-mahasiswa', ['role' => $this->role]);
    }
    public function rekapPresensi()
    {
        return view('dosen.rekap-presensi', ['role' => $this->role]);
    }
    public function profil()
    {
        return view('dosen.profil-dosen', ['role' => $this->role]);
    }
    public function edit()
    {
        return view('dosen.edit-profil-dosen', ['role' => $this->role]);
    }
}
