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
        'full_address',
        'user_id',
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
