<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return CategoryResource::collection($categories);
        // return response()->json([CategoryResource::collection($categories)],200);
    }
    public function store(CategoryRequest $req){
        $data = request()->all();
        $category=Category::create([
            'cat_name' => $data['cat_name'],
        ]);
        // return new CategoryResource($category);
        return response()->json(["message"=>"Category Created Successfully"],201);
    }
    public function show($category){
        $oneCategory=Category::findOrFail($category);
        // return new CategoryResource($oneCategory);
        return response()->json(["message"=>"Category Updated successfully"],201);
    }
    public function update($category,Request $req){
        $req->validate(['cat_name'=>['required','unique:categories,id,:id', 'min:3', 'max:25']]);
        $oneCategory=Category::findOrFail($category);
        $oneCategory->update([
            'cat_name' => $req['cat_name'],
        ]);
        return $oneCategory;
    }

    public function delete($category){
        $oneCategory=Category::findOrFail($category);
        $oneCategory->delete();
        // return new CategoryResource($oneCategory);
        return response()->json(["message"=>"Category Deleted successfully"],201);
    }
}
