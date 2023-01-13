<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // All roles
        $super = Role::create(['name'=>'super-admin']);
        $user = Role::create(['name'=>'user']);
        $admin = Role::create(['name'=>'admin']);

        // Permission client
        Permission::create(['name'=>'shop'])->assignRole($user);

        // Permission chef
        Permission::create(['name'=>'modify'])->assignRole($admin);

        // Permission client and chef
        Permission::create(['name'=>'all_actions'])->syncRoles($super);
    }
}
