<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat data dummy untuk login
        User::create([
            'name'     => 'Lulu Marito',
            'email'    => 'lulu@gmail.com',
            'password' => Hash::make('password123'), // Passwordnya: password123
            'role'     => 'Administrator',

        ]);

        // Tambah user lain jika perlu
        User::create([
            'name'     => 'Staff Bengkel',
            'email'    => 'staff@gmail.com',
            'password' => Hash::make('password123'),
            'role'     => 'Staff',

        ]);
        User::create([
            'name'     => 'Raska',
            'email'    => 'raska@gmail.com',
            'password' => Hash::make('password123'), // Passwordnya: password123
            'role'     => 'Administrator',
            
        ]);
    }
}
