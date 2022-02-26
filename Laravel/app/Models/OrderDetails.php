<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable =[
        'cart_id',
        'order_id'

    ];
    public function order(){
        return $this->hasMany(Order::class);
    }
    public function cart(){
        return $this->hasMany(Cart::class);
    }
}
