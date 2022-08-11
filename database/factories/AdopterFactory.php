<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adopters>
 */
class AdopterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->name();
        $email = fake()->unique()->email();
        $age = fake()->numberBetween($min=10, $max=70);
        $gender = fake()->randomElement(['Male','Female']);
        $address = fake()->address();
        return compact('name','age','gender','address','email');
    }
}
