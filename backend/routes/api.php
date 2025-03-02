<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;


// Rota para listar todos os usuários
Route::get('/users', [UserController::class, 'index']);

// Rota para criar um novo usuário
Route::post('/users', [UserController::class, 'store']);

