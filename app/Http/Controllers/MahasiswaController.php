<?php

namespace App\Http\Controllers;

class MahasiswaController extends Controller
{
    public function dashboard() { return view('mahasiswa.dashboard-mahasiswa'); }
    public function presensi() { return view('mahasiswa.presensi'); }
    public function riwayatPresensi() { return view('mahasiswa.riwayat-presensi'); }
    public function profil() { return view('mahasiswa.profil-mahasiswa'); }
    public function editProfil() { return view('mahasiswa.edit-profil-mahasiswa'); }
}
