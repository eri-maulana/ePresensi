<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $fillable = [
        'mata_kuliah_id', 'kelas_id', 'dosen_id', 'hari', 'jam_mulai', 'jam_selesai'
    ];

    // Relasi
    public function mataKuliah()
    {
        return $this->belongsTo(MataKuliah::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function dosen()
    {
        return $this->belongsTo(User::class, 'dosen_id');
    }

    public function presensis()
    {
        return $this->hasMany(Presensi::class);
    }
}
