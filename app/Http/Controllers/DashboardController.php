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

        switch ($user->role) {
            case 'admin':
                $data = [
                    'total_mahasiswa' => User::where('role', 'mahasiswa')->count(),
                    'total_dosen' => User::where('role', 'dosen')->count(),
                    'total_kelas' => Kelas::count(),
                    'total_mk' => MataKuliah::count(),
                    'kelas_terbaru' => Kelas::latest()->take(5)->get(),
                ];
                return view('admin.dashboard-admin', compact('data'));
        }
    }
}
