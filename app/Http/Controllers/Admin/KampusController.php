<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kampus;
use App\Http\Requests\StoreKampusRequest;
use App\Http\Requests\UpdateKampusRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class KampusController extends Controller
{
    public function create(): View
    {
        // Cek apakah sudah ada 1 kampus
        if (Kampus::count() >= 1) {
            return redirect()->route('admin.data-kampus')
                ->with('error', 'Hanya boleh membuat 1 kampus. Silakan ubah data kampus yang sudah ada.');
        }
        return view('admin.kampus.tambah-kampus');
    }

    /**
     * Simpan kampus baru ke database.
     */
    public function store(StoreKampusRequest $request): RedirectResponse
    {
        // Cek apakah sudah ada 1 kampus
        if (Kampus::count() >= 1) {
            return redirect()->route('admin.data-kampus')
                ->with('error', 'Hanya boleh membuat 1 kampus. Silakan ubah data kampus yang sudah ada.');
        }
        
        $data = $request->validated();
        Kampus::create($data);

        return redirect()->route('admin.data-kampus')
            ->with('success', 'Kampus berhasil ditambahkan.');
    }

    public function edit(Kampus $kampus): View
    {
        return view('admin.kampus.tambah-kampus', compact('kampus'));
    }

    /**
     * Perbarui data kampus di database.
     */
    public function update(UpdateKampusRequest $request, Kampus $kampus): RedirectResponse
    {
        $data = $request->validated();
        $kampus->update($data);

        return redirect()->route('admin.data-kampus')
            ->with('success', 'Kampus berhasil diperbarui.');
    }

    /**
     * Hapus kampus dari database.
     */
    public function destroy(Kampus $kampus): RedirectResponse
    {
        $kampus->delete();

        return redirect()->route('admin.data-kampus')
            ->with('success', 'Kampus berhasil dihapus.');
    }

    /**
     * Tampilkan detail kampus.
     */
    public function show(Kampus $kampus): View
    {
        return view('admin.kampus.detail-kampus', compact('kampus'));
    }
}