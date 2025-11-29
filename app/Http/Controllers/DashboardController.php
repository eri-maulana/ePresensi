<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kelas;
use App\Models\MataKuliah;
use App\Models\Jadwal;
use App\Models\Presensi;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
            $data = [
                'total_mahasiswa' => User::where('role', 'mahasiswa')->count(),
                'total_dosen' => User::where('role', 'dosen')->count(),
                'total_kelas' => Kelas::count(),
                'total_mk' => MataKuliah::count(),
                'kelas_terbaru' => Kelas::with(['jadwals', 'mahasiswas'])->latest()->take(5)->get(),
                'aktivitas' => [
                    // Contoh: ambil 5 kelas terbaru
                    ...Kelas::latest()->take(5)->get()->map(function($k){
                        return [
                            'type' => 'kelas',
                            'title' => 'Kelas Baru Ditambahkan',
                            'desc' => $k->nama_kelas,
                            'time' => $k->created_at,
                        ];
                    })
                ],
                'peringatan' => [
                    // Contoh: kelas tanpa jadwal minggu depan
                    ...Kelas::doesntHave('jadwals')->take(3)->get()->map(function($k){
                        return [
                            'msg' => $k->nama_kelas.' belum ada jadwal minggu depan',
                            'action' => route('admin.tambah-jadwal.create'),
                        ];
                    })
                ],
            ];
            return view('admin.dashboard-admin', compact('data'));
        }
    }
}
