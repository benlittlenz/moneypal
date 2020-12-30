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
}
