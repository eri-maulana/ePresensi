<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kampus;
use Illuminate\Support\Facades\DB;

class KampusSeeder extends Seeder
{
    public function run(): void
    {
        // 🔧 Nonaktifkan foreign key check sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Kampus::truncate();

        // Aktifkan lagi foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
        Kampus::create([
            'nama_kampus' => 'STMIK AL FATH SUKABUMI',
            'alamat' => 'Jl. Otista No. 123, Sukabumi, Jawa Barat',
            'latitude' => -6.914744,
            'longitude' => 107.609810,
            'radius_m' => 300,
            'telepon' => '022-7654321',
            'email' => 'stmikalfath@kampus.ac.id',
            'website' => 'https://stmikalfath.ac.id',
        ]);
    }
}
