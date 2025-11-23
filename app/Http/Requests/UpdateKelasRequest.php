<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKelasRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nama_kelas' => 'required|string|max:20',
            'tahun_ajaran' => 'required|string|max:9',
        ];
    }

    public function messages()
    {
        return [
            'nama_kelas.required' => 'Nama kelas harus diisi.',
            'tahun_ajaran.required' => 'Tahun ajaran harus diisi.',
        ];
    }
}
