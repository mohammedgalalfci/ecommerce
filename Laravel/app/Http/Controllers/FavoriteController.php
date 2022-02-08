<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Http\Resources\FavoriteResource;
class FavoriteController extends Controller
{
    public function index(){
        $favorites=Favorite::all();
        return FavoriteResource::collection($favorites);
    }
    public function store(){
        $data = request()->all();
        $favorite=Favorite::create([
            'customer_id' => $data['customer_id'],
            'product_id' => $data['product_id'],
        ]);
        return new FavoriteResource($favorite);
    }
    public function show($favorite){
        $oneFavorite=Favorite::findOrFail($favorite);
        return new FavoriteResource($oneFavorite);
    }

    public function update($favorite,Request $req){
         $oneFavorite=Favorite::findOrFail($favorite);
         $oneFavorite->update([
            'customer_id' => $req['customer_id'],
            'product_id' => $req['product_id'],
        ]);
        return  $oneFavorite;
    }

    public function delete($favorite){
        $oneFavorite=Favorite::findOrFail($favorite);
        $oneFavorite->delete();
        return new FavoriteResource($oneFavorite);
    }
}
