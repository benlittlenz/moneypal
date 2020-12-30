<?php

namespace App\Http\Resources;

use App\Http\Resources\AccountResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'date' => $this->date,
            'payee' => $this->payee,
            'amount' => $this->amount,
            'notes' => $this->notes,
            'account' => new AccountResource($this->accounts),
            'category' => new CategoryResource($this->categories),
        ];
    }
}
