<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class jwtController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->all(['user', 'password']);

        if(!$token = auth()->attempt($credentials)){
            return response()->json(['msg'=>'Login inválido!'], 401);
        }

        return response()->json(['token' => $token]);
    }
}
