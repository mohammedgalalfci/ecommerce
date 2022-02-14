<?php

namespace App\Http\Controllers;

use App\Http\Resources\StoreResource;
use Illuminate\Http\Request;
use App\Models\Store;
use App\Http\Requests\StoreRequest;
class StoreController extends Controller
{
    public function index(){
        $stores=Store::all();
        return StoreResource::collection($stores);
    }
    public function store(StoreRequest $request){
        $data = request()->all();
        $store=Store::create([
            'price'=>$data['price'],
            'size'=>$data['size'],
            'color'=>$data['color'],
            'discount'=>$data['discount'],
            'product_id'=>$data['product_id'],
        ]);
        // return new StoreResource($store);
        return response()->json(["message"=>"Store Created Successfully"],201);

    }
    public function show($store){
        $oneStore=Store::findOrFail($store);
        return new StoreResource($oneStore);
    }
    public function update($store,StoreRequest $req){
        $oneStore=Store::findOrFail($store);
        $oneStore->update([
            'price'=>$req['price'],
            'size'=>$req['size'],
            'color'=>$req['color'],
            'discount'=>$req['discount'],
            'product_id'=>$req['product_id'],
        ]);
        // return $oneStore;
        return response()->json(["message"=>"Store Updated Successfully"],201);
    }

    public function delete($store){
        $oneStore=Store::findOrFail($store);
        $oneStore->delete();
        // return new StoreResource($oneStore);
        return response()->json(["message"=>"Store Deleted Successfully"],201);
    }
}
