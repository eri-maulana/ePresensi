<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Support\Facades\DB;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        // 🔧 Nonaktifkan foreign key check sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Mahasiswa::truncate();

        // Aktifkan lagi foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $kelas1 = Kelas::where('nama_kelas', 'TI-1A')->first();

        $mahasiswaUsers = User::where('role', 'mahasiswa')->get();

        foreach ($mahasiswaUsers as $user) {
            Mahasiswa::create([
                'user_id' => $user->id,
                'kelas_id' => $kelas1->id,
            ]);
        }
    }
}
