<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (auth()->check()) {
            // Se o usuário estiver logado, mostra a página de módulos
            return view('modules');
        }
        
        // Se não estiver logado, mostra a página inicial
        return view('home');
    }
}
