<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Resources\AccountResource;

class AccountController extends Controller
{
    public function index()
    {
        return AccountResource::collection(Account::all());
    }
}
