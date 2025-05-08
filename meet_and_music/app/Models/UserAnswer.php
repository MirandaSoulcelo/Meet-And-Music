<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',        // Relacionamento com o usuário
        'question_id',    // Relacionamento com a pergunta
        'alternative_id', // Relacionamento com a alternativa (se necessário)
        'is_correct',     // Se a resposta está correta ou não
    ];

    /**
     * Relacionamento com o modelo User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relacionamento com o modelo Question.
     */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    /**
     * Relacionamento com o modelo Alternative (se aplicável).
     */
    public function alternative()
    {
        return $this->belongsTo(Alternative::class);
    }


    protected static function boot()
{
    parent::boot();

    static::created(function ($userAnswer) {
        // Só aplica XP se a resposta estiver correta
        if ($userAnswer->is_correct) {
            $question = $userAnswer->question;
            $lesson = $question->lesson;

            $totalQuestions = $lesson->questions()->count();
            $xpTotal = $lesson->points;

            if ($totalQuestions > 0) {
                // XP por questão correta
                $xpPorQuestao = intval($xpTotal / $totalQuestions);

                // Atualiza o XP do usuário
                $user = $userAnswer->user;
                $user->xp += $xpPorQuestao;
                $user->save();
            }
        }
    });
}

}
