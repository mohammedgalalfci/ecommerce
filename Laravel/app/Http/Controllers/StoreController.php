<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\StoreResource;
use App\Models\Store;
class StoreController extends Controller
{
    public function index(){
        $stores=Store::all();  
        return StoreResource::collection($stores);
    }
    public function store(){
        $data = request()->all();
        $store=Store::create([
            'price'=>$data['price'],
            'size'=>$data['size'],
            'color'=>$data['color'],
            'discount'=>$data['discount'],
            'product_id'=>$data['product_id'],
        ]);
        return new StoreResource($store);
    }
    public function show($store){
        $oneStore=Store::findOrFail($store);
        return new StoreResource($oneStore);
    }
    public function update($store,Request $req){
        $oneStore=Store::findOrFail($store);
        $oneStore->update([
            'price'=>$req['price'],
            'size'=>$req['size'],
            'color'=>$req['color'],
            'discount'=>$req['discount'],
            'product_id'=>$req['product_id'],
        ]);
        return $oneStore;
    } 

    public function delete($store){
        $oneStore=Store::findOrFail($store);
        $oneStore->delete();
        return new StoreResource($oneStore);
    }
}
