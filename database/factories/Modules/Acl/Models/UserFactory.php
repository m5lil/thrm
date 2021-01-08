<?php

namespace Database\Factories\Modules\Acl\Models;

use App\Modules\Acl\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            DB::table('users')->insert([
                'first_name' => $this->faker->firstName,
                'last_name' => $this->faker->lastName,
                'username' => $this->faker->unique()->userName,
                'gender' => $this->faker->randomElement(['male', 'female']),
                'mobile' => $this->faker->phoneNumber,
                'email' => $this->faker->unique()->safeEmail,
                'password' => Hash::make('123123123'),
            ])
        ];
    }
}
