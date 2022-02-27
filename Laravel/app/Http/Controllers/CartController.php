<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Store;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;

class CartController extends Controller
{
    public function index(){
        $carts=Cart::all();
        return CartResource::collection($carts);

    }
    public function cartsForEachUser($id){
        return  $carts = DB::table('carts')
                ->select('products_number','total_price','product_name','cat_id','status')
                ->join('stores', 'carts.store_id', '=', 'stores.id')
                ->join('products','stores.product_id','=','products.id')
                ->join('users', 'carts.user_id', '=', 'users.id')
                ->where('carts.user_id', '=',$id)
                ->where('carts.status', '=', 'waiting')
                ->get();
    }
    public function store(CartRequest $request){
        $data = request()->all();
        $cart=Cart::create([
            'total_price' => $data['total_price'],
            'products_number' => $data['products_number'],
            'status' => $data['status'],
            'store_id'=> $data['store_id'],
            'user_id'=> $data['user_id'],
        ]);
        //return new CartResource($cart);
        return response()->json(["message"=>"Cart Created Successfully"],201);
    }
    public function show($cart){
        $oneCart=Cart::findOrFail($cart);
        return new CartResource($oneCart);
    }
    public function update($cart,Request $req){
        $req->validate([
            'status' => 'in:waiting,completed',
    ]);
        $oneCart=Cart::findOrFail($cart);
        $oneCart->update([
            'status' => $req['status'],
            // 'total_price' => $req['total_price'],
            // 'products_number' => $req['products_number'],
            // 'store_id'=> $req['store_id'],
            // 'user_id'=> $req['user_id'],
        ]);
        // return $oneCart;
        return response()->json(["message"=>"Cart Updated successfully"],201);
    }

    public function delete($cart){
        $oneCart=Cart::findOrFail($cart);
        $oneCart->delete();
        // return new CartResource($oneCart);
        return response()->json(["message"=>"Cart Deleted successfully"],201);
    }
}
