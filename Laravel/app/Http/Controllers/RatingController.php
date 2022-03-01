<?php

namespace App\Http\Controllers;

use App\Http\Resources\RatingResource;
use App\Models\Rating;
use Illuminate\Http\Request;
use App\Http\Requests\RatingRequest;
class RatingController extends Controller
{
    public function index(){
        $ratings=Rating::all();
        return RatingResource::collection($ratings);
    }
    public function store(RatingRequest $request){
        $data = request()->all();
        $rating=Rating::create([
            'user_id' => $data['user_id'],
            'product_id' => $data['product_id'],
            'degree' =>$data['degree']
        ]);
        // return new RatingResource($rating);
        return response()->json(["message"=>"Rating Created Successfully"],201);

    }
    public function show($rating){
        $oneRating=Rating::findOrFail($rating);
        return new RatingResource($oneRating);
    }
    public function check($user_id,$product_id){
        return Rating::where([
             ['user_id', '=', $user_id],
            ['product_id','=',$product_id]
    ])->get();
    }
    public function update($rating,Request $req){
        $req->validate([
        'user_id'=> 'exists:users,id',
        'product_id'=> 'exists:products,id',
        'degree'=> ['min:0','max:5','numeric']
    ]);
         $oneRating=Rating::findOrFail($rating);
         $oneRating->update([
            'user_id' => $req['user_id'],
            'product_id' => $req['product_id'],
            'degree' =>$req['degree']
        ]);
        // return  $oneRating;
        return response()->json(["message"=>"Rating Updated Successfully"],201);
    }

    public function delete($rating){
        $oneRating=Rating::findOrFail($rating);
        $oneRating->delete();
        // return new RatingResource($oneRating);
        return response()->json(["message"=>"Rating Deleted Successfully"],201);
    }
}
