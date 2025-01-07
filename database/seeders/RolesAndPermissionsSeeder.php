<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Создание разрешений
        $permissions = [
            // Администраторские разрешения
            'manage cars',
            'manage clients',
            'manage insurance policies',
            'manage maintenance',
            'manage users',
            'manage user permissions',
            'delete rental history',

            // Менеджерские разрешения
            'manage car maintenance',
            'add insurance policies',
            'attach detach clients cars',
            'change car status',

            // Клиентские разрешения
            'view available cars',
            'create rental requests',
            'social network authorization',
            'gosuslugi authorization'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Создание ролей и присвоение им разрешений
        $adminRole = Role::create(['name' => 'administrator']);
        $adminRole->givePermissionTo([
            'manage cars',
            'manage clients',
            'manage insurance policies',
            'manage maintenance',
            'manage users',
            'manage user permissions',
            'delete rental history'
        ]);

        $managerRole = Role::create(['name' => 'manager']);
        $managerRole->givePermissionTo([
            'manage car maintenance',
            'add insurance policies',
            'attach detach clients cars',
            'change car status'
        ]);

        $clientRole = Role::create(['name' => 'client']);
        $clientRole->givePermissionTo([
            'view available cars',
            'create rental requests',
            'social network authorization',
            'gosuslugi authorization'
        ]);
    }
}
