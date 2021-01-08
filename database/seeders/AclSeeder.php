<?php

namespace Database\Seeders;

use App\Modules\Acl\Models\Permission;
use App\Modules\Acl\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AclSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'view-leaves',
            'add-leaves',
            'edit-leaves',
            'delete-leaves',
        ];


        DB::table('roles')->insert(['name' => 'Admin']);
        DB::table('roles')->insert(['name' => 'HR']);
        DB::table('roles')->insert(['name' => 'Employee']);


        foreach ($permissions as $permission) {
            DB::table('permissions')->insert(['name' => $permission]);
        }


    }
}
