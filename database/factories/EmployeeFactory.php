<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $name = fake()->name();
        $age = fake()->numberBetween($min = 20, $max = 60);
        $gender = fake()->randomElement(['Male','Female']);
        $type = fake()->randomElement(['Veterinarian','Caretaker']);
        return compact('name','age','gender','type');
    }
}
