<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

use App\Models\User;

class LoginController extends Controller
{
   public function index()
   {
    return view('login');
   }

   public function store(Request $request)
   {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ],
    [
        'email.required'=>'Esse campo é obrigatório',
        'email.email'=>'Email precisa ser válido e único',
        //'password.required'=>'Esse campo é obrigatório1',
        //'password.min'=>'esse campo precisa ter no mínimo :min caracteres'

    ]);
    /*
        $credentials = $request->only('email', 'password');

        $auth = Auth::attempt($credentials);

        if(!$auth)
        {
            return redirect()->route('login.index')->withErrors(['error'=> 'email ou senha incorretos']);
        }


     return redirect()->route('login.index')->with('succes', 'Logado');
     */

     $user = User::where('email', $request->input('email'))->first();

     if(!$user)
     {
        return redirect()->route('login.index')->withErrors(['error'=> 'email ou senha incorretos']);
     }
     if(!password_verify($request->input('password'), $user->password))
     {
        return redirect()->route('login.index')->withErrors(['error'=> 'email ou senha incorretos']);
     }

     Auth::loginUsingId(($user->id));

     return redirect()->route('home')->with('success', 'Logado com sucesso!');
   }

   public function destroy()
   {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Deslogado com sucesso!');
   }
}
