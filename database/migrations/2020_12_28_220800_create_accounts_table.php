<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->enum('account_type',
            [
                "Cash",
                "Credit",
                "Investment",
                "Loan",
                "Property",
                "Cryptocurrency",
                "Other"
            ]);
            $table->enum('sub_type',
            [
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
            ])->nullable();
            $table->string('account_name');
            $table->string('bank_name');
            $table->string('balance')->nullable();
            $table->string('status')->default('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
