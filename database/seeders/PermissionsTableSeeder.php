<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        Permission::create([
            'name' => 'web',
        ]);

        Permission::create([
            'name' => 'view_users',
        ]);

        Permission::create([
            'name' => 'edit_users',
        ]);

        Permission::create([
            'name' => 'delete_users',
        ]);

        Permission::create([
            'name' => 'create_users',
        ]);
    }
}
