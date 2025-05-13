<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;
use App\Http\Controllers\Controller;



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

            $userXp = Auth::user()->xp;  // Acesse a relação de XP do usuário
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
        $user = Auth::user(); // Usuário autenticado
       
        $question = Question::find($question_id);
    
        if (!$question) {
            return response()->json(['error' => 'Pergunta não encontrada'], 404);
        }
    
        $respostaUsuario = $request->input('resposta');
        $respostaCorreta = $question->correct_answer; // Certifique-se que o campo seja esse
    
        if ($respostaUsuario === $respostaCorreta) {
            $user->adicionarXpParaUsuario(10);
            dd($user->xp); // Ganha XP direto aqui
            return response()->json(['message' => 'Resposta correta! XP ganho!']);
        }
    
        return response()->json(['message' => 'Resposta incorreta. Tente novamente.']);
    }
    

}
