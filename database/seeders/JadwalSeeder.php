<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Jadwal;
use App\Models\MataKuliah;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
       // 🔧 Nonaktifkan foreign key check sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Jadwal::truncate();

        // Aktifkan lagi foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $mk1 = MataKuliah::first();
        $kelas1 = Kelas::first();
        $dosenAgus = User::where('role', 'dosen')->first();

        // Pastikan semua ditemukan sebelum membuat jadwal
        if (!$mk1 || !$kelas1 || !$dosenAgus) {
            $this->command->warn('⚠️ Data belum lengkap, jadwal tidak dibuat.');
            return;
        }

        Jadwal::create([
            'mata_kuliah_id' => $mk1->id,
            'kelas_id' => $kelas1->id,
            'dosen_id' => $dosenAgus->id,
            'hari' => 'Senin',
            'jam_mulai' => '08:00:00',
            'jam_selesai' => '09:40:00',
        ]);
    }
}
