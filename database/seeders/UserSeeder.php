<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 🔧 Nonaktifkan foreign key check sementara
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Kosongkan tabel
        User::truncate();

        // Aktifkan lagi foreign key check
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 👑 Admin
        User::create([
            'name' => 'Admin',
            'kode_identitas' => 'ADM001',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'no_hp' => '081234567890',
            'foto' => 'default-admin.png',
            'alamat' => 'STMIK AL FATH',
        ]);

        // 👨‍🏫 Dosen
        User::create([
            'name' => 'Weli Kusnadi S.Kom M.Kom',
            'kode_identitas' => 'DSN12345',
            'email' => 'dosen1@gmail.com',
            'password' => Hash::make('dosen'),
            'role' => 'dosen',
            'no_hp' => '08123456789',
            'foto' => 'default-dosen.png',
            'alamat' => 'Sukabumi',
            
        ]);

        User::create([
            'name' => 'Irwan Tanu Kusnadi S.Kom M.Kom',
            'kode_identitas' => 'DSN54321',
            'email' => 'dosen2@gmail.com',
            'password' => Hash::make('dosen'),
            'role' => 'dosen',
            'no_hp' => '081298765432',
            'foto' => 'default-dosen.png',
            'alamat' => 'Sukabumi',
        ]);

        // 🎓 Mahasiswa
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => "Mahasiswa {$i}",
                'kode_identitas' => "MHS2025{$i}",
                'email' => "mahasiswa{$i}@gmail.com",
                'password' => Hash::make('mahasiswa'),
                'role' => 'mahasiswa',
                'no_hp' => "082100000{$i}",
                'foto' => 'default-mahasiswa.png',
                'alamat' => "Daerah {$i}",
            ]);
        }
    }
}
