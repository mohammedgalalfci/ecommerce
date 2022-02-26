<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderDetailsRequest;
use App\Http\Resources\OrderDetailsResource;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OrderDetailsController extends Controller
{
    public function index(){
        $order_details=OrderDetails::all();
        return OrderDetailsResource::collection($order_details);

    }
    public function store(OrderDetailsRequest $request){
        $data = request()->all();
        $order_detail=OrderDetails::create([

            'cart_id'=>$data['cart_id'],
            'order_id'=>$data['order_id'],
        ]);
        // return new OrderResource($order);
        return response()->json(["message"=>"Order Details Created Successfully"],201);
    }
    public function show($orderdetails){
        $oneOrderDetail=OrderDetails::findOrFail($orderdetails);
        return new OrderDetailsResource($oneOrderDetail);
    }

    public function delete($oneOrderDetail){
        $oneOrderDetail=OrderDetails::findOrFail($oneOrderDetail);
        $oneOrderDetail->delete();
        // return new OrderResource($oneOrder);
        return response()->json(["message"=>"Order Details Deleted Successfully"],201);
    }
}
