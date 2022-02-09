<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubcategoryResource;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    public function index(){
        $sub_categories=Subcategory::all();
        return SubcategoryResource::collection($sub_categories);
    }
    public function store(){
        $data = request()->all();
        $subcategory=Subcategory::create([
            'subcat_name' => $data['subcat_name'],
            'cat_id' => $data['cat_id'],
        ]);
        return new SubcategoryResource($subcategory);
    }
    public function show($subcategory){
        $oneSubCategory=Subcategory::findOrFail($subcategory);
        return new SubcategoryResource($oneSubCategory);
    }

    public function delete($subcategory){
        $oneSubCategory=Subcategory::findOrFail($subcategory);
        $oneSubCategory->delete();
        return new SubcategoryResource($oneSubCategory);
    }
}
