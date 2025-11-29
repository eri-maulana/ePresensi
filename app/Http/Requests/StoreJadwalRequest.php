<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator as ValidatorContract;
use App\Models\Jadwal;

class StoreJadwalRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->check();
    }

    public function rules()
    {
        return [
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'kelas_id' => 'required|exists:kelas,id',
            'dosen_id' => 'nullable|exists:users,id',
            'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
            'ruangan' => 'nullable|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'mata_kuliah_id.required' => 'Pilih mata kuliah.',
            'kelas_id.required' => 'Pilih kelas.',
            'hari.required' => 'Pilih hari.',
            'jam_mulai.required' => 'Masukkan jam mulai.',
            'jam_selesai.required' => 'Masukkan jam selesai.',
            'jam_selesai.after' => 'Jam selesai harus setelah jam mulai.',
        ];
    }

    public function withValidator(ValidatorContract $validator)
    {
        $validator->after(function ($validator) {
            $mataKuliah = $this->input('mata_kuliah_id');
            $kelas = $this->input('kelas_id');
            $hari = $this->input('hari');

            if ($mataKuliah && $kelas && $hari) {
                $exists = Jadwal::where('mata_kuliah_id', $mataKuliah)
                    ->where('kelas_id', $kelas)
                    ->where('hari', $hari)
                    ->exists();

                if ($exists) {
                    $validator->errors()->add('mata_kuliah_id', 'Kombinasi mata kuliah dan kelas sudah dijadwalkan pada hari tersebut.');
                }
            }
        });
    }
}
