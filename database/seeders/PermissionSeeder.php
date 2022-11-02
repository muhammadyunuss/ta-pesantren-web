<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
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
        // reset cahced roles and permission
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'view']);
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'publish']);
        Permission::create(['name' => 'unpublish']);

        //create roles and assign existing permissions
        $waliRole = Role::create(['name' => 'walimurid ']);
        $waliRole->givePermissionTo('view');
        $waliRole->givePermissionTo('create');
        $waliRole->givePermissionTo('edit');
        $waliRole->givePermissionTo('delete');

        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('view');
        $adminRole->givePermissionTo('create');
        $adminRole->givePermissionTo('edit');
        $adminRole->givePermissionTo('delete');
        $adminRole->givePermissionTo('publish');
        $adminRole->givePermissionTo('unpublish');

        $superadminRole = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule

        // create demo users
        $user = User::factory()->create([
            'name' => 'Wali Murid',
            'email' => 'walimurid@walimurid.com',
            'password' => bcrypt('123123123')
        ]);
        $user->assignRole($waliRole);

        $user = User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123123123')
        ]);
        $user->assignRole($adminRole);

        $user = User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'superadmin@superadmin.com',
            'password' => bcrypt('123123123')
        ]);
        $user->assignRole($superadminRole);
    }
}
