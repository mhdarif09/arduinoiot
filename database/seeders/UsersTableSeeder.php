<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'role' => 'admin',
                'name' => 'pihak bandara',
                'email' => 'admin@example.com',
                'password' => Hash::make('password123'), // Pastikan untuk menggunakan password yang aman
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'role' => 'super_admin',
                'name'=> 'Pihak Pemerintah',
                'email' => 'superadmin@example.com',
                'password' => Hash::make('password456'), // Pastikan untuk menggunakan password yang aman
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
