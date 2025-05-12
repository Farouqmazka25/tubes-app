<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin ',
                'email' => 'admin@mail.com',
                'password' => Hash::make('password'),
                'alamat' => 'Jl. Admin No.1',
                'no_hp' => '081234567890',
                'role' => 'ADMIN',
            ],
            [
                'name' => 'Bayu',
                'email' => 'bayu@mail.com',
                'password' => Hash::make('password'),
                'alamat' => 'Jl. Bayu No.2',
                'no_hp' => '081222333444',
                'role' => 'USER',
            ],
            [
                'name' => 'Rina',
                'email' => 'rina@mail.com',
                'password' => Hash::make('password'),
                'alamat' => 'Jl. Rina No.3',
                'no_hp' => '081333444555',
                'role' => 'USER',
            ],
        ]);
    }
}
