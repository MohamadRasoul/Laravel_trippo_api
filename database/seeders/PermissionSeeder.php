<?php

namespace Database\Seeders;

use App\Enums\AdminPermission;
use App\Enums\UserRole;
use App\Enums\SuperAdminPermission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        foreach (AdminPermission::options() as $name => $id) {
            $thisPermission = Permission::where('name', $name)->first();
            if ($thisPermission === null) {
                Permission::create([
                    'guard_name'  => 'admin',
                    'id'          => $id,
                    'name'        => $name,
                ]);
            }
        }

        $thisAdmin = Role::where('name', UserRole::ADMIN)->first();
        if ($thisAdmin === null) {
            $admin_role   = Role::create(['guard_name' => 'admin', 'name' => UserRole::ADMIN]);
        } else {
            $admin_role   = $thisAdmin;
        }

        // gets all permissions via Gate::before rule; see AuthServiceProvider
        $thisAdmin = Role::where('name', UserRole::SUPER_ADMIN)->first();
        if ($thisAdmin === null) {
            Role::create(['guard_name' => 'admin', 'name' => UserRole::SUPER_ADMIN]);
        }

        $thisAdmin = Role::where('name', UserRole::CITY_ADMIN)->first();
        if ($thisAdmin === null) {
            $city_admin_role   = Role::create(['guard_name' => 'admin', 'name' => UserRole::CITY_ADMIN]);
        } else {
            $city_admin_role   = $thisAdmin;
        }

        $thisAdmin = Role::where('name', UserRole::TYPE_ADMIN)->first();
        if ($thisAdmin === null) {
            $type_admin_role   = Role::create(['guard_name' => 'admin', 'name' => UserRole::TYPE_ADMIN]);
        } else {
            $type_admin_role   = $thisAdmin;
        }

        $thisAdmin = Role::where('name', UserRole::USER)->first();
        if ($thisAdmin === null) {
            $user_role         = Role::create(['guard_name' => 'user', 'name' => UserRole::USER]);
        } else {
            $user_role   = $thisAdmin;
        }
    }
}
