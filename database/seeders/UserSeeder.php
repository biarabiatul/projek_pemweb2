<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan data pengguna
        User::create([
            'username' => 'admin',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'username' => 'user',
            'password' => Hash::make('password'),
        ]);
    }
}
