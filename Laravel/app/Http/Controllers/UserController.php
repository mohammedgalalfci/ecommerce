<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return UserResource::collection($users);
        // return response()->json([CustomerResource::collection($customers)],200);
    }
    public function store(UserRequest $req){
        $data = request()->all();
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'full_address' => $data['full_address'],
            'house_no' => $data['house_no'],
            'country' => $data['country'],
            'city' => $data['city'],
            'phone' => $data['phone']
        ]);
        // return new CustomerResource($customer);
        return response()->json(["message"=>"User Created Successfully"],201);
    }

    public function show($user){
        $oneUser=User::findOrFail($user);
        return new UserResource($oneUser);
    }

    public function update($user,UserRequest $req){
        $oneUser=User::findOrFail($user);
        $oneUser->update([
            'name' => $req['name'],
            'email' => $req['email'],
            'password' => $req['password'],
            'full_address' => $req['full_address'],
            'house_no' => $req['house_no'],
            'country' => $req['country'],
            'city' => $req['city'],
            'phone' => $req['phone']
        ]);
        // return $oneCustomer;
        return response()->json(["message"=>"User Updated Successfully"],201);
    }

    public function delete($user){
        $oneUser=User::findOrFail($user);
        $oneUser->delete();
        // return new CustomerResource($oneCustomer);
        return response()->json(["message"=>"User Deleted Successfully"],201);
    }
}
