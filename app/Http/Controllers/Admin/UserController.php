<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        // index handled by AdminController@dataPengguna (URL /admin/data-pengguna)
        return redirect()->route('admin.data-pengguna');
    }

    public function create()
    {
        // reuse the existing admin.tambah-pengguna blade for create
        $kelas = Kelas::orderBy('nama_kelas')->get();
        return view('admin.tambah-pengguna', compact('kelas'));
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        // handle photo upload if present
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('profiles', 'public');
        }

        $data['password'] = Hash::make($data['password']);
        $user = User::create($data);

        // Create mahasiswa record if role is mahasiswa
        if ($user->role === 'mahasiswa') {
            $kelasId = $request->input('kelas_id');
            Mahasiswa::updateOrCreate(
                ['user_id' => $user->id],
                ['kelas_id' => $kelasId]
            );
        }

        // Redirect based on role: if dosen -> data-dosen, if mahasiswa -> data-mahasiswa, else data-pengguna
        $redirectRoute = match($user->role) {
            'dosen' => 'admin.data-dosen',
            'mahasiswa' => 'admin.data-mahasiswa',
            default => 'admin.data-pengguna'
        };

        return redirect()->route($redirectRoute)->with('success', 'User berhasil dibuat.');
    }

    public function edit(User $user)
    {
        // reuse the tambah-pengguna blade for edit, passing the user and kelas list
        $kelas = Kelas::orderBy('nama_kelas')->get();
        return view('admin.tambah-pengguna', compact('user', 'kelas'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        // handle new photo upload and delete old if exists
        if ($request->hasFile('foto')) {
            if (!empty($user->foto) && Storage::disk('public')->exists($user->foto)) {
                Storage::disk('public')->delete($user->foto);
            }
            $data['foto'] = $request->file('foto')->store('profiles', 'public');
        }

        $user->update($data);

        // ensure mahasiswa record exists if role set to mahasiswa
        if ($user->role === 'mahasiswa') {
            $kelasId = $request->input('kelas_id');
            Mahasiswa::updateOrCreate(
                ['user_id' => $user->id],
                ['kelas_id' => $kelasId]
            );
        } else {
            // if role is changed away from mahasiswa, remove mahasiswa record
            Mahasiswa::where('user_id', $user->id)->delete();
        }

        // Determine role after update (prefer request value if provided)
        $roleAfter = $request->input('role', $user->role);
        $redirectRoute = match($roleAfter) {
            'dosen' => 'admin.data-dosen',
            'mahasiswa' => 'admin.data-mahasiswa',
            default => 'admin.data-pengguna'
        };

        return redirect()->route($redirectRoute)->with('success', 'User berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        // capture role before delete
        $role = $user->role;
        $user->delete();

        $redirectRoute = match($role) {
            'dosen' => 'admin.data-dosen',
            'mahasiswa' => 'admin.data-mahasiswa',
            default => 'admin.data-pengguna'
        };
        return redirect()->route($redirectRoute)->with('success', 'User dihapus.');
    }

    /**
     * Show detail for a single user.
     */
    public function show(User $user)
    {
        $user->load('mahasiswa.kelas');
        return view('admin.detail-pengguna', compact('user'));
    }
}
