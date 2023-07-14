<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleUserSeeder extends Seeder
{
    public function run()
    {
        $userRole = Role::where('name', 'User')->first();

        if ($userRole) {
            $users = User::all();
            foreach ($users as $user) {
                $user->roles()->attach($userRole);
            }
        }
    }
}
