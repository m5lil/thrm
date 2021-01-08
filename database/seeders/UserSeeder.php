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
        DB::table('users')->insert([
            'first_name' => 'Mahmoud',
            'last_name' => 'Khalil',
            'username' => 'm5lil',
            'gender' => 'Male',
            'mobile' => '201023023336',
            'email' => 'm5lil@live.com',
            'password' => Hash::make('123123123'),
        ]);

    }
}
