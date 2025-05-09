<?php

namespace App\Http\Controllers;

use App\Models\UserAnswer;
use App\Models\User;
use App\Models\Question;
use App\Models\Alternative;
use Illuminate\Http\Request;

class UserAnswerController extends Controller
{
    /**
     * Armazenar uma nova resposta do usuário.
     */
    public function store(Request $request)
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

        // Se a resposta for correta, adicionar XP
        if ($is_correct) {
            $this->addXpToUser($request->user_id, 10); // Ganha 10 XP por acerto
        }

        return response()->json(['message' => 'Resposta registrada com sucesso!', 'user_answer' => $userAnswer]);
    }

    /**
     * Adiciona XP ao usuário.
     */
    protected function addXpToUser($userId, $xp)
    {
        $user = User::find($userId);
        if ($user) {
            // Adiciona o XP ao usuário
            $user->xp += $xp;

            // Calcula o nível com base no XP total
            $novoNivel = floor($user->xp / 100) + 1;
            $user->nivel_atual = $novoNivel;

            // Salva a atualização do usuário
            $user->save();
        }
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

    /**
     * Obter o ranking de usuários com base nas respostas corretas.
     */
    public function getRanking()
    {
        $ranking = User::withCount(['userAnswers' => function ($query) {
            $query->where('is_correct', true);
        }])->orderByDesc('user_answers_count')->get();

        return response()->json($ranking);
    }
}
