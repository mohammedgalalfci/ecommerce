<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Http\Resources\SubCategoryResource;

class SubCategoryController extends Controller
{
    public function index(){
        $subcategories=SubCategory::all();  
        return SubCategoryResource::collection($subcategories);
    }
    public function store(){
        $data = request()->all();
        $subcategory=SubCategory::create([
            'subcat_name' => $data['subcat_name'],
            'cat_id' => $data['cat_id'],
        ]);
        return new SubCategoryResource($subcategory);
    }
    public function show($subcategory){
        $oneSubCategory=SubCategory::findOrFail($subcategory);
        return new SubCategoryResource($oneSubCategory);
    }

    public function delete($subcategory){
        $oneSubCategory=SubCategory::findOrFail($subcategory);
        $oneSubCategory->delete();
        return new SubCategoryResource($oneSubCategory);
    }
}
