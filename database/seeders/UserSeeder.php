<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@politanisamarinda.ac.id',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'), // password
            'remember_token' => Str::random(10),
        ]);

        // User::factory(9)->create();
    }
}
