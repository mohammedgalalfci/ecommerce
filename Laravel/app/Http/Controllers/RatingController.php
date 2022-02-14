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
            'customer_id' => $data['customer_id'],
            'product_id' => $data['product_id'],
        ]);
        // return new RatingResource($rating);
        return response()->json(["message"=>"Rating Created Successfully"],201);

    }
    public function show($rating){
        $oneRating=Rating::findOrFail($rating);
        return new RatingResource($oneRating);
    }

    public function update($rating,RatingRequest $req){
         $oneRating=Rating::findOrFail($rating);
         $oneRating->update([
            'customer_id' => $req['customer_id'],
            'product_id' => $req['product_id'],
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
