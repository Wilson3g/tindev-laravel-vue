<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request) {
        $credentials = $request->all(['user', 'password']);
        
        if(!$token = auth('api')->attempt($credentials)){
            return response()->json(['msg'=>'Usuário ou senha inválidos!'], 401);
        }

        return response()->json([
            'token'=> $token
        ]);
    }
}
