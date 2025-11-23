<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MataKuliah;
use App\Http\Requests\StoreMataKuliahRequest;
use App\Http\Requests\UpdateMataKuliahRequest;

class MataKuliahController extends Controller
{
    public function index()
    {
        return redirect()->route('admin.data-mata-kuliah');
    }

    public function create()
    {
        return view('admin.tambah-mata-kuliah');
    }

    public function store(StoreMataKuliahRequest $request)
    {
        $data = $request->validated();
        MataKuliah::create($data);
        return redirect()->route('admin.data-mata-kuliah')->with('success', 'Mata kuliah berhasil ditambahkan.');
    }

    public function edit(MataKuliah $mataKuliah)
    {
        return view('admin.tambah-mata-kuliah', ['mataKuliah' => $mataKuliah]);
    }

    public function update(UpdateMataKuliahRequest $request, MataKuliah $mataKuliah)
    {
        $data = $request->validated();
        $mataKuliah->update($data);
        return redirect()->route('admin.data-mata-kuliah')->with('success', 'Mata kuliah berhasil diperbarui.');
    }

    public function destroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();
        return redirect()->route('admin.data-mata-kuliah')->with('success', 'Mata kuliah dihapus.');
    }

    public function show(MataKuliah $mataKuliah)
    {
        return view('admin.detail-mata-kuliah', compact('mataKuliah'));
    }
}
