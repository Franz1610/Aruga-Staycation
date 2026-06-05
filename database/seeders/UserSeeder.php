<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's users.
     */
    public function run(): void
    {
        // Remove the old Admin email if it exists
        User::where('email', 'Admin@aruga.com')->delete();

        User::updateOrCreate(
            ['email' => 'Manager@aruga.com'],
            [
                'name' => 'Manager',
                'role' => User::ROLE_ADMIN,
                'password' => 'Admin12345',
            ]
        );

        User::updateOrCreate(
            ['email' => 'Staff@aruga.com'],
            [
                'name' => 'Staff',
                'role' => User::ROLE_STAFF,
                'password' => 'Staff12345',
            ]
        );
    }
}
