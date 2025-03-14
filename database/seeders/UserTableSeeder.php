<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Correct use statement
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), // Hash the password
            'role' => 'admin',
        ]);

        // Student User
        DB::table('users')->insert([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'password' => Hash::make('password456'), // Hash the password
            'role' => 'student',
        ]);
    }
}
