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

    public function delete($order){
        $oneOrder=Order::findOrFail($order);
        $oneOrder->delete();
        return new OrderResource($oneOrder);
    }
}
