<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
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
            'price'=>$this->price,
            'size'=>$this->size,
            'color'=>$this->color,
            'discount'=>$this->discount,
            'product_id'=>$this->product_id,
        ];
    }
}
