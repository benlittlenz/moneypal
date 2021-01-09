<?php

namespace App\Http\Resources;

use App\Http\Resources\AccountResource;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RecurringResource extends JsonResource
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
            'merchant' => $this->merchant,
            'repeating_cadence' => $this->repeating_cadence,
            'billing_date' => $this->billing_date,
            'description' => $this->description,
            'amount' => $this->amount,
            'account' => new AccountResource($this->accounts),
            'category' => new CategoryResource($this->categories),
        ];
    }
}
