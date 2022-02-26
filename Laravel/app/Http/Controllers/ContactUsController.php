<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index(){
        $customers=ContactUs::all();
        return $customers;
    }
    public function store(Request $req){
        $data = request()->all();
        $contact=ContactUs::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'message' => $data['message'],
        ]);
        // return new CustomerResource($customer);
        return response()->json(["message"=>"Send Message Successfully"],201);
    }
}
