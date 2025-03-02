<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Método para pegar todos os usuários
    public function index()
    {
        return response()->json(User::all());
    }

    // Método para criar um usuário
    public function store(Request $request)
    {
        // Validação e criação do usuário
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        return response()->json($user, 201); // Retorna o usuário criado
    }
}
