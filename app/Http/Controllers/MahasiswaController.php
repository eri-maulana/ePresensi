<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    private $role = 'mahasiswa';

    public function dashboard()
    {
        return view('mahasiswa.dashboard-mahasiswa', ['role' => $this->role]);
    }
    public function presensi()
    {
        return view('mahasiswa.presensi', ['role' => $this->role]);
    }
    public function riwayatPresensi()
    {
        return view('mahasiswa.riwayat-presensi', ['role' => $this->role]);
    }
    public function profil()
    {
        return view('mahasiswa.profil-mahasiswa', ['role' => $this->role]);
    }
    public function editProfil()
    {
        return view('mahasiswa.edit-profil-mahasiswa', ['role' => $this->role]);
    }
}
