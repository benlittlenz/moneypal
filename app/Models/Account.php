<?php

namespace App\Models;

use App\Models\Recurring;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function recurrings()
    {
        return $this->hasMany(Recurring::class);
    }
}
