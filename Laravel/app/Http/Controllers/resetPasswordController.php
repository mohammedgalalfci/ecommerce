<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class resetPasswordController extends Controller
{
    public function sendEmail(Request $request){
        if($this->validateEmail($request->email)){
            return $this->failedResponse();
        }
       $this->send($request->email);
       return $this->successResponse();
    }

    public function validateEmail($email){
        return !!User::where('email',$email)->first();
    }

    public function failedResponse(){
        return response()->json(['error'=>'Email Not Found !']);
    }

    public function successResponse(){
        return response()->json(['message'=>'Please Check Ur Inbox']);
    }

    public function send($email){
        Mail::to($email)->send(new resetPasswordEmail);
    }
}
