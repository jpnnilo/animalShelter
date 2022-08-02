<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CashDonationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $donor = fake()->name();
        $amount = fake()->numberBetween($min=0, $max=2000);
        $date = fake()->dateTime();
        return compact('donor','amount','date');
    }
}
