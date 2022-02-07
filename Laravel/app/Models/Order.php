<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable =[
        'order_number',
        'name',
        'discount',
        'price',
        'quantity',
        'country',
        'city',
        'house_no',
        'status',
        'phone',
        'payment_method',
        'customer_id',
        'cart_id'

    ];
    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
