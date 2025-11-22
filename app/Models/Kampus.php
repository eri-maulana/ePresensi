<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kampus extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kampus', 'alamat', 'latitude', 'longitude', 'radius_m',
        'telepon', 'email', 'website'
    ];

    // Relasi
    public function presensis()
    {
        return $this->hasMany(Presensi::class);
    }
}
