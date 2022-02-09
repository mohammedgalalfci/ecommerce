<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Resources\AdminResource;
class AdminController extends Controller
{
    public function index(){
        $admins=Admin::all();
        return AdminResource::collection($admins);
    }
    public function store(AdminRequest $request){
        $data = request()->all();
        $admin=Admin::create([
            'admin_name' => $data['admin_name'],
            'admin_email' => $data['admin_email'],
            'type' => $data['type'],
            'password'=> $data['password'],
        ]);
        return new AdminResource($admin);
    }
    public function show($admin){
        $oneAdmin=Admin::findOrFail($admin);
        return new AdminResource($oneAdmin);
    }
    public function update($admin,AdminRequest $req){
        $oneAdmin=Admin::findOrFail($admin);
        $oneAdmin->update([
            'admin_name' => $req['admin_name'],
            'admin_email' => $req['admin_email'],
            'type' => $req['type'],
            'password'=> $req['password'],
        ]);
        return $oneAdmin;
    }

    public function delete($admin){
        $oneAdmin=Admin::findOrFail($admin);
        $oneAdmin->delete();
        return new AdminResource($oneAdmin);
    }
}
