<?php

namespace Database\Factories;

use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Users::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'superadmin',
            'role' => '1',
            'email' => 'superadmin@vnu.edu.vn',
            'address' => '144 Xuân Thủy, Cầu Giấy, Hà Nội',
            'mobile' => '024.37547.46',
            'password' => bcrypt('12345678'), // password
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }
}
