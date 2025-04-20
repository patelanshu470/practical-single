<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'type' => 'admin', // Make sure 'type' column exists in your users table
            'email_verified_at' => now(),
            'password' => Hash::make('admin@123'), // password
            'remember_token' => Str::random(10),
        ]);
    }
}
