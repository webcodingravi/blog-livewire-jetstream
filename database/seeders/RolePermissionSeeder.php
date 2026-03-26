<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Roles
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $author = Role::firstOrCreate(['name' => 'author']);
        $user = Role::firstOrCreate(['name' => 'user']);

        // Permission list
        $permission = [
            // Post
            'create_post',
            'edit_post',
            'delete_post',
            'publish_post',

            // Categories
            'manage_categories',

            // Users
            'manage_users',

            // Settings
            'manage_settings',

            // Comments
            'create_comment',
            'delete_comment',
            'approve_comment',

        ];

        // create permissions
        foreach ($permission as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Admin all permissions
        $admin->givePermissionTo(Permission::all());

        // Author limited permissions
        $author->givePermissionTo([
            'create_post',
            'edit_post',
            'publish_post',
        ]);

        // user (normal)
        $user->givePermissionTo([
            'create_comment', // frontend users
        ]);

    }
}
