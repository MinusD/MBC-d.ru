<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'user-panel-access']);
        Permission::create(['name' => 'headman-panel-access']);
        Permission::create(['name' => 'mod-panel-access']);
        Permission::create(['name' => 'admin-panel-access']);

        // create roles and assign created permissions
        Role::create(['name' => 'student'])->givePermissionTo(['user-panel-access']);
        Role::create(['name' => 'headman'])->givePermissionTo(['user-panel-access']);
        Role::create(['name' => 'moderator'])->givePermissionTo(['mod-panel-access']);
        Role::create(['name' => 'admin'])->givePermissionTo(['admin-panel-access']);
    }
}
