<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Validation\Rule;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $users=User::orderBy('id', 'DESC')->get();
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
            'phone' => $data['phone'],
            // 'api-password'=>$data['ase1iXcLAxanvXLZcgh6tk']
        ]);
        // return new CustomerResource($customer);
        return response()->json(["message"=>"User Created Successfully"],201);
    }

    public function show($user){
        $oneUser=User::findOrFail($user);
        return new UserResource($oneUser);
    }

    public function update($user,Request $req){
        $req->validate([
            'name'=>['min:3', 'max:25'],
            'email'=>['email'],
            // 'password'=>['min:6'],
            'full_address'=>['max:100'],
            'house_no'=>['numeric'],
            'phone'=>['min:11','max:11','regex:/01[0125][0-9]{8}/'],
        ]);
        $oneUser=User::findOrFail($user);
        $oneUser->update([
            'name' => $req['name'],
            'email' => $req['email'],
            // 'password' => $req['password'],
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
