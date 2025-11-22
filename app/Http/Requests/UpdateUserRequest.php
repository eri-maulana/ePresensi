<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $userId = $this->route('user') ? $this->route('user')->id : null;

        return [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'password' => 'nullable|string|min:8',
            'role' => 'required|in:admin,dosen,mahasiswa',
            'kode_identitas' => [
                'nullable',
                Rule::unique('users', 'kode_identitas')->ignore($userId),
            ],
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string|max:255',
            'foto' => 'nullable|image|max:2048',
            'kelas_id' => 'nullable|exists:kelas,id',
        ];
    }
}
