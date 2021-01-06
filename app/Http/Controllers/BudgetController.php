<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    public function index()
    {

        $day = '01';
        $month = date('m');
        $year = date('Y');

        $date = $year . '-' . $month . '-' . $day;

        $budget = Budget::firstOrCreate([
            'starts_on' => $date
        ]);

        $grouped = DB::table('categories')
            ->leftJoin('transactions', function ($join) use ($month) {
                $join
                    ->on('transactions.category_id', '=', 'categories.id')
                    ->whereRaw('MONTH(date) = ?', [$month]);
            })
              ->leftJoin('budgets', function ($join) use ($month) {
                $join
                      ->on('budgets.id', '=', 'categories.id')
                      ->whereRaw('MONTH(starts_on) = ?', [$month]);
            })
            ->groupBy('categories.display_name', 'budgets.amount')
            ->selectRaw(
                'SUM(transactions.amount) AS sum, categories.display_name AS name, budgets.amount AS amount'
            )
          ->get();
    }
}


//
//
//