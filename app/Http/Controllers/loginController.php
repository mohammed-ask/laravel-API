<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    public function login(Request $req){
        if($req->method() == "POST"){
        $validate = $req->validate([
            "email"=>"Required|email",
            "password"=>"Required"
        ]);
        $user = User::where("email",$req->email)->first();;
        if(!$user || !Hash::check($req->password,$user->password)){
            return response(["message"=>"Invalid User and Password"]);    
        }
        $token = $user->createToken('mytoken')->plainTextToken;
        return response([
            "user"=>$user,
            "token"=>$token
        ],200);
    }
    return response(["message"=>"unauthenticated"]);
}
}
