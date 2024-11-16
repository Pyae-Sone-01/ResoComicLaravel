<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Permission;;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('permissions')->truncate();

        $datas = collect([
            /*******  Dashboard  *******/
            ['id' => 1, 'parent_id' => 0, 'name' => 'dashboard', 'label' => 'Dashboard'],
            ['id' => 2, 'parent_id' => 1, 'name' => 'dashboard.listing', 'label' => 'Dashboard'],
            /*******  Users  *******/
            ['id' => 3, 'parent_id' => 0, 'name' => 'users', 'label' => 'Users'],
            ['id' => 4, 'parent_id' => 3, 'name' => 'users.listing', 'label' => 'User Listing'],
            ['id' => 5, 'parent_id' => 3, 'name' => 'users.create', 'label' => 'Create User'],
            ['id' => 6, 'parent_id' => 3, 'name' => 'users.edit', 'label' => 'Edit User'],
            ['id' => 7, 'parent_id' => 3, 'name' => 'users.delete', 'label' => 'Delete User'],
            /*******  Roles  *******/
            ['id' => 8, 'parent_id' => 0, 'name' => 'roles', 'label' => 'Roles'],
            ['id' => 9, 'parent_id' => 8, 'name' => 'roles.listing', 'label' => 'Role Listing'],
            ['id' => 10, 'parent_id' => 8, 'name' => 'roles.create', 'label' => 'Create Role'],
            ['id' => 11, 'parent_id' => 8, 'name' => 'roles.edit', 'label' => 'Edit Role'],
            ['id' => 12, 'parent_id' => 8, 'name' => 'roles.delete', 'label' => 'Delete Role'],
            /*******  Permissions  *******/
            ['id' => 13, 'parent_id' => 0, 'name' => 'permissions', 'label' => 'Permissions'],
            ['id' => 14, 'parent_id' => 13, 'name' => 'permissions.listing', 'label' => 'Permission Listing'],
            ['id' => 15, 'parent_id' => 13, 'name' => 'permissions.create', 'label' => 'Create Permission'],
            ['id' => 16, 'parent_id' => 13, 'name' => 'permissions.edit', 'label' => 'Edit Permission'],
            ['id' => 17, 'parent_id' => 13, 'name' => 'permissions.delete', 'label' => 'Delete Permission'],
            /*******  Media Library  *******/
            ['id' => 18, 'parent_id' => 0, 'name' => 'media_library', 'label' => 'Media Library'],
            ['id' => 19, 'parent_id' => 18, 'name' => 'media_library.listing', 'label' => 'Media Library'],
            /*******  Blogs  *******/
            ['id' => 20, 'parent_id' => 0, 'name' => 'blogs', 'label' => 'Blogs'],
            ['id' => 21, 'parent_id' => 20, 'name' => 'blogs.listing', 'label' => 'Blog Listing'],
            ['id' => 22, 'parent_id' => 20, 'name' => 'blogs.create', 'label' => 'Create Blog'],
            ['id' => 23, 'parent_id' => 20, 'name' => 'blogs.edit', 'label' => 'Edit Blog'],
            ['id' => 24, 'parent_id' => 20, 'name' => 'blogs.delete', 'label' => 'Delete Blog'],

        ]);

        $datas->map(function ($data) {
            Permission::create($data);
        });
    }
}
