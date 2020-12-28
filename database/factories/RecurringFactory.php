<?php

namespace Database\Factories;

use App\Models\Recurring;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecurringFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recurring::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'repeating_type' => 'monthly',
            'day' => $this->faker->numberBetween(1, 28),
            'billing_date' => $this->faker->dateTimeBetween('-50 days', 'now')->format('Y-m-d'),
            'description' => implode(' ', array_map('ucfirst', $this->faker->words(3))),
            'amount' => $this->faker->randomNumber(3)
        ];
    }
}
