<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id', 'question'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function alternatives()
    {
        return $this->hasMany(Alternative::class);
    }
}

