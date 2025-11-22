<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function dashboard()
    {
        return view('dosen.dashboard-dosen');
    }

    public function jadwalMengajar()
    {
        return view('dosen.jadwal-mengajar');
    }

    public function daftarMahasiswa()
    {
        return view('dosen.daftar-mahasiswa');
    }

    public function rekapPresensi()
    {
        return view('dosen.rekap-presensi');
    }

    public function profil()
    {
        return view('dosen.profil-dosen');
    }

    public function edit()
    {
        return view('dosen.edit-profil');
    }
}
