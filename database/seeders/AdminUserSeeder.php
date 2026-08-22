<?php

// php artisan make:seeder AdminUserSeeder

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@tmoultimate.com'],
            [
                'name' => 'TMO Admin',
                'password' => Hash::make('ChangeMe123!'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );
    }
}