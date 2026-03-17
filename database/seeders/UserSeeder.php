<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@shaghalni.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Company Owner',
            'email' => 'owner@shaghalni.com',
            'password' => Hash::make('password'),
            'role' => 'company-owner',
        ]);

        User::factory(10)->create(['role' => 'job-seeker']);
    }
}