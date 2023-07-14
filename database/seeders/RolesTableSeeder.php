<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'User']);

        Role::create(['name' => 'Admin']);

        Role::create(['name' => 'SuperAdmin']);
    }
}
