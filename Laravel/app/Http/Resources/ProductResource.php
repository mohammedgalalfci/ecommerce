<?php

namespace App\Http\Resources;

use App\Models\Subcategory;
use App\Models\Category;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'product_name'=>$this->product_name,
            'description'=>$this->description,
            'image'=>$this->image,
            'image_path'=>$this->image_path,
            'subcategory'=> new SubcategoryResource(Subcategory::find($this->subcat_id)),
            'category'=> new CategoryResource(Category::find($this->cat_id)),
        ];
    }
}
