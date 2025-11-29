<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MataKuliah;
use App\Models\Kelas;
use App\Models\Kampus;
use App\Models\Presensi;
use Symfony\Component\HttpFoundation\StreamedResponse;
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
        $request = request();

        $kelasList = Kelas::orderBy('nama_kelas')->get();
        $mataList = MataKuliah::orderBy('kode_mk')->get();

        $query = Presensi::with(['user', 'jadwal.mataKuliah', 'jadwal.kelas'])
            ->orderBy('created_at', 'desc');

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->input('date_from'));
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->input('date_to'));
        }

        if ($request->filled('kelas_id')) {
            $kelasId = $request->input('kelas_id');
            $query->whereHas('jadwal', function ($q) use ($kelasId) {
                $q->where('kelas_id', $kelasId);
            });
        }

        if ($request->filled('mata_kuliah_id')) {
            $mkId = $request->input('mata_kuliah_id');
            $query->whereHas('jadwal', function ($q) use ($mkId) {
                $q->where('mata_kuliah_id', $mkId);
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        // Export CSV
        if ($request->input('export') === 'csv') {
            $filename = 'rekap_presensi_' . now()->format('Ymd_His') . '.csv';

            $response = new StreamedResponse(function () use ($query) {
                $handle = fopen('php://output', 'w');
                // Header
                fputcsv($handle, ['Waktu', 'Nama Mahasiswa', 'NIM', 'Mata Kuliah', 'Kelas', 'Hari', 'Jam', 'Status', 'Latitude', 'Longitude', 'Distance_m']);

                $query->chunk(200, function ($rows) use ($handle) {
                    foreach ($rows as $row) {
                        $jadwal = $row->jadwal;
                        fputcsv($handle, [
                            $row->created_at,
                            optional($row->user)->name,
                            optional($row->user)->nim ?? '',
                            optional(optional($jadwal)->mataKuliah)->kode_mk . ' - ' . optional(optional($jadwal)->mataKuliah)->nama_mk,
                            optional(optional($jadwal)->kelas)->nama_kelas,
                            optional($jadwal)->hari ?? '',
                            (optional($jadwal)->jam_mulai ?? '') . ' - ' . (optional($jadwal)->jam_selesai ?? ''),
                            $row->status,
                            $row->latitude,
                            $row->longitude,
                            $row->distance_m,
                        ]);
                    }
                });

                fclose($handle);
            });

            $response->headers->set('Content-Type', 'text/csv; charset=UTF-8');
            $response->headers->set('Content-Disposition', 'attachment; filename="' . $filename . '"');

            return $response;
        }

        $presensis = $query->paginate(20)->withQueryString();

        return view('admin.rekap-presensi', compact('presensis', 'kelasList', 'mataList'));
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
