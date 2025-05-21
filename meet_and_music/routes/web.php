<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\FriendshipController;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserAnswerController;
use App\Http\Controllers\RankingController;


Route::middleware('auth')->group(function(){
    Route::get('/homelist', [UserController::class, 'index'])->name('users.index');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

  
    Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index');

    
    Route::get('/showlessons', [LessonController::class, 'ShowLessons'])->name('lessons.index');
   
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

// Redireciona a raiz para /home
Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rotas de autenticação
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');




Route::middleware('auth')->group(function() {
    // Rota para completar a lição
    Route::get('/lessons/{lesson}/quiz', [LessonController::class, 'showQuiz'])->name('lessons.quiz');

    Route::post('/lessons/{lesson}/submit', [LessonController::class, 'submitQuiz'])->name('lessons.submit');

 /*
    Route::post('/question/{id}/verify', [QuestionController::class, 'verificarResposta']);
    */
    
});



// Armazenar a resposta de um usuário
Route::post('/user-answers', [UserAnswerController::class, 'store']);

// Exibir as respostas de um usuário específico
Route::get('/user-answers/{userId}', [UserAnswerController::class, 'show']);

// Calcular a pontuação de um usuário
Route::get('/user-answers/{userId}/score', [UserAnswerController::class, 'calculateScore']);

Route::get('/ranking2', [RankingController::class, 'showRanking']);











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

Route::middleware(['auth'])->group(function () {

    // Em routes/web.php
    
    Route::post('/friends/send/{friendId}', [FriendshipController::class, 'sendRequest'])->name('friends.send');
    Route::post('/friends/accept/{friendId}', [FriendshipController::class, 'acceptRequest'])->name('friends.accept');
    Route::post('/friends/reject/{friendId}', [FriendshipController::class, 'rejectRequest'])->name('friends.reject');
    Route::get('/friends', [FriendshipController::class, 'index'])->name('friends.index');
    Route::get('/friends/requests', [FriendshipController::class, 'requests'])->name('friends.requests');

    Route::get('/friends/requests/received', [FriendshipController::class, 'receivedRequests'])->name('friends.received');
    Route::get('/friends/requests/sent', [FriendshipController::class, 'sentRequests'])->name('friends.sent');
    

    Route::delete('/friends/remove/{friend}', [FriendshipController::class, 'removeFriend'])->name('friends.remove');


});

