<?php

namespace Database\Factories;

use App\Models\Account;
use Illuminate\Database\Eloquent\Factories\Factory;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'account_type' => $this->faker->randomElement(array(
                "Cash",
                "Credit",
                "Investment",
                "loan",
                "Property",
                "Cryptocurrency",
                "Other"
            )),
            'sub_type' => $this->faker->randomElement(array(
                "Checkings",
                "Savings",
                "Cash",
                "Credit Card",
                "Retirement",
                "Brokerage",
                "Mortage",
                "Student Loan",
                "Car Loan",
                "Line of Credit",
                "Residence",
                "Investment Property",
                "Vacation Property",
                "Commerical",
                "Land",
                "Car",
                "Motorbike",
                "Boat",
                "Scooter",
            )),
            'account_name' => $this->faker->randomElement(array(
                "BNZ",
                "ANZ",
                "Westpac",
            )),
            'bank_name' => $this->faker->word,
            'balance' => $this->faker->randomFloat(2, 500, 5000)
        ];
    }
}
