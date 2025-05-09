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


        if ($userAnswer->is_correct) {
            $question = $userAnswer->question;
            $lesson = $question->lesson;

            // Obtém os pontos da lição
            $xpTotal = $lesson->points;

            // Divide os pontos entre as questões
            $totalQuestions = $lesson->questions()->count();
            $xpPorQuestao = $xpTotal / $totalQuestions;

            // Atualiza o XP do usuário
            $user = $userAnswer->user;
            $userXp = $user->xp;
            $userXp->xp_atual += $xpPorQuestao;

            // Verifica e atualiza o nível
            if ($userXp->xp_atual >= 100) {
                $userXp->nivel_atual++;
                $userXp->xp_atual = 0;
            }

            // Salva as alterações
            $userXp->save();
        }
    });
}


    }
