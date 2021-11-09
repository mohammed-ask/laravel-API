<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class logoutController extends Controller
{
    public function logout(Request $request){
       
            auth()->user()->tokens()->delete();
        
    
        return response(["message"=> "token deleted successfully"]);
    }
}
