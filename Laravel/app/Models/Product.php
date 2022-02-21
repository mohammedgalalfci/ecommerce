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
        'price',
        'discount',
        'subcat_id',
        'cat_id'

    ];
    public function sub_category()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function store()
    {
        // DB::table('products')->insert($data); /* not sure */
        return $this->hasMany(Store::class);
    }

    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    public function customer()
    {
        return $this->belongsToMany(Customer::class);
    }
    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
