<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Resources\OrderResource;
use App\Http\Requests\OrderRequest;
class OrderController extends Controller
{
    public function index(){
        $orders=Order::all();
        return OrderResource::collection($orders);
        // return response()->json([OrderResource::collection($orders)],200);

    }
    public function store(OrderRequest $request){
        $data = request()->all();
        $order=Order::create([
            'order_number'=>$data['order_number'],
            'name'=>$data['name'],
            'discount'=>$data['discount'],
            'price'=>$data['price'],
            'quantity'=>$data['quantity'],
            'full_address'=>$data['full_address'],
            'country'=>$data['country'],
            'city'=>$data['city'],
            'house_no'=>$data['house_no'],
            'status'=>$data['status'],
            'phone'=>$data['phone'],
            'payment_method'=>$data['payment_method'],
            'customer_id'=>$data['customer_id'],
            'cart_id'=>$data['cart_id'],
        ]);
        // return new OrderResource($order);
        return response()->json(["message"=>"Order Created Successfully"],201);
    }
    public function show($order){
        $oneOrder=Order::findOrFail($order);
        return new OrderResource($oneOrder);
    }
    public function update($order,OrderRequest $req){
        $oneOrder=Order::findOrFail($order);
        $oneOrder->update([
            'order_number'=>$req['order_number'],
            'name'=>$req['name'],
            'discount'=>$req['discount'],
            'price'=>$req['price'],
            'quantity'=>$req['quantity'],
            'full_address'=>$req['full_address'],
            'country'=>$req['country'],
            'city'=>$req['city'],
            'house_no'=>$req['house_no'],
            'status'=>$req['status'],
            'phone'=>$req['phone'],
            'payment_method'=>$req['payment_method'],
            'customer_id'=>$req['customer_id'],
            'cart_id'=>$req['cart_id'],
       ]);
    //    return  $oneOrder;
       return response()->json(["message"=>"Order Updated Successfully"],201);

   }

    public function delete($order){
        $oneOrder=Order::findOrFail($order);
        $oneOrder->delete();
        // return new OrderResource($oneOrder);
        return response()->json(["message"=>"Order Deleted Successfully"],201);
    }
}
