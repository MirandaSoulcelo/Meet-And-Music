<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Alternative;

class LessonTwoSeeder extends Seeder
{
    public function run()
    {
        $lesson = Lesson::where('title', 'Escalas e Harmonia Básica')->firstOrFail();

        // Questão 2.3 (Escalas menores)
        $q8 = Question::create([
            'lesson_id' => $lesson->id,
            'question' => 'Qual é a relativa menor de Dó maior?',
        ]);
        Alternative::create(['question_id' => $q8->id, 'text' => 'Lá menor', 'is_correct' => true]);
        Alternative::create(['question_id' => $q8->id, 'text' => 'Sol menor', 'is_correct' => false]);
        Alternative::create(['question_id' => $q8->id, 'text' => 'Mi menor', 'is_correct' => false]);
        Alternative::create(['question_id' => $q8->id, 'text' => 'Ré menor', 'is_correct' => false]);

        // Questão 2.4 (Harmonia)
        $q9 = Question::create([
            'lesson_id' => $lesson->id,
            'question' => 'Qual função harmônica tem o V grau em uma escala maior?',
        ]);
        Alternative::create(['question_id' => $q9->id, 'text' => 'Dominante', 'is_correct' => true]);
        Alternative::create(['question_id' => $q9->id, 'text' => 'Tônica', 'is_correct' => false]);
        Alternative::create(['question_id' => $q9->id, 'text' => 'Subdominante', 'is_correct' => false]);
        Alternative::create(['question_id' => $q9->id, 'text' => 'Superdominante', 'is_correct' => false]);

        // Questão 2.5 (Acordes)
        $q10 = Question::create([
            'lesson_id' => $lesson->id,
            'question' => 'Como se forma um acorde menor (tríade)?',
        ]);
        Alternative::create(['question_id' => $q10->id, 'text' => 'Tônica, terça menor, quinta justa', 'is_correct' => true]);
        Alternative::create(['question_id' => $q10->id, 'text' => 'Tônica, terça maior, quinta justa', 'is_correct' => false]);
        Alternative::create(['question_id' => $q10->id, 'text' => 'Tônica, terça menor, quinta diminuta', 'is_correct' => false]);
        Alternative::create(['question_id' => $q10->id, 'text' => 'Tônica, quarta justa, quinta justa', 'is_correct' => false]);
    }
}
