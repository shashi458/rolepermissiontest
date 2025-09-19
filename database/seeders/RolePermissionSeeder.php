<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::firstOrCreate(['name' => 'view dashboard']);
        Permission::firstOrCreate(['name' => 'edit articles']);
        Permission::firstOrCreate(['name' => 'manage users']);

        // create roles
        $super = Role::firstOrCreate(['name' => 'super-admin']);
        $owner = Role::firstOrCreate(['name' => 'owner']);
        $userRole = Role::firstOrCreate(['name' => 'user']);

        // assign permissions to roles
        $super->givePermissionTo(Permission::all());
        $owner->givePermissionTo(['view dashboard','edit articles']);
        $userRole->givePermissionTo(['view dashboard']);

        // optionally assign super-admin to first user
        $first = User::first();
        if ($first) {
            $first->assignRole('super-admin');
        }
    }
}
