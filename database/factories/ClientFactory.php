<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'birthday' => fake()->date(),
            'address' => fake()->address(),
            'user_id' => null,
        ];
    }
}
