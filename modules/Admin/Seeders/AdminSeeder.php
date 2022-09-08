<?php

namespace Modules\Admin\Seeders;

use Illuminate\Database\Seeder;
use Modules\Admin\Models\Admin;
use Modules\Admin\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // $actions = ['index', 'store', 'show', 'update', 'destroy'];

        // foreach ($actions as $key) {
        //     Permission::updateOrCreate(['name' => 'admin.' . $key, 'guard_name' => Role::GUARD_NAME_ADMIN]);
        // }


        $admin = Admin::updateOrCreate(
            [
                'email' => 'admin@admin.com',
            ],
            [
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'is_active' => 1,
                'password' => bcrypt('123123'),
            ]
        );

        $user = Admin::updateOrCreate(
            [
                'email' => 'user@user.com',
            ],
            [
                'email' => 'user@user.com',
                'username' => 'user',
                'is_active' => 1,
                'password' => bcrypt('123123'),
            ]
        );

        $test = Admin::updateOrCreate(
            [
                'email' => 'test@test.com',
            ],
            [
                'email' => 'test@test.com',
                'username' => 'test',
                'is_active' => 1,
                'password' => bcrypt('123123'),
            ]
        );

        $role = Role::create(['name' => 'admin', 'guard_name' => 'admin']);
        $roleUser = Role::create(['name' => 'user', 'guard_name' => 'admin']);

        $admin->syncRoles($role);
        $user->syncRoles($roleUser);

        $routeNames = ['admin', 'module', 'module-image', 'slider', 'permistion', 'role', 'user-role', 'process', 'customer', 'service', 'portfolio'];

        foreach ($routeNames as $routeName) {
            $permissionWeb = Permission::updateOrCreate(['name' => $routeName, 'guard_name' => 'web']);
            $permission = Permission::updateOrCreate(['name' => $routeName, 'guard_name' => 'admin']);
            $permission->assignRole($role);
        }
        $permissionMe = Permission::create(['name' => 'me', 'guard_name' => 'admin']);
        $permissionMe->assignRole($role);

        $permissionShowPer = Permission::create(['name' => 'show-permission', 'guard_name' => 'admin']);
        $permissionShowPer->assignRole($role);

        $permissionSort = Permission::create(['name' => 'sort', 'guard_name' => 'admin']);
        $permissionSort->assignRole($role);

        $permissionSearch = Permission::create(['name' => 'search', 'guard_name' => 'admin']);
        $permissionSearch->assignRole($role);
        // $admin->assignRole(config('constant.role_admin'));
    }
}
