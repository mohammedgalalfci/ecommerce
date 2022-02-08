<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Resources\OrderResource;

class OrderController extends Controller
{
    public function index(){
        $orders=Order::all();
        return OrderResource::collection($orders);
    }
    public function store(){
        $data = request()->all();
        $order=Order::create([
            'order_number'=>$data['order_number'],
            'name'=>$data['name'],
            'discount'=>$data['discount'],
            'price'=>$data['price'],
            'quantity'=>$data['quantity'],
            'country'=>$data['country'],
            'city'=>$data['city'],
            'house_no'=>$data['house_no'],
            'status'=>$data['status'],
            'phone'=>$data['phone'],
            'payment_method'=>$data['payment_method'],
            'customer_id'=>$data['customer_id'],
            'cart_id'=>$data['cart_id'],
        ]);
        return new OrderResource($order);
    }
    public function show($order){
        $oneOrder=Order::findOrFail($order);
        return new OrderResource($oneOrder);
    }
    public function update($order,Request $req){
        $oneOrder=Order::findOrFail($order);
        $oneOrder->update([
            'order_number'=>$req['order_number'],
            'name'=>$req['name'],
            'discount'=>$req['discount'],
            'price'=>$req['price'],
            'quantity'=>$req['quantity'],
            'country'=>$req['country'],
            'city'=>$req['city'],
            'house_no'=>$req['house_no'],
            'status'=>$req['status'],
            'phone'=>$req['phone'],
            'payment_method'=>$req['payment_method'],
            'customer_id'=>$req['customer_id'],
            'cart_id'=>$req['cart_id'],
       ]);
       return  $oneOrder;
   }

    public function delete($order){
        $oneOrder=Order::findOrFail($order);
        $oneOrder->delete();
        return new OrderResource($oneOrder);
    }
}
