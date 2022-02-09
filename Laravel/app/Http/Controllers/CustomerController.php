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
    }
    public function store(CustomerRequest $req){
        $data = request()->all();
        $customer=Customer::create([
            'customer_name' => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'password' => $data['password']
        ]);
        return new CustomerResource($customer);
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
            'password' => $req['password']
        ]);
        return $oneCustomer;
    }

    public function delete($customer){
        $oneCustomer=Customer::findOrFail($customer);
        $oneCustomer->delete();
        return new CustomerResource($oneCustomer);
    }
}
