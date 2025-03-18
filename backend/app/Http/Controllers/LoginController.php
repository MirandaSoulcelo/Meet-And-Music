<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
   public function index()
   {
    return view('login');
   }

   public function store()
   {

    var_dump('login');
   }

   public function destroy()
   {
        var_dump('logout');
   }
}
