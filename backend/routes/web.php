<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;






Route::get('/users', [UserController::class, 'index'])->name('users.index');


// Exibe o formulário de criação de usuário
Route::get('/usercreate', [UserController::class, 'create'])->name('user.create');

// Envia os dados do formulário e cria o usuário no banco
Route::post('/usercreate', [UserController::class, 'store'])->name('user.store');




Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');

Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');


Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

