<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

use App\Models\Question;


class QuestionController extends Controller
{
    public function submitAnswer(Request $request, $questionId)
    {
        // Lógica para verificar se a resposta está correta
        $question = Question::find($questionId);
        $isCorrect = $this->checkAnswer($request->input('answer'), $question);

        if ($isCorrect) {
            // Ganhar XP
            $xpGanho = 10;  // Exemplo de XP ganho por responder corretamente

            $userXp = auth()->user()->xp;  // Acesse a relação de XP do usuário
            $userXp->adicionarXP($xpGanho);

            return response()->json([
                'message' => 'Resposta correta!',
                'xp_atual' => $userXp->xp_atual,
                'nivel_atual' => $userXp->nivel_atual
            ]);
        } else {
            return response()->json(['message' => 'Resposta incorreta, tente novamente.'], 400);
        }
    }

    // Método para verificar a resposta
    private function checkAnswer($answer, $question)
    {
        return $answer === $question->correct_answer;
    }
}
