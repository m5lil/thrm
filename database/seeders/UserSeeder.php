<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'key'     => 'App_name',
                'value'    => 'HRM(Leaves)',
                'description'    => 'Name of Application',
            ],
            [
                'key'     => 'Logo',
                'value'    => '#',
                'description'    => 'Logo of Application',
            ],
        ]);


    }
}
