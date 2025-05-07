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


    public function verificarResposta(Request $request, $question_id)
{
    $user = auth()->user(); // Pega o usuário autenticado

    $question = Question::find($question_id); // Pega a questão com o id passado
    if (!$question) {
        return response()->json(['error' => 'Pergunta não encontrada'], 404);
    }

    // Verifica se a resposta do usuário está correta
    $respostaCorreta = $question->resposta_correta;
    $respostaUsuario = $request->input('resposta');

    if ($respostaCorreta == $respostaUsuario) {
        // Se a resposta estiver correta, o usuário ganha XP
        $xpGanho = 10; // Exemplo: 10 XP por resposta correta
        $this->ganharXP($request->merge(['xp' => $xpGanho])); // Chama o método ganharXP
        return response()->json(['message' => 'Resposta correta! XP ganho!']);
    }

    return response()->json(['message' => 'Resposta incorreta. Tente novamente.']);
}

}
