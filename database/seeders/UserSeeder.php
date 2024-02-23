<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numberOfUsers = 10;

        for ($i = 1; $i <= $numberOfUsers; $i++) {
            DB::table('users')->insert([
                'name' => 'User' . $i,
                'username' => 'user' . $i,
                'email' => 'user' . $i . '@gmail.com',
                // 'no_handphone' => '123456789' . $i,
                'password' => bcrypt('password'), // You may want to use Hash::make() in a real application
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
