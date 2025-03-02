<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;


// Rota para listar todos os usuários
Route::get('api/users', [UserController::class, 'index']);

// Rota para criar um novo usuário
Route::post('api/users', [UserController::class, 'store'])
    ->WithoutMiddleware([VerifyCsrfToken::class]);

