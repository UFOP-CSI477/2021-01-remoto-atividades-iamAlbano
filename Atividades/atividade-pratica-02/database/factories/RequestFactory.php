<?php

namespace Database\Factories;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Provider\pt_BR\Person;

class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
       

        return [
            'user_id' => User::all()->random()->id,
            'subject_id' => Subject::all()->random()->id,
            'person' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'date' => $this->faker->date('Y-m-d'),
        ];
    }
}