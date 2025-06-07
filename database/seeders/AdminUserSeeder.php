<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin1@example.com',
            'password' => bcrypt('$12$1DRpPIE89RsHZ8L.s0A14.AkseeKn5D0ahjwza5XOk0b9hVT6YeA6'), 
            'role' => 'admin',
        ]);
    }
}