<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Presensi;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\Kampus;
use Illuminate\Support\Facades\DB;

class PresensiSeeder extends Seeder
{
    public function run(): void
    {
        // 🔧 Nonaktifkan foreign key check sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Presensi::truncate();

        // Aktifkan lagi foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $kampus = Kampus::first();
        $jadwal = Jadwal::first();
        $mahasiswas = User::where('role', 'mahasiswa')->get();

        foreach ($mahasiswas as $mhs) {
            Presensi::create([
                'user_id' => $mhs->id,
                'jadwal_id' => $jadwal->id,
                'kampus_id' => $kampus->id,
                'type' => 'masuk',
                'latitude' => -6.914700,
                'longitude' => 107.609800,
                'distance_m' => 20,
                'foto_selfie' => 'selfie.jpg',
                'status' => 'valid',
            ]);
        }
    }
}
