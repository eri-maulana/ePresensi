<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class KelasSeeder extends Seeder
{
    public function run(): void
    {
        // 🔧 Nonaktifkan foreign key check sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Kelas::truncate();

        // Aktifkan lagi foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        Kelas::insert([
            ['nama_kelas' => 'TI-1A', 'tahun_ajaran' => '2025/2026'],
            ['nama_kelas' => 'TI-1B', 'tahun_ajaran' => '2025/2026'],
        ]);
    }
}
