<?php

namespace App\Http\Controllers\mobileApi;

use App\Http\Controllers\Controller ;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{


   public function  registerUser(Request $request)
   {
       $rules = ["name" => "required", "email" => "required|email" , "password" =>"required|min:6"];
       $validor = Validator::make($request->all(),$rules);
       if($validor->fails()){
           return response([ "Rcode" => 404,"error_message" => $validor->errors()->messages() ] ,200);
       }

       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);
       $user->save() ;

       return response(["Rcode"=>200 , "user"=>$user , "message"=>"you are registered succfully"],200);
   }

}
