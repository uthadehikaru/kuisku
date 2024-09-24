<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Quiz;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@laravel.test',
            'password' => Hash::make('secret'),
            'role' => 'admin',
        ]);

        $user = \App\Models\User::factory()->create([
            'name' => 'User 1',
            'email' => 'user1@laravel.test',
            'password' => Hash::make('secret'),
            'role' => 'user',
        ]);

        $this->call([
            QuizSeeder::class,
        ]);
    }
}
