<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =[
        'product_name',
        'description',
        'image',
        'image_path',
        'subcat_id'

    ];
    public function sub_category()
    {
        return $this->belongsTo(Sub_Category::class);
    }

    public function store()
    {
        return $this->hasMany(Store::class);
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }
}
