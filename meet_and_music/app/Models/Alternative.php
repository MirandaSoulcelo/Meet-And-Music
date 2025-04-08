<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alternative extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'text', 'is_correct'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
