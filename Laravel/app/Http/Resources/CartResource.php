<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'total_price'=>$this->total_price,
            'products_number'=>$this->products_number,
            'status'=>$this->status,
            'store_id'=>$this->store_id,
            'user_id'=>$this->user_id,
        ];
    }
}
