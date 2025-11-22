<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'jadwal_id', 'kampus_id', 'type', 'latitude',
        'longitude', 'distance_m', 'foto_selfie', 'status'
    ];

    // Relasi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class);
    }

    public function kampus()
    {
        return $this->belongsTo(Kampus::class);
    }
}
