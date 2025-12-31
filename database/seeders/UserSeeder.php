<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Get or create administrator role
        $adminRole = Role::firstOrCreate(
            ['name' => 'administrator'],
            ['description' => 'Administrator dengan akses penuh']
        );
        
        User::create([
            'name' => 'Admin Masjid',
            'email' => 'admin@masjid.com',
            'password' => Hash::make('password123'),
            'role_id' => $adminRole->id
        ]);
    }
}