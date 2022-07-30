<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AnimalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        $gender = fake()->randomElement(['male', 'female']);
        $type = fake()->randomElement(['Dog', 'Cat']);
        return [
            'name' => fake()->name(),
            'age' => fake()->randomDigit(),
            'breed' => fake()->text(10),
            'gender' => $gender,
            'type'=> $type
        ];
        
    }
}
