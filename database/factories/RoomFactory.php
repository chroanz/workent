<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'capacity' => $this->faker->numberBetween(4, 10),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'description' => $this->faker->text(200),
        ];
    }
}
