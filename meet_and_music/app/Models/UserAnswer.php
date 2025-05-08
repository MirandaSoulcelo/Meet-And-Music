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
}
