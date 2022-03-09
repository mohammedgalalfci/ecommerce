<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Models\Product;
use App\Http\Models\User;


class Comment extends Model
{
    use HasFactory;
    protected $fillable =[
        'comment',
        'user_id',
        'product_id',
        'created_at'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
