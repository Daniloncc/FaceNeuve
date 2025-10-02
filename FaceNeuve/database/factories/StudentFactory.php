<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\City;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->buildingNumber() . ' ' . fake()->streetName(),
            'birthday' => fake()->dateTimeBetween('-65 years', '-16 years'),
            'city_id' => City::inRandomOrder()->first()->id ?? City::factory(),
        ];
    }
}
