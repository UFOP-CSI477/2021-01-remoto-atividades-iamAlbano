<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
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
            'um' => $this->faker->randomLetter(),
        ];
    }
}
