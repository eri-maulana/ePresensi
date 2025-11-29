<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MataKuliah;
use App\Models\Kelas;
use App\Models\Kampus;
use App\Models\Jadwal;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Dashboard handled by App\Http\Controllers\DashboardController
        return redirect()->action([\App\Http\Controllers\DashboardController::class, 'index']);
    }

    public function dataMahasiswa()
    {
        $users = User::where('role', 'mahasiswa')->orderBy('name')->paginate(20);
        return view('admin.data-mahasiswa', compact('users'));
    }

    public function dataDosen()
    {
        $users = User::where('role', 'dosen')->orderBy('name')->paginate(20);
        return view('admin.data-dosen', compact('users'));
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
        $jadwals = Jadwal::with(['mataKuliah', 'kelas', 'dosen'])->orderBy('hari')->orderBy('jam_mulai')->paginate(20);
        return view('admin.data-jadwal', compact('jadwals'));
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
        $user = auth()->user();
        return view('admin.profil-admin', compact('user'));
    }

    public function edit()
    {
        $user = auth()->user();
        return view('admin.edit-admin', compact('user'));
    }

    public function updateProfil(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'no_hp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:500',
            'password' => 'nullable|string|min:8|confirmed',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle photo upload
        if ($request->hasFile('foto')) {
            if (!empty($user->foto) && \Illuminate\Support\Facades\Storage::disk('public')->exists($user->foto)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($user->foto);
            }
            $validated['foto'] = $request->file('foto')->store('profiles', 'public');
        }

        // Hash password if provided
        if (!empty($validated['password'])) {
            $validated['password'] = \Illuminate\Support\Facades\Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('admin.profil')->with('success', 'Profil berhasil diperbarui.');
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
