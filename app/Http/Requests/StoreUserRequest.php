<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // authorization handled elsewhere
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,dosen,mahasiswa',
            'kode_identitas' => 'nullable|string|unique:users,kode_identitas',
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:2048',
            'kelas_id' => 'nullable|exists:kelas,id'
        ];
    }
}
