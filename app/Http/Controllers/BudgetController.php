<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BudgetController extends Controller
{
    public function show(Request $request)
    {
        //dd($request->month);
        $day = '01';
        $month = $request->month;
        $year = $request->year;
        $date = $year . '-' . $month . '-' . $day;

        $budget = Budget::where('starts_on', $date)->get();

        if (count($budget) < 1) {
            //dd('less than');
            $categories = Category::all();
            //dd($categories);
            foreach ($categories as $category) {
                Budget::create([
                    'category_id' => $category->id,
                    'starts_on' => $date,
                ]);
            }
        }

        //dd(count($budget));

        return DB::table('categories')
            ->leftJoin('transactions', function ($join) use ($month, $year) {
                $join
                    ->on('transactions.category_id', '=', 'categories.id')
                    ->whereRaw('MONTH(date) = ?', [$month])
                    ->whereRaw('YEAR(date) = ?', [$year]);
            })
            ->leftJoin('budgets', function ($join) use ($month, $year) {
                $join
                    ->on('budgets.category_id', '=', 'categories.id')
                    ->whereRaw('MONTH(starts_on) = ?', [$month])
                    ->whereRaw('YEAR(starts_on) = ?', [$year]);
            })
            ->groupBy('categories.display_name', 'budgets.amount', 'categories.id', 'budgets.id')
            ->selectRaw(
                'SUM(transactions.amount) AS sum,
                categories.display_name AS display_name,
                budgets.amount AS budgeted_amount,
                categories.id AS category_id,
                budgets.id AS budget_id'
            )
            ->get();
    }

    public function update(Budget $budget)
    {
        //dd(request('budget_amount'));
        return $budget->update([
            'amount' => request('budget_amount')
        ]);
    }
}
