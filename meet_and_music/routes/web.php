<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuestionController;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use App\Models\UsuarioXP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserAnswerController;
use App\Http\Controllers\RankingController;


Route::middleware('auth')->group(function(){
    Route::get('/homelist', [UserController::class, 'index'])->name('users.index');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // Rotas para lições A configurar.
    Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index');

    
    Route::get('/showlessons', [LessonController::class, 'ShowLessons'])->name('lessons.index');
   
    Route::get('/lessons/{id}', [LessonController::class, 'show'])->name('lessons.show');
    Route::post('/lessons/{id}/complete', [LessonController::class, 'complete'])->name('lessons.complete');

    Route::get('/lessons/{id}/quiz', [LessonController::class, 'quiz'])->name('lessons.quiz');

    Route::post('/lessons/{id}/quiz', [LessonController::class, 'submitQuiz'])->name('lessons.quiz.submit');
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
    /** @var \App\Models\User $user */
    $user = $user = Auth::user();  // Recupera o usuário autenticado

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



Route::middleware('auth')->group(function() {
    // Rota para completar a lição
    Route::post('/lesson/{id}/complete', [LessonController::class, 'completarLicao']);

    // Rota para verificar a resposta
    Route::post('/question/{id}/verify', [QuestionController::class, 'verificarResposta']);

    // Rota para ranking
    Route::get('/ranking', [UserController::class, 'ranking']);
});

// Armazenar a resposta de um usuário
Route::post('/user-answers', [UserAnswerController::class, 'store']);

// Exibir as respostas de um usuário específico
Route::get('/user-answers/{userId}', [UserAnswerController::class, 'show']);

// Calcular a pontuação de um usuário
Route::get('/user-answers/{userId}/score', [UserAnswerController::class, 'calculateScore']);


Route::get('/ranking1', [RankingController::class, 'index']);










Route::get('/debug-auth', function () {
    $user = Auth::user(); // Ou JWTAuth::user() se estiver usando JWT

    if (!$user) {
        return response()->json(['error' => 'Usuário não autenticado'], 401);
    }

    return [
        'classe_do_usuario' => get_class($user),
        'tem_metodo_adicionarXpParaUsuario' => method_exists($user, 'adicionarXpParaUsuario'),
    ];
});

