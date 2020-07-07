<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function test(){
        return auth()->user();
    }

    public function login(LoginRequest $request){
        if(Auth::attempt($request->validated())){
            $token = $request->user()->createToken('Auth Token')->accessToken;
            return response()->json(['Token' => $token ]);
        }else{
            return response()->json(['status'=>'incorrect credentials'], 401);
        }
    }
}
