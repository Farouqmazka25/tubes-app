<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'farouq mazka',
            'email' => 'mazkafarouq@gmail.com',
            'password' => Hash::make('farouqmazka25'),
            'alamat' => 'jambi',
            'no_hp' => '089514568569',
            'role' => 'admin', // SET LANGSUNG ROLE DI SINI
        ]);

        // User
        User::create([
            'name' => 'yoanda',
            'email' => 'yoanda@gmail.com',
            'password' => Hash::make('yoanda66'),
            'alamat' => 'bengkulu',
            'no_hp' => '089514568569',
            'role' => 'user',
        ]);
    }
}
