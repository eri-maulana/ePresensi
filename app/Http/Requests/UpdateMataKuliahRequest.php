<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMataKuliahRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $mataKuliahId = $this->route('mataKuliah')?->id;

        return [
            'kode_mk' => 'required|string|max:10|unique:mata_kuliahs,kode_mk,' . $mataKuliahId,
            'nama_mk' => 'required|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'kode_mk.required' => 'Kode mata kuliah harus diisi.',
            'kode_mk.unique' => 'Kode mata kuliah sudah terdaftar.',
            'nama_mk.required' => 'Nama mata kuliah harus diisi.',
        ];
    }
}
