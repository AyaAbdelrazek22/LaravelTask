<?php

namespace App\Http\Controllers\mobileApi;
use App\User;
use App\Http\Controllers\Controller ;
use Illuminate\Http\Request;
class LoginController extends Controller
{


    public function loginUser(Request $request){

    //rules email , password
    $rules = ["email" => "required|email" , "password" =>"required|min:6"];
    $validor = Validator::make($request->all(),$rules);
    if($validor->fails()){
        return response([ "Rcode" => 404,"error_message" => $validor->errors()->messages() ] ,200);
    }
    //get data from request
    $email = $request->email;
    $password = $request->password;

    //select from database using email
    $user = User::where('email','=',$email)->get();


    // check data
    //retrun response
    if(count($user) == 0){
        return response(["Rcode"=>404,"message"=> "email doesnot exist"],200);
    }else if($user[0]['password'] == bcrypt($password)){
        return response(["Rcode"=>200,"user"=> $user ,"message"=>"user found succfully"],200);
    }else{
        return response(["Rcode"=>404,"message"=> "password incorrect" ,"user"=>$user],200);
    }

    }



}
