<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Budget extends Model
{
    use HasFactory;
    protected $guarded = [];

    // Budgets are grouped by year and month

    // Budgets are also connected to categories
    // Budgets connect to many categories
    // Categories are connected to one budget

    // Budgets have a monthly budget
    // Transactions that have a a category connected are summed
    // as a 'difference' between budgeted value and total value for that month

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
