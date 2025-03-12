<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Anilcan Zorlu',
            'email' => 'AnilcZorlu@gmail.com',
            'password' => Hash::make('password'), // login with this password
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'level' => 5,
        ]);
    }
}
