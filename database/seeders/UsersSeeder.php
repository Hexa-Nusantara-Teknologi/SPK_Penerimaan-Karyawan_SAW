<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

            'email' => "admin@gmail.com",
            'nama' => "Admin",
            'password' => Hash::make('Admin123'),
            'role' => "Admin",
            'status' => "Admin",
        ]);
        DB::table('users')->insert([

            'email' => "user@gmail.com",
            'nama' => "User",
            'password' => Hash::make('User123'),
            'role' => "User",
            'status' => "Belum Lengkap",
        ]);
    }
}
