<?php

namespace App\Http\Controllers;

use App\Http\Resources\StoreResource;
use Illuminate\Http\Request;
use App\Models\Store;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreRequest;
class StoreController extends Controller
{
    public function index(){
        $stores=Store::orderBy('id', 'DESC')->get();
        return StoreResource::collection($stores);
    }
    public function store(StoreRequest $request){
        $data = request()->all();
        $store=Store::create([
            'size'=>$data['size'],
            'color'=>$data['color'],
            'product_id'=>$data['product_id'],
        ]);
        // return new StoreResource($store);
        return response()->json(["message"=>"Store Created Successfully"],201);

    }
    public function show($store){
        $oneStore=Store::findOrFail($store);
        return new StoreResource($oneStore);
    }
    public function update($store,Request $req){
        $req->validate([
        'size'=>'max:255',
        'color'=>'max:255',
        ]);
        $oneStore=Store::findOrFail($store);
        $oneStore->update([
            'size'=>$req['size'],
            'color'=>$req['color'],
            // 'product_id'=>$req['product_id'],
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

    public function storesForeachProduct($prodId){
        // return Store::where('product_id','=',$prodId)->get();
        return  $stores = DB::table('stores')
        ->where('stores.product_id', '=',$prodId)
        ->get();
    }
}
