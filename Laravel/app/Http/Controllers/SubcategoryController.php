<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\SubcategoryResource;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    public function index(){
        $subcategories=Subcategory::all();
        return SubcategoryResource::collection($subcategories);
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
    public function update($subcategory,Request $req){
        $oneSubCategory=Subcategory::findOrFail($subcategory);
        $oneSubCategory->update([
            'subcat_name'=>$req['subcat_name'],
            'cat_id'=>$req['cat_id'],
        ]);
        return $oneSubCategory;
    }

    public function delete($subcategory){
        $oneSubCategory=Subcategory::findOrFail($subcategory);
        $oneSubCategory->delete();
        return new SubcategoryResource($oneSubCategory);
    }
}
