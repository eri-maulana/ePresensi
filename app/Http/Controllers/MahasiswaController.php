<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Models\Jadwal;
use App\Models\Presensi;
use App\Models\Kampus;

class MahasiswaController extends Controller
{
    public function dashboard()
    {
        return view('mahasiswa.dashboard-mahasiswa');
    }

    public function presensi()
    {
        $user = Auth::user();
        $kelasId = optional($user->mahasiswa)->kelas_id;

        // Ambil jadwal untuk kelas mahasiswa (jika tersedia)
        $jadwals = [];
        if ($kelasId) {
            $jadwals = Jadwal::with(['mataKuliah', 'dosen'])
                ->where('kelas_id', $kelasId)
                ->orderBy('hari')
                ->orderBy('jam_mulai')
                ->get();
            // Tentukan jadwal yang aktif berdasarkan hari & waktu sekarang
            $now = Carbon::now();
            $todayIndex = $now->dayOfWeek; // 0 (Sun) .. 6 (Sat)
            $shortMap = ['min','sen','sel','rab','kam','jum','sab'];
            $todayShort = $shortMap[$todayIndex] ?? '';

            $jadwals->transform(function ($j) use ($now, $todayShort) {
                $hari = strtolower(trim((string) $j->hari));
                $hariShort = substr($hari, 0, 3);

                // Parse jam mulai/selesai pada tanggal hari ini
                try {
                    $mulai = Carbon::createFromFormat('H:i', $j->jam_mulai);
                    $selesai = Carbon::createFromFormat('H:i', $j->jam_selesai);
                } catch (\Exception $e) {
                    $mulai = null;
                    $selesai = null;
                }

                $timeMatch = false;
                if ($mulai && $selesai) {
                    // Normalisasi tanggal ke hari ini untuk perbandingan
                    $mulai = $mulai->setDate($now->year, $now->month, $now->day);
                    $selesai = $selesai->setDate($now->year, $now->month, $now->day);
                    $timeMatch = $now->between($mulai, $selesai);
                }

                $dayMatch = ($hariShort === $todayShort) || str_contains($hari, $todayShort) || str_contains($todayShort, $hariShort);

                $j->is_active = $dayMatch && $timeMatch;
                return $j;
            });
        }

        // Ambil daftar kampus untuk pilihan check-in
        $kampuses = Kampus::all();

        // Ambil beberapa presensi terakhir milik user
        $riwayat = Presensi::where('user_id', $user->id)->latest()->take(10)->get();

        return view('mahasiswa.presensi', compact('jadwals', 'kampuses', 'riwayat'));
    }

    public function riwayatPresensi()
    {
        $user = Auth::user();
        $riwayat = Presensi::where('user_id', $user->id)->with('jadwal.mataKuliah')->latest()->paginate(10);
        return view('mahasiswa.riwayat-presensi', compact('riwayat'));
    }

    public function profil()
    {
        return view('mahasiswa.profil-mahasiswa');
    }

    public function editProfil()
    {
        return view('mahasiswa.edit-profil-mahasiswa');
    }

    /**
     * Store presensi (check-in) for mahasiswa
     */
    public function storePresensi(Request $request)
    {
        $user = Auth::user();

        // Terima jadwal_id sebagai optional (tampilan lama tidak selalu memilih jadwal)
        $validated = $request->validate([
            'jadwal_id' => 'nullable|exists:jadwals,id',
            'kampus_id' => 'nullable|exists:kampus,id',
            'type' => 'nullable|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'foto_selfie' => 'nullable|image|max:4096',
            'foto_selfie_base64' => 'nullable|string'
        ]);

        // Persiapkan data untuk disimpan
        $data = [
            'user_id' => $user->id,
            'jadwal_id' => $validated['jadwal_id'] ?? null,
            'kampus_id' => $validated['kampus_id'] ?? null,
            'type' => $validated['type'] ?? 'masuk',
            'latitude' => $validated['latitude'] ?? null,
            'longitude' => $validated['longitude'] ?? null,
            'status' => 'hadir'
        ];

        // Simpan foto jika dikirim sebagai file
        if ($request->hasFile('foto_selfie')) {
            $path = $request->file('foto_selfie')->store('presensi', 'public');
            $data['foto_selfie'] = $path;
        }

        // Atau simpan foto jika dikirim sebagai base64 (dari kamera via JS)
        if (empty($data['foto_selfie']) && !empty($validated['foto_selfie_base64'])) {
            $base64 = $validated['foto_selfie_base64'];
            // Jika base64 mengandung prefix data:image/...;base64, hapus prefix
            if (preg_match('/^data:\\w+\\/(\\w+);base64,/', $base64, $matches)) {
                $ext = $matches[1];
                $base64 = substr($base64, strpos($base64, ',') + 1);
            } else {
                $ext = 'jpg';
            }

            $binary = base64_decode($base64);
            if ($binary !== false) {
                $fileName = 'presensi/' . uniqid('selfie_') . '.' . $ext;
                Storage::disk('public')->put($fileName, $binary);
                $data['foto_selfie'] = $fileName;
            }
        }

        $presensi = Presensi::create($data);

        // Jika request AJAX atau ingin JSON, kembalikan JSON
        if ($request->wantsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'id' => $presensi->id], 201);
        }

        return redirect()->route('mahasiswa.riwayat-presensi')->with('success', 'Presensi berhasil disimpan.');
    }
}
