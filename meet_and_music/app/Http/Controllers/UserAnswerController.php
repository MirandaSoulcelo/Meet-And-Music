<?php

namespace App\Http\Controllers;

use App\Models\UserAnswer;
use App\Models\User;
use App\Models\Question;
use App\Models\Alternative;
use Illuminate\Http\Request;
use App\Services\UserAnswerService;

class UserAnswerController extends Controller
{
    /**
     * Armazenar uma nova resposta do usuário.
     */
    public function store(Request $request, UserAnswerService $service)
    {
        // Validação dos dados recebidos
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'question_id' => 'required|exists:questions,id',
            'alternative_id' => 'required|exists:alternatives,id',
        ]);

        // Verificar se a alternativa é a correta
        $alternative = Alternative::find($request->alternative_id);
        $is_correct = $alternative->is_correct;

        // Criar a resposta do usuário
        $userAnswer = UserAnswer::create([
            'user_id' => $request->user_id,
            'question_id' => $request->question_id,
            'alternative_id' => $request->alternative_id,
            'is_correct' => $is_correct,
        ]);

        $answer = $service->storeAnswer(
            $request->user_id,
            $request->question_id,
            $request->alternative_id
        );

        return response()->json(['message' => 'Resposta registrada com sucesso!', 'user_answer' => $userAnswer]);
    }

    /**
     * Mostrar as respostas de um usuário específico.
     */
    public function show($userId)
    {
        $userAnswers = UserAnswer::where('user_id', $userId)->with(['question', 'alternative'])->get();
        return response()->json($userAnswers);
    }

    /**
     * Calcular o total de respostas corretas de um usuário.
     */
    public function calculateScore($userId)
    {
        $correctAnswers = UserAnswer::where('user_id', $userId)
                                    ->where('is_correct', true)
                                    ->count();

        return response()->json(['score' => $correctAnswers]);
    }

    public function getRanking()
{
    $ranking = User::withCount(['userAnswers' => function ($query) {
        $query->where('is_correct', true);
    }])->orderByDesc('user_answers_count')->get();

    return response()->json($ranking);
}

}
