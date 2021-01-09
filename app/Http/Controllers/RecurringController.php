<?php

namespace App\Http\Controllers;

use App\Models\Recurring;
use Illuminate\Http\Request;

class RecurringController extends Controller
{
    public function store() {
        //dd(request());
        $data = request()->validate([
            'merchant' => '',
            'repeating_cadence' => 'required',
            'billing_date' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'account_id' => 'required',
            'amount' => 'required',
            'description' => 'max:255',
        ]);

        $recurringItem = Recurring::create($data);
        $recurringItem->save();

        return $recurringItem;
    }
}
