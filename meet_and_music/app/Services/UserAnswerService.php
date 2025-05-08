<?php

namespace App\Services;

use App\Models\UserAnswer;
use App\Models\Alternative;
use App\Models\User_xp;

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
        $xpRecord = User_xp::firstOrCreate(
            ['user_id' => $userId],
            ['xp_atual' => 0, 'nivel_atual' => 1]
        );

        $xpRecord->adicionarXP($xp); // Atualiza o XP e o nível, e já salva no banco
    }
}
