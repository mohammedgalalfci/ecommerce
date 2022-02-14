<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(){
        $products=Product::all();
        return ProductResource::collection($products);
    }
    public function store(ProductRequest $request){
        // $data = request()->all();
        // $product=Product::create([
        //     'product_name' => $data['product_name'],
        //     'description' => $data['description'],
        //     'image' => $data['image'],
        //     'image_path' => $data['image_path'],
        //     'subcat_id' => $data['subcat_id']
        // ]);
        // return new ProductResource($product);
        $product=new Product;
        $product->product_name=$request->product_name;
        $product->description=$request->description;
        $product->subcat_id=$request->subcat_id;
        if($request->hasFile('image')){
            $fileName = $request->file('image')->getClientOriginalName();
            $nameOnly=pathinfo($fileName,PATHINFO_FILENAME);
            $extention=$request->file('image')->getClientOriginalExtension();
            $complexPic=str_replace(' ','_',$nameOnly.'-'.rand().'_'.time().'.'.$extention);
            $path=$request->file('image')->storeAs('public/products',$complexPic);
        }
        $product->image=$complexPic;
        $product->save();
        return response()->json(["message"=>"Product Created Successfully"],201);

    }

    public function show($product){
        $oneProduct=Product::findOrFail($product);
        return new ProductResource($oneProduct);
    }

    public function update($product,ProductRequest $req){
        $oneProduct=Product::findOrFail($product);
        $oneProduct->update([
            'product_name' => $req['product_name'],
            'description' => $req['description'],
            'image' => $req['image'],
            'image_path' => $req['image_path'],
            'subcat_id' => $req['subcat_id']
        ]);
        // return $oneProduct;
        return response()->json(["message"=>"Product Updated Successfully"],201);
    }

    public function delete($product){
        $oneProduct=Product::findOrFail($product);
        $oneProduct->delete();
        return new ProductResource($oneProduct);
        return response()->json(["message"=>"Product Deleted Successfully"],201);
    }
}
