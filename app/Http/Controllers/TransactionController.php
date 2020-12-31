<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Resources\TransactionResource;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['accounts', 'categories']);
        return TransactionResource::collection($transactions->paginate(25))->response();
    }

    public function store() {
        $data = request()->validate([
            'date' => '',
            'category_id' => '',
            'payee' => '',
            'amount' => '',
            'notes' => '',
            'account_id' => '',
        ]);

        //dd($data);

        $transaction = Transaction::create($data);
        $transaction->save();

        return $transaction;
    }
}
