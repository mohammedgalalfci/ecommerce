<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\Subcategory;
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
        $product->cat_id=$request->cat_id;
        // if($request->hasFile('image')){
        //     $fileName = $request->file('image')->getClientOriginalName();
        //     $nameOnly=pathinfo($fileName,PATHINFO_FILENAME);
        //     $extention=$request->file('image')->getClientOriginalExtension();
        //     $complexPic=str_replace(' ','_',$nameOnly.'-'.rand().'_'.time().'.'.$extention);
        //     $path=$request->file('image')->storeAs('public/products',$complexPic);
        // }
        // $product->image=$complexPic;
        $product->save();
        return response()->json(["message"=>"Product Created Successfully"],201);

    }

    public function show($product){
        $oneProduct=Product::findOrFail($product);
        return new ProductResource($oneProduct);
    }

    public function update($product,Request $req){
        $req->validate([
            'product_name'=>['min:3','max:25'],
        'description'=>['min:10', 'max:255']
    ]);
        $oneProduct=Product::findOrFail($product);
        $oneProduct->update([
            'product_name' => $req['product_name'],
            'description' => $req['description'],
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

    public function search($proName){
        return Product::where('product_name','like','%'.$proName.'%')->get();
    }

    public function specificProductsForeachCategory($catId){
        return Product::where('subcat_id','=',$catId)->latest()->paginate(2);
    }

    public function allProductsForeachCategory($catId){
        return Product::where('subcat_id','=',$catId)->get();
    }

    public function productsCategory($catId){
        return Product::where('cat_id','=',$catId)->get();
    }
}
