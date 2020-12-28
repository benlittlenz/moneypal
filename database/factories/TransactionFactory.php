<?php

namespace Database\Factories;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Transaction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween('-50 days', 'now')->format('Y-m-d'),
            'category_id' => 1,
            'amount' => $this->faker->randomNumber(3),
            'notes' => implode(' ', array_map('ucfirst', $this->faker->words(3))),
            'account_id' => 1
        ];
    }
}
