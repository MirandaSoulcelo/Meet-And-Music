<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'level', 'duration', 'lessons_count', 'image', 'is_locked', 'content', 'points'];

    protected $casts = [
        'is_locked' => 'boolean',
        'content' => 'array'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
