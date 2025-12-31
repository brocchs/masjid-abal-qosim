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
        // Get existing Admin IT role
        $adminRole = Role::where('name', 'Admin IT')->first();
        
        if ($adminRole) {
            User::create([
                'name' => 'Moch. Alfarisyi',
                'email' => 'moch.alfarisyi@gmail.com',
                'password' => Hash::make('Broki123'),
                'role_id' => $adminRole->id
            ]);
        }
    }
}