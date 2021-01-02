<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TagResource extends JsonResource
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
            'name' => $this->account_type,
            'description' => $this->sub_type,
            'color' => $this->account_name,
            //'transaction' => new TransactionResource($this->transaction)
        ];
    }
}
