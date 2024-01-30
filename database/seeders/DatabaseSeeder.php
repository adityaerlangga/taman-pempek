<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'user_code' => "USER-0001",
            'user_name' => "Admin Taman Pempek",
            'email' => "Taman Pempek@gmail.com",
            'password' => Hash::make('Taman Pempek'),
            'user_whatsapp_number' => '0812345678910',
            'user_gender' => 'Laki-Laki',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
