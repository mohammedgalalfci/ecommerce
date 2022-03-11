<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function store(){
        $data = request()->all();
        $comment=Comment::create([
            'comment' => $data['comment'],
            'user_id' => $data['user_id'],
            'product_id' => $data['product_id'],
            
        ]);
        
        return response()->json(["message"=>"Comment Created Successfully"],201);
    }
    public function getComments($prodid){
        
        return  $comments = DB::table('comments')
                ->select('comments.id','comment','name','comments.product_id','comments.created_at')
                ->join('products', 'products.id', '=', 'comments.product_id')
                ->join('users','users.id','=','comments.user_id')
                ->where('products.id', '=', $prodid)
                ->orderBy('id', 'DESC')
                ->get();
             
    }
}
