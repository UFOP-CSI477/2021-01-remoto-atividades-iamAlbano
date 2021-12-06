<?php

namespace Database\Factories;
use App\Models\Person;
use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Address::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    
    public function definition()
    {
        $Person = Person::all();
        return [
            'cep' => $this->faker->numerify('#####-###'),
            'number' => $this->faker->randomNumber(5, false),
            'street' => $this->faker->streetName(),
            'neighborhood' => $this->faker->city(),
            'city' => $this->faker->city(),
            'uf' => $this->faker->stateAbbr(),
            'complement' => $this->faker->words(3, true),
            'person_id' => $this->faker->unique()->numberBetween(1, $Person->count()),
        ];
    }
}
