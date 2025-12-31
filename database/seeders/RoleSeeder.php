<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::firstOrCreate(
            ['name' => 'Admin IT'],
            ['description' => 'Administrator IT dengan akses teknis']
        );
        
        Role::firstOrCreate(
            ['name' => 'user'],
            ['description' => 'User biasa dengan akses terbatas']
        );
    }
}