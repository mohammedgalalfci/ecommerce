<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'order_number'=>$this->order_number,
            'name'=>$this->name,
            'discount'=>$this->discount,
            'price'=>$this->price,
            'quantity'=>$this->quantity,
            'country'=>$this->country,
            'city'=>$this->city,
            'house_no'=>$this->house_no,
            'status'=>$this->status,
            'phone'=>$this->phone,
            'payment_method'=>$this->payment_method,
            'customer_id'=>$this->customer_id,
            'cart_id'=>$this->cart_id,
        ];
    }
}
