<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class registerController extends Controller
{
    public function register(Request $req){
        $validate = $req->validate([
            "user" => "Required",
            "email" => "Required|email",
            "password" => "Required",
        ]);
        $userobj = new User();
        $userobj->name = $req->user;
        $userobj->email = $req->email;
        $userobj->password = Hash::make($req->password);
        $userobj->save();
        $token = $userobj->createToken('mytoken')->plainTextToken;
        return response([
            'user' => $userobj,
            'toker' => $token,
        ]);
    }
}
