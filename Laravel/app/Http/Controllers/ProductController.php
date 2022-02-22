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
        $product=new Product;
        $product->product_name=$request->product_name;
        $product->description=$request->description;
        $product->price=$request ->price;
        $product->discount=$request ->discount;
        $product->subcat_id=$request->subcat_id;
        $product->cat_id=$request->cat_id;
        $data=$product->store($product);
        if($request->hasFile('image')){

            $fileName = $request->file('image')->getClientOriginalName();
            $nameOnly=pathinfo($fileName,PATHINFO_FILENAME);
            $extention=$request->file('image')->getClientOriginalExtension();
            $complexPic=str_replace(' ','_',$nameOnly.'-'.rand().'_'.time().'.'.$extention);
            $path=$request->file('image')->move('public/image',$complexPic);
        }
        $product->image=$complexPic;
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
            'description'=>['min:10', 'max:255'],
            'price'=>['numeric'],
            'discount'=>'numeric',
    ]);
        $oneProduct=Product::findOrFail($product);
        $oneProduct->update([
            'product_name' => $req['product_name'],
            'description' => $req['description'],
            'price'=>$req['price'],
            'discount'=>$req['discount'],
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

    public function ProductsForeachSubCategory($catId){
        return Product::where('subcat_id','=',$catId)->latest()->paginate(2);
    }
    public function getAllProductsForSubCategory($catId){
        return Product::where('subcat_id','=',$catId)->get();
    }
    public function productsCategory($catId){
        return Product::where('cat_id','=',$catId)->get();
    }
}
