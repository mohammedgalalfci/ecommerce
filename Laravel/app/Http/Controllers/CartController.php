<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $carts=Cart::all();
        return CartResource::collection($carts);
    }
    public function store(){
        $data = request()->all();
        $cart=Cart::create([
            'total_price' => $data['total_price'],
            'products_number' => $data['products_number'],
            'status' => $data['status'],
            'store_id'=> $data['store_id'],
            'customer_id'=> $data['customer_id'],
        ]);
        return new CartResource($cart);
    }
    public function show($cart){
        $oneCart=Cart::findOrFail($cart);
        return new CartResource($oneCart);
    }
    public function update($cart,Request $req){
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
