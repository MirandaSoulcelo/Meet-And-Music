<?php

namespace App\Services;

use App\Models\UserAnswer;
use App\Models\Alternative;
use App\Models\UsuarioXp;

class UserAnswerService
{
    public function storeAnswer($userId, $questionId, $alternativeId)
    {
        $alternative = Alternative::findOrFail($alternativeId);

        $isCorrect = $alternative->is_correct;

        $answer = UserAnswer::create([
            'user_id' => $userId,
            'question_id' => $questionId,
            'alternative_id' => $alternativeId,
            'is_correct' => $isCorrect,
        ]);

        if ($isCorrect) {
            $this->addXpToUser($userId, 10); // Ganha 10 XP por acerto
        }

        return $answer;
    }

    protected function addXpToUser($userId, $xp)
    {
        $xpRecord = UsuarioXp::firstOrCreate(
            ['user_id' => $userId],
            ['xp_atual' => 0, 'nivel_atual' => 1]
        );

        $xpRecord->xp_atual += $xp;

        $novoNivel = floor($xpRecord->xp_atual / 100) + 1;
        $xpRecord->nivel_atual = $novoNivel;

        $xpRecord->save();
    }
}

