<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validar os dados de login
        $credentials = $request->only('email', 'password');

        // Tenta autenticar o usuário
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Gerar o token JWT
            $token = JWTAuth::fromUser($user);

            return response()->json(['token' => $token]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
