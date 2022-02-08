<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Resources\AdminResource;
class AdminController extends Controller
{
    public function index(){
        $admins=Admin::all();  
        return AdminResource::collection($admins);
    }
    public function store(){
        $data = request()->all();
        $admin=Admin::create([
            'admin_name' => $data['admin_name'],
            'admin_email' => $data['admin_email'],
            'type' => $data['type'],
            'password'=> $data['password'],
        ]);
        return new AdminResource($admin);
    }
    public function show($Admin){
        $oneAdmin=Admin::findOrFail($Admin);
        return new AdminResource($oneAdmin);
    }
    // public function update($Admin,Request $req){
    //     //$oneAdmin=Admin::findOrFail($Admin);
    //     $oneAdmin = new Admin;
    //     $oneAdmin->update([
    //         // 'admin_name' => $req['admin_name'],
    //         // 'admin_email' => $req['admin_email'],
    //         // 'type' => $req['type'],
    //         // 'password'=> $req['password'],
    //         $oneAdmin->admin_name = $req->admin_name,
    //         $oneAdmin->admin_email = $req->admin_email,
    //         $oneAdmin->type = $req->type,
    //         $oneAdmin->password = $req->password,
    //     ]);
    //     return $oneAdmin;
    // } 

    public function delete($Admin){
        $oneAdmin=Admin::findOrFail($Admin);
        $oneAdmin->delete();
        return new AdminResource($oneAdmin);
    }
}
