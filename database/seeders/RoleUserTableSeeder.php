<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserTableSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::where('name', 'User')->first();
        $users = User::all();

        foreach ($users as $user) {
            $user->roles()->attach($adminRole);
        }
    }
}

