<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Programming',
            'email' => 'company888@me.com',
            'username' => 'company888',
            'password' => bcrypt('123456789'),
        ]);

        // Assign the admin role to the user
        $adminRole = Role::where('name', 'Admin')->first();
        $user->roles()->attach($adminRole);
    }
}
