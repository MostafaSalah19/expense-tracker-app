<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount' => $this->faker->numberBetween(10, 5000),
            'user_id' => User::factory(),
            'date' => $this->faker->date(),
            'category' => $this->faker->sentence(),
            'type' => $this->faker->randomElement(['income', 'expense'])
        ];
    }
}
