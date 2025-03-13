<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat user admin jika belum ada
        $user = User::firstOrCreate(
            ['email' => 'admin123@gmail.com'], // Pastikan email unik
            [
                'name' => 'Admin123',
                'password' => bcrypt('password'),
                'is_admin' => 1, // Set sebagai admin
                'role' => 'admin', // Sesuaikan dengan sistem peranmu
            ]
        );

        // Pastikan user sudah ada di database
        if ($user->wasRecentlyCreated) {
            echo "User admin berhasil dibuat!\n";
        } else {
            echo "User admin sudah ada.\n";
        }
    }
}
