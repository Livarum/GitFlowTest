<?php

// database/seeders/RolesSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'visitor']);

        // Define permissions
        $adminPermissions = [
            'admin.create' => ['module' => 'admin', 'action' => 'create'],
            'admin.read'   => ['module' => 'admin', 'action' => 'read'],
            'admin.update' => ['module' => 'admin', 'action' => 'update'],
            'admin.delete' => ['module' => 'admin', 'action' => 'delete'],
            'admin.index'   => ['module' => 'admin', 'action' => 'index'],
        ];

        $visitorPermissions = [
            'visitor.create' => ['module' => 'visitor', 'action' => 'create'],
            'visitor.read'   => ['module' => 'visitor', 'action' => 'read'],
            'visitor.update' => ['module' => 'visitor', 'action' => 'update'],
            'visitor.delete' => ['module' => 'visitor', 'action' => 'delete'],
            'visitor.index'   => ['module' => 'visitor', 'action' => 'index'],
        ];

        // Assign permissions to roles
        foreach ($adminPermissions as $permissionName => $permissionData) {
            Permission::create([
                'name'       => $permissionName,
                'module'     => $permissionData['module'],
                'action'     => $permissionData['action'],
                'guard_name' => 'web',
            ]);

            Role::findByName('admin')->givePermissionTo($permissionName);
        }

        foreach ($visitorPermissions as $permissionName => $permissionData) {
            Permission::create([
                'name'       => $permissionName,
                'module'     => $permissionData['module'],
                'action'     => $permissionData['action'],
                'guard_name' => 'web',
            ]);

            Role::findByName('admin')->givePermissionTo($permissionName);
            Role::findByName('visitor')->givePermissionTo($permissionName);
        }
    }
}
