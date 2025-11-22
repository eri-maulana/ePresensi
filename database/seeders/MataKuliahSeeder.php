<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MataKuliah;
use Illuminate\Support\Facades\DB;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        // 🔧 Nonaktifkan foreign key check sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        MataKuliah::truncate();

        // Aktifkan lagi foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        MataKuliah::insert([
            ['kode_mk' => 'MK001', 'nama_mk' => 'Pemrograman Web'],
            ['kode_mk' => 'MK002', 'nama_mk' => 'Basis Data Lanjut'],
            ['kode_mk' => 'MK003', 'nama_mk' => 'Jaringan Komputer'],
        ]);
    }
}
