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
            'amount' => fake()->numberBetween(10, 5000),
            'user_id' => User::factory(),
            'category' => fake()->randomElement(['Food', 'Transport', 'Salary', 'Rent', 'Shopping']),
            'type' => fake()->randomElement(['income', 'expense']),
        ];
    }
}
