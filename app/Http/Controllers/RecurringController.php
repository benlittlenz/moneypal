<?php

namespace App\Http\Controllers;

use App\Http\Resources\RecurringResource;
use App\Models\Recurring;
use Illuminate\Http\Request;

class RecurringController extends Controller
{
    public function index()
    {
        $recurrings = Recurring::with(['accounts', 'categories']);
        return RecurringResource::collection($recurrings->paginate(25))->response();
    }

    public function store()
    {
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

    public function update(Recurring $recurring)
    {
        ///dd(request());
        return $recurring->update([
            'merchant' => request('merchant'),
            'repeating_cadence' => request('repeating_cadence'),
            'billing_date' => request('billing_date'),
            'category_id' => request('category_id'),
            'description' => request('description'),
            'account_id' => request('account_id'),
            'amount' => request('amount'),
        ]);
    }
}
