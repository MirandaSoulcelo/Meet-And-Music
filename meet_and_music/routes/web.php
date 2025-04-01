<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LessonController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Models\UsuarioXP;
use Illuminate\Http\Request;

Route::middleware('auth')->group(function(){
    Route::get('/homelist', [UserController::class, 'index'])->name('users.index');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    
    // Rotas para lições
    Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index');
    Route::get('/lessons/{id}', [LessonController::class, 'show'])->name('lessons.show');
    Route::post('/lessons/{id}/complete', [LessonController::class, 'complete'])->name('lessons.complete');
});

// Rotas de cadastro de usuário (fora do middleware de autenticação)
Route::get('/usercreate', [UserController::class, 'create'])->name('user.create');
Route::post('/usercreate', [UserController::class, 'store'])->name('user.store');

Route::middleware('auth')->group(function(){
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

// Rotas de autenticação
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');

Route::middleware('auth')->post('/ganhar-xp', function (Request $request) {
    $user = auth()->user();  // Recupera o usuário autenticado

    if (!$user) {
        return response()->json(['error' => 'Usuário não autenticado'], 401);
    }

    $xpGanho = $request->input('xp');

    // Verifique se o usuário tem o relacionamento 'xp' configurado
    if (!$user->xp) {
        return response()->json(['error' => 'XP não encontrado'], 404);
    }

    // Adiciona o XP ganho
    $user->xp->adicionarXP($xpGanho);

    return response()->json([
        'xp_atual' => $user->xp->xp_atual,
        'nivel_atual' => $user->xp->nivel_atual
    ]);
});
