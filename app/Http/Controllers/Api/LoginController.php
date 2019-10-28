<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;


class LoginController extends Controller
{
    public function login() {    
        $credentials = request(['user', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'token' => $token,        
            'expires' => auth('api')->factory()->getTTL() * 60,
            ]);
        }
}
