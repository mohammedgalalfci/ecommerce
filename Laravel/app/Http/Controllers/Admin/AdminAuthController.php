<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Validator;
use Auth;
class AdminAuthController extends Controller
{
    use GeneralTrait;
    public function login(Request $request)
    {

        try {
            $rules = [

                "password" => "required",
                "admin_email" => "required|exists:admins,admin_email"
            ];

            $validator = Validator::make($request->all(), $rules);

            // if ($validator->fails()) {
            //     $code = $this->returnCodeAccordingToInput($validator);
            //     return $this->returnValidationError($code, $validator);
            // }

            $credentials = $request -> only(['admin_email','password']);

           $token =  Auth::guard('admin-api') -> attempt($credentials);
           if(!$token)
           return $this->returnError('E001','Email Or Password Not Exists !');
           return $this -> returnData('token' , $token);

        }catch (\Exception $ex){
            return $this->returnError($ex->getCode(), $ex->getMessage());
        }

    }
}
