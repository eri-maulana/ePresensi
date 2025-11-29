<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Kelas;
use App\Models\User;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;

class JadwalController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.data-jadwal');
    }

    public function create()
    {
        $mata_kuliahs = MataKuliah::orderBy('kode_mk')->get();
        $kelas = Kelas::orderBy('nama_kelas')->get();
        $dosens = User::where('role', 'dosen')->orderBy('name')->get();
        return view('admin.tambah-jadwal', compact('mata_kuliahs', 'kelas', 'dosens'));
    }

    public function store(StoreJadwalRequest $request)
    {
        $data = $request->validated();
        Jadwal::create($data);
        return redirect()->route('admin.data-jadwal')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    public function edit(Jadwal $jadwal)
    {
        $mata_kuliahs = MataKuliah::orderBy('kode_mk')->get();
        $kelas = Kelas::orderBy('nama_kelas')->get();
        $dosens = User::where('role', 'dosen')->orderBy('name')->get();
        return view('admin.tambah-jadwal', compact('jadwal', 'mata_kuliahs', 'kelas', 'dosens'));
    }

    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {
        $data = $request->validated();
        $jadwal->update($data);
        return redirect()->route('admin.data-jadwal')->with('success', 'Jadwal berhasil diperbarui.');
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('admin.data-jadwal')->with('success', 'Jadwal dihapus.');
    }

    public function show(Jadwal $jadwal)
    {
        $jadwal->load(['mataKuliah', 'kelas', 'dosen']);
        return view('admin.detail-jadwal', compact('jadwal'));
    }
}
