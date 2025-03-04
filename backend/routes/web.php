<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\AuthController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;


Route::prefix('api')->group(function () {

    Route::get('/users/list', [UserController::class, 'index']);

    // Rota para criar um novo usuário (sem CSRF, já que é API)
    Route::post('/users', [UserController::class, 'store'])
        ->withoutMiddleware([VerifyCsrfToken::class]);
});
