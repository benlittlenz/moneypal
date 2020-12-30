<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //$transaction = $this->whenLoaded('transactions');
        return [
            'id' => $this->id,
            'account_type' => $this->account_type,
            'account_name' => $this->account_name,
            'bank_name' => $this->bank_name,
            //'transaction' => new TransactionResource($this->transaction)
        ];
    }
}
