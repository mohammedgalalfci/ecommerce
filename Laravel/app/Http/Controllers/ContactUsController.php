<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){
        $customers=ContactUs::orderBy('id', 'DESC')->get();
        return $customers;
    }
    public function store(Request $req){
        $data = request()->all();
        $contact=ContactUs::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message'],
            'seen' => $data['seen'],
        ]);
        // return new CustomerResource($customer);
        return response()->json(["message"=>"Send Message Successfully"],201);
    }
    public function show($contact){
        $oneMessage=ContactUs::findOrFail($contact);
        return  $oneMessage;
        //return response()->json(["message"=>"Category Updated successfully"],201);
    }
    public function update($contact,Request $req){
        $oneMessage=ContactUs::findOrFail($contact);
        $oneMessage->update([
            'seen'=>$req['seen']
       ]);
       return response()->json(["message"=>"Order Updated Successfully"],201);
   }
}
