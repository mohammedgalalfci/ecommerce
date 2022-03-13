<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderDetails;
use App\Http\Resources\OrderResource;
use App\Http\Requests\OrderRequest;
use App\Mail\OrderMail;
use Illuminate\Support\Facades\Mail;
class OrderController extends Controller
{
    public function index(){
        $orders=Order::orderBy('id', 'DESC')->get();
        return OrderResource::collection($orders);
        // return response()->json([OrderResource::collection($orders)],200);

    }
    public function getOrdersCount(){
        return  DB::table('orders')
        ->select(DB::raw('COUNT(*)'))
        ->where("status","=","pending")
        ->get();
    }

    public function store(OrderRequest $request){


        DB::transaction(function(){
            $data = request()->all();
            $order=Order::create([
                // 'order_number'=>$data['order_number'],
                'name'=>$data['name'],
                'discount'=>$data['discount'],
                'price'=>$data['price'],
                'email'=>$data['email'],
                'full_address'=>$data['full_address'],
                'country'=>$data['country'],
                'city'=>$data['city'],
                'house_no'=>$data['house_no'],
                'status'=>"pending",
                'phone'=>$data['phone'],
                'payment_method'=>$data['payment_method'],
                'user_id'=>$data['user_id'],

            ]);
            $carts = DB::table('carts')
                ->select('id','status')
                ->where('carts.user_id', '=',$order->user_id)
                ->where('carts.status', '=', 'waiting')
                ->get();
            for($i=0;$i<count($carts);$i++){
                OrderDetails::create([
                    'order_id' => $order->id,
                    'cart_id'=>$carts[$i]->id
                ]);
                DB::table('carts')
                ->update(['status'=>'completed']);
            }

            $this->sendOrderEmail($order);
        });

        // return new OrderResource($order);
        return response()->json(["message"=>"Order Created Successfully"],201);
    }
    public function sendOrderEmail($order){
        Mail::to($order->email)->send(new OrderMail($order));
    }
    public function show($order){
        $oneOrder=Order::findOrFail($order);
        return new OrderResource($oneOrder);
    }
    public function update($order,Request $req){
        $req->validate([
            'status' => 'in:pending,processing,completed,canceled',
    ]);
        $oneOrder=Order::findOrFail($order);
        $oneOrder->update([
            'status'=>$req['status']
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

    public function userOrders($userId){
        return  $orders = DB::table('orders')
        ->where('orders.user_id', '=',$userId)
        ->orderBy('id', 'DESC')->get();
    }

}
