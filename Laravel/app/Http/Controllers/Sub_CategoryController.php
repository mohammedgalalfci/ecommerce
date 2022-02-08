<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sub_Category;
use App\Http\Resources\Sub_CategoryResource;

class Sub_CategoryController extends Controller
{
    public function index(){
        $sub_categories=Sub_Category::all();  
        return Sub_CategoryResource::collection($sub_categories);
    }
    public function store(){
        $data = request()->all();
        $sub_category=Sub_Category::create([
            'subcat_name' => $data['subcat_name'],
            'cat_id' => $data['cat_id'],
        ]);
        return new Sub_CategoryResource($sub_category);
    }
    public function show($sub_category){
        $oneSubCategory=Sub_Category::findOrFail($sub_category);
        return new Sub_CategoryResource($oneSubCategory);
    }

    public function delete($sub_category){
        $oneSubCategory=Sub_Category::findOrFail($sub_category);
        $oneSubCategory->delete();
        return new Sub_CategoryResource($oneSubCategory);
    }
}
