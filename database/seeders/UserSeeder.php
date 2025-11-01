<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Jalankan seeder untuk user default.
     */
    public function run(): void
    {
        // ⚠️ Opsional: Hapus user lama agar tidak duplikat
        User::truncate();

        // 👑 Admin
        User::create([
            'name' => 'Admin',
            'kode_identitas' => 'ADM001',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'no_hp' => '081234567890',
            'foto' => 'default-admin.png', // kamu bisa siapkan di public/assets/img/default-admin.png
            'alamat' => 'Jl. Merdeka No. 1, Kota Kampus',
        ]);

        // 👨‍🏫 Dosen
        User::create([
            'name' => 'Dosen',
            'kode_identitas' => 'DSN12345',
            'email' => 'dosen@gmail.com',
            'password' => Hash::make('dosen'),
            'role' => 'dosen',
            'no_hp' => '081298765432',
            'foto' => 'default-dosen.png',
            'alamat' => 'Jl. Pendidikan No. 9, Kota Kampus',
        ]);

        // 🎓 Mahasiswa
        User::create([
            'name' => 'Mahasiswa Teknologi Informasi',
            'kode_identitas' => 'MHS2025001',
            'email' => 'mahasiswa@gmail.com',
            'password' => Hash::make('mahasiswa'),
            'role' => 'mahasiswa',
            'no_hp' => '082112223333',
            'foto' => 'default-mahasiswa.png',
            'alamat' => 'Jl. Kampus Raya No. 21, Kota Kampus',
        ]);
    }
}
