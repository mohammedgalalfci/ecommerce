<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name'=>$this->name,
            'email'=>$this->email,
            // 'password'=>$this->password,
            'full_address'=>$this->full_address,
            'house_no'=>$this->house_no,
            'country'=>$this->country,
            'city'=>$this->city,
            'phone'=>$this->phone,

        ];
    }
}
