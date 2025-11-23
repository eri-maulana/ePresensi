<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Http\Requests\StoreKelasRequest;
use App\Http\Requests\UpdateKelasRequest;

class KelasController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.data-kelas');
    }

    public function create()
    {
        return view('admin.tambah-kelas');
    }

    public function store(StoreKelasRequest $request)
    {
        $data = $request->validated();
        Kelas::create($data);
        return redirect()->route('admin.data-kelas')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kelas)
    {
        return view('admin.tambah-kelas', ['kelas' => $kelas]);
    }

    public function update(UpdateKelasRequest $request, Kelas $kelas)
    {
        $data = $request->validated();
        $kelas->update($data);
        return redirect()->route('admin.data-kelas')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();
        return redirect()->route('admin.data-kelas')->with('success', 'Kelas dihapus.');
    }

    public function show(Kelas $kelas)
    {
        return view('admin.detail-kelas', compact('kelas'));
    }
}
