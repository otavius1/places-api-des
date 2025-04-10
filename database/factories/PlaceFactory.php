<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlaceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->company . ' Park',
            'city' => $this->faker->city,
            'state' => $this->faker->stateAbbr,
        ];
    }
}
