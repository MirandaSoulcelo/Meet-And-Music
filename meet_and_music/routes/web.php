<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LessonController;
//use App\Http\Controllers\QuestionController;
use App\Http\Controllers\FriendshipController;
use App\Http\Controllers\MeetingController;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;

use Illuminate\Support\Facades\Auth;
//use App\Http\Controllers\UserAnswerController;
use App\Http\Controllers\RankingController;
use Illuminate\Http\Request;


Route::middleware('auth')->group(function(){
    Route::get('/homelist', [UserController::class, 'index'])->name('users.index');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');




});

// Rotas de cadastro de usuário (fora do middleware de autenticação)
Route::get('/usercreate', [UserController::class, 'create'])->name('user.create');
Route::post('/usercreate', [UserController::class, 'store'])->name('user.store');

Route::middleware('auth')->group(function(){
    Route::get('/edit', [UserController::class, 'edit'])->name('user.edit');
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

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return view('auth.logout_redirect');
})->name('logout');

// Rota de lições
Route::middleware('auth')->group(function() {


    //obter quiz com questões de acordo com a lição
    Route::get('/lessons/{lesson}/quiz', [LessonController::class, 'showQuiz'])->name('lessons.quiz');


    //enviar respostas do usuário e fazer a lógica de xp com base em acerto
    Route::post('/lessons/{lesson}/submit', [LessonController::class, 'submitQuiz'])->name('lessons.submit');


    Route::get('/lessons', [LessonController::class, 'index'])->name('lessons.index');
   // Route::get('/lessons/show', [LessonController::class, 'show'])->name('lessons.show');


    //Route::get('/showlessons', [LessonController::class, 'ShowLessons'])->name('lessons.index');





});

// Rota de Ranking
Route::middleware('auth')->group(function() {


Route::get('/ranking', [RankingController::class, 'showRanking']);
});



 // Rotas relacionadas a lógica de amizade
Route::middleware(['auth'])->group(function () {

    Route::post('/friends/send/{friendId}', [FriendshipController::class, 'sendRequest'])->name('friends.send');
    Route::post('/friends/accept/{friendId}', [FriendshipController::class, 'acceptRequest'])->name('friends.accept');
    Route::post('/friends/reject/{friendId}', [FriendshipController::class, 'rejectRequest'])->name('friends.reject');
    Route::get('/friends', [FriendshipController::class, 'index'])->name('friends.index');
    Route::get('/friends/requests', [FriendshipController::class, 'requests'])->name('friends.requests');

    Route::delete('/friends/remove/{friend}', [FriendshipController::class, 'removeFriend'])->name('friends.remove');


});


// Rotas de videochamada
Route::middleware('auth')->group(function () {
    // Criar reunião
    Route::post('/meeting/criar', [MeetingController::class, 'criarChamada'])
         ->name('meeting.criar');

    // Entrar em reunião - FORMULÁRIO
    Route::get('/entrar-reuniao', [MeetingController::class, 'formEntrarReuniao'])
         ->name('meeting.join.form');

    // Entrar em reunião -
    Route::post('/entrar-reuniao', [MeetingController::class, 'processarEntradaReuniao'])
         ->name('meeting.join.process');


    // Acessar sala de vídeo
    Route::get('/video-call/{meetingId}', [MeetingController::class, 'entrarChamada'])
         ->name('meeting.video.call');

    // Listar minhas reuniões
    Route::get('/minhas-chamadas', [MeetingController::class, 'minhasChamadas'])
         ->name('meetings.index');

    // Gerar convite
    Route::get('/meeting/{meetingId}/convite', [MeetingController::class, 'gerarConvite'])
         ->name('meeting.convite');
});

