<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\Permission;;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('role_has_permissions')->truncate();

        $role        = Role::find(1);

        $permissions = Permission::all();

        $data        = [];

        foreach ($permissions as $permission) {
            $data [] = [
                'role_id'       => $role->id,
                'permission_id' => $permission->id,
            ];
        }

        DB::table('role_has_permissions')->insert($data);
    }
}
