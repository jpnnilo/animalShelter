<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MaterialDonation>
 */
class MaterialDonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $donor = fake()->name();
        $item = fake()->randomElement(['Dog Food', 'Medicine', 'Cat Food']);
        $quantity = fake()->randomDigit();
        $date = fake()->dateTime();
        return compact('donor', 'item', 'quantity', 'date');
    }
}
