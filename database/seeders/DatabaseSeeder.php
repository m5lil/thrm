<?php

namespace Database\Seeders;

use App\Modules\Acl\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//         User::factory()->count(10)->create();
        $this->call([
            UserSeeder::class,
            AclSeeder::class,
        ]);

    }
}
