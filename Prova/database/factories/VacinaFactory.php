<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VacinaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->word(),
            'fabricante' => $this->faker->word(),
            'pais' => $this->faker->country(),
            'doses' => $this->faker->numberBetween(1, 3),
        ];
    }
}
