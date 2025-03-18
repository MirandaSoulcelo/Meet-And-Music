<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

     
        $credentials = $request->only('email', 'password');

        // Tentar autenticar o usuário
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Gerar o token JWT
            $token = JWTAuth::fromUser($user);

            // Retornar o token JWT na resposta
            return response()->json(['token' => $token]);
        }

        // Caso as credenciais estejam incorretas, retornar erro de autenticação
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}
