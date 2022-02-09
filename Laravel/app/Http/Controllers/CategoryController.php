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
    }
    public function store(CategoryRequest $req){
        $data = request()->all();
        $category=Category::create([
            'cat_name' => $data['cat_name'],
        ]);
        return new CategoryResource($category);
    }
    public function show($category){
        $oneCategory=Category::findOrFail($category);
        return new CategoryResource($oneCategory);
    }
    public function update($category,CategoryRequest $req){
        $oneCategory=Category::findOrFail($category);
        $oneCategory->update([
            'cat_name' => $req['cat_name'],
        ]);
        return $oneCategory;
    }

    public function delete($category){
        $oneCategory=Category::findOrFail($category);
        $oneCategory->delete();
        return new CategoryResource($oneCategory);
    }
}
