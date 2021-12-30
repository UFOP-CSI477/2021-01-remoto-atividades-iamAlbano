<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Pessoa;
use App\Models\Vacina;
use App\Models\Unidade;


class RegistroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'pessoa_id' => Pessoa::all()->random()->id,
            'unidade_id' => Unidade::all()->random()->id,
            'vacina_id' => Vacina::all()->random()->id,
            'data' => $this->faker->date('Y-m-d'),
        ];
    }
}
