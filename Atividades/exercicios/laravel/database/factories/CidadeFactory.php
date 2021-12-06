<?php

namespace Database\Factories;
use App\Models\Estado;
use Illuminate\Database\Eloquent\Factories\Factory;

class CidadeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->city,
            'estado_id' => Estado::factory(),
        ];
    }
}
