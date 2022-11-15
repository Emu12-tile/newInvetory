<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'admin']);

        $role2 = Role::create(['name' => 'head']);
        $role3 =  Role::create(['name' => 'user']);
        $permission = Permission::create(['name' => 'create articles', 'name' => 'edit articles']);
        $role1->givePermissionTo($permission);
        // $role2->givePermissionTo($permission);
        // $role3->givePermissionTo($permission);
    }
}
