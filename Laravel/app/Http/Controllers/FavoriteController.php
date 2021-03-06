<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Http\Resources\FavoriteResource;
class FavoriteController extends Controller
{
    public function index(){
        $favorites=Favorite::orderBy('id', 'DESC')->get();
        return FavoriteResource::collection($favorites);
        // return response()->json([FavoriteResource::collection($favorites)],200);
    }
    public function store(){
        $data = request()->all();
        $favorite=Favorite::create([
            'user_id' => $data['user_id'],
            'product_id' => $data['product_id'],
        ]);
        // return new FavoriteResource($favorite);
        return response()->json(["message"=>"Favorite Created Successfully"],201);
    }
    public function show($favorite){
        $oneFavorite=Favorite::findOrFail($favorite);
        return new FavoriteResource($oneFavorite);
    }

    public function update($favorite,Request $req){
        $req->validate(['user_id'=> 'exists:users,id','product_id'=> 'exists:products,id']);
         $oneFavorite=Favorite::findOrFail($favorite);
         $oneFavorite->update([
            'user_id' => $req['user_id'],
            'product_id' => $req['product_id'],
        ]);
        // return  $oneFavorite;
        return response()->json(["message"=>"Favorite Updated Successfully"],201);
    }

    public function delete($favorite){
        $oneFavorite=Favorite::findOrFail($favorite);
        $oneFavorite->delete();
        // return new FavoriteResource($oneFavorite);
        return response()->json(["message"=>"Favorite Deleted Successfully"],201);
    }
}
