<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function index(){
        $carts=Cart::all();
        return CartResource::collection($carts);
    }
    public function store(CartRequest $request){
        $data = request()->all();
        $cart=Cart::create([
            'total_price' => $data['total_price'],
            'products_number' => $data['products_number'],
            'status' => $data['status'],
            'store_id'=> $data['store_id'],
            'customer_id'=> $data['customer_id'],
        ]);
        //return new CartResource($cart);
        return response()->json(["message"=>"Product added successfuly"],200);
    }
    public function show($cart){
        $oneCart=Cart::findOrFail($cart);
        return new CartResource($oneCart);
    }
    public function update($cart,CartRequest $req){
        $oneCart=Cart::findOrFail($cart);
        $oneCart->update([
            'total_price' => $req['total_price'],
            'products_number' => $req['products_number'],
            'status' => $req['status'],
            'store_id'=> $req['store_id'],
            'customer_id'=> $req['customer_id'],
        ]);
        return $oneCart;
    }

    public function delete($admin){
        $oneAdmin=Cart::findOrFail($admin);
        $oneAdmin->delete();
        return new CartResource($oneAdmin);
    }
}
