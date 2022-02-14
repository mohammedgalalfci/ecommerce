<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $customers=Customer::all();
        return CustomerResource::collection($customers);
        // return response()->json([CustomerResource::collection($customers)],200);
    }
    public function store(CustomerRequest $req){
        $data = request()->all();
        $customer=Customer::create([
            'customer_name' => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'password' => $data['password'],
            'full_address' => $data['full_address'],
            'house_no' => $data['house_no'],
            'country' => $data['country'],
            'city' => $data['city'],
            'phone' => $data['phone']
        ]);
        // return new CustomerResource($customer);
        return response()->json(["message"=>"Customer Created Successfully"],201);
    }

    public function show($customer){
        $oneCustomer=Customer::findOrFail($customer);
        return new CustomerResource($oneCustomer);
    }

    public function update($customer,CustomerRequest $req){
        $oneCustomer=Customer::findOrFail($customer);
        $oneCustomer->update([
            'customer_name' => $req['customer_name'],
            'customer_email' => $req['customer_email'],
            'password' => $req['password'],
            'full_address' => $req['full_address'],
            'house_no' => $req['house_no'],
            'country' => $req['country'],
            'city' => $req['city'],
            'phone' => $req['phone']
        ]);
        // return $oneCustomer;
        return response()->json(["message"=>"Customer Updated Successfully"],201);
    }

    public function delete($customer){
        $oneCustomer=Customer::findOrFail($customer);
        $oneCustomer->delete();
        // return new CustomerResource($oneCustomer);
        return response()->json(["message"=>"Customer Deleted Successfully"],201);
    }
}
