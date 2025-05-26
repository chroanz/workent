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
            'capacity' => $this->faker->numberBetween(3, 7),
            'price' => $this->faker->randomFloat(2, 50, 200),
            'description' => $this->faker->text(200),
        ];
    }
}
