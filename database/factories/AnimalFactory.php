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
        $gender = fake()->randomElement(['Male', 'Female']);
        $type = fake()->randomElement(['Dog', 'Cat']);
        $rescuer_id = fake()->numberBetween($min=1, $max=10);
        $adopter_id = fake()->numberBetween($min=1, $min=5);
        return [
            'rescuer_id' => $rescuer_id,
            'adopter_id' => $adopter_id,
            'name' => fake()->name(),
            'age' => fake()->randomDigit(),
            'breed' => fake()->text(10),
            'gender' => $gender,
            'type'=> $type,
            'location' => fake()->address()
        ];   
    }
}
