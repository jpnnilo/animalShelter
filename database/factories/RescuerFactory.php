<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RescuerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = fake()->randomElement(['Male','Female']);   
        return [
            'name' => fake()->name(),
            'age' => fake()->randomDigit(),
            'gender' => $gender
        ];

        // $gender = fake()->randomElement(['Male', 'Female']);
        // return [
        //     'name' => fake()->name(),
        //     'age' => fake()->randomDigit(),
        //     'gender' => $gender,
        // ];

    }
}
