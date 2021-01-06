<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('display_name');
            $table->string('description')->nullable();
            $table->boolean('income')->default(0);
            $table->boolean('exclude_budget')->default(0);
            $table->boolean('exclude_totals')->default(0);
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
        Schema::dropIfExists('categories');
    }
}

// Budgets have multiple categories i.e
// -- Groceries, Coffee, Rent etc.

// Budgets are grouped by month
// For each month, a budgeted amount is set i.e a budget for February
// Groceries - $400
// Coffee - $80
// Rent - $3000

// And next to the budgeted amount for each category, there is an actual amount of transactions that are summed i.e
// Groceries - $300
// Coffee - $100
// Rent - $3000