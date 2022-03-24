<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionDemoSeeder extends Seeder
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
        Permission::create(['name' => 'view posts']);
        Permission::create(['name' => 'create posts']);
        Permission::create(['name' => 'edit posts']);
        Permission::create(['name' => 'delete posts']);
        Permission::create(['name' => 'verification and validation']);
        Permission::create(['name' => 'generate posts']);

        //create roles and assign existing permissions
        $masyarakatRole = Role::create(['name' => 'masyarakat']);
        $masyarakatRole->givePermissionTo('view posts');
        $masyarakatRole->givePermissionTo('create posts');
        $masyarakatRole->givePermissionTo('edit posts');
        $masyarakatRole->givePermissionTo('delete posts');

        $petugasRole = Role::create(['name' => 'petugas']);
        $petugasRole->givePermissionTo('view posts');
        $petugasRole->givePermissionTo('verification and validation');

        $administrationRole = Role::create(['name' => 'administration']);
        $administrationRole->givePermissionTo('view posts');
        $administrationRole->givePermissionTo('generate posts');

        $superadminRole = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule

        // create demo users
        $user = User::factory()->create([
            'name' => 'Example user',
            'email' => 'masyarakat@qadrlabs.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($masyarakatRole);

        $user = User::factory()->create([
            'name' => 'Example petugas user',
            'email' => 'petugas@qadrlabs.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($petugasRole);

        $user = User::factory()->create([
            'name' => 'Example admin user',
            'email' => 'admin@qadrlabs.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($administrationRole);

        $user = User::factory()->create([
            'name' => 'Example superadmin user',
            'email' => 'superadmin@qadrlabs.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($superadminRole);
    }
}