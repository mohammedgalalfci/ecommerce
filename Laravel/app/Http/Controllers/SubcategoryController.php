<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubcategoryRequest;
use Illuminate\Http\Request;
use App\Http\Resources\SubcategoryResource;
use App\Models\Subcategory;

class SubcategoryController extends Controller
{
    public function index(){
        $subcategories=Subcategory::all();
        return SubcategoryResource::collection($subcategories);
        // return response()->json([SubcategoryResource::collection($subcategories)],200);
    }
    public function store(SubcategoryRequest $req){
        $data = request()->all();
        $subcategory=Subcategory::create([
            'subcat_name' => $data['subcat_name'],
            'cat_id' => $data['cat_id'],
        ]);
        // return new SubcategoryResource($subcategory);
        return response()->json(["message"=>"Subcategory Created Successfully"],201);

    }
    public function show($subcategory){
        $oneSubCategory=Subcategory::findOrFail($subcategory);
        return new SubcategoryResource($oneSubCategory);
    }
    public function update($subcategory,Request $req){
        $req->validate(['subcat_name'=>['required', 'min:3', 'max:25']]);
        $oneSubCategory=Subcategory::findOrFail($subcategory);
        $oneSubCategory->update([
            'subcat_name'=>$req['subcat_name'],
            
        ]);
        // return $oneSubCategory;
        return response()->json(["message"=>"Subcategory Updated Successfully"],201);

    }

    public function delete($subcategory){
        $oneSubCategory=Subcategory::findOrFail($subcategory);
        $oneSubCategory->delete();
        // return new SubcategoryResource($oneSubCategory);
        return response()->json(["message"=>"Subcategory Deleted Successfully"],201);

    }
}
