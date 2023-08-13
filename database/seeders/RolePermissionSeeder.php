<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Admin;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['guard_name' => 'admin', 'name' => 'superadmin']);
        $permissions = [
            ["name"=>"user list"],
            ["name"=>"user create"],
            ["name"=>"user edit"],
            ["name"=>"user show"],
            ["name"=>"user delete"],
            ["name"=>"role list"],
            ["name"=>"role create"],
            ["name"=>"role edit"],
            ["name"=>"role delete"],
            ["name"=>"permission list"],
            ["name"=>"permission create"],
            ["name"=>"permission edit"],
            ["name"=>"permission delete"],

        ];
        foreach ($permissions as $permission) {
            Permission::create(['guard_name' => 'admin', 'name' => $permission['name']]);
        }
        $role->syncPermissions(Permission::all());
        $admin = Admin::first();
        $admin->assignRole($role);

    }
}
