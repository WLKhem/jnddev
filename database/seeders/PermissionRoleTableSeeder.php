<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleTableSeeder extends Seeder
{
    public function run()
    {
        // Get the role and permission IDs
        $adminRoleId = DB::table('roles')->where('name', 'User')->value('id');
        $createPermissionId = DB::table('permissions')->where('name', 'web')->value('id');

        // Insert the records into the permission_role table
        DB::table('permission_role')->insert([
            [
                'permission_id' => $createPermissionId,
                'role_id' => $adminRoleId,
            ],
            // Add more records as needed
        ]);
    }
}
