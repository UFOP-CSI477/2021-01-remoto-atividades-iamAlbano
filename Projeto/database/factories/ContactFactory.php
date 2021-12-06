<?php

namespace Database\Factories;
use App\Models\Person;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $Person = Person::all();
        return [
            'email' => $this->faker->email(),
            'telephone' => $this->faker->cellphoneNumber(),
            'smartphone' => $this->faker->cellphone(),
            'person_id' => $this->faker->unique()->numberBetween(1, $Person->count()),
        ];
    }
}
