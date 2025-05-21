<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Alternative;

class LessonThreeSeeder extends Seeder
{
    public function run()
    {
        $lesson = Lesson::where('title', 'Harmonia Avançada e Modos Gregos')->firstOrFail();

        // Questão 3.2 (Modos)
        $q12 = Question::create([
            'lesson_id' => $lesson->id,
            'question' => 'Qual modo grego tem a quarta aumentada em relação à escala maior?',
        ]);
        Alternative::create(['question_id' => $q12->id, 'text' => 'Lídio', 'is_correct' => true]);
        Alternative::create(['question_id' => $q12->id, 'text' => 'Dórico', 'is_correct' => false]);
        Alternative::create(['question_id' => $q12->id, 'text' => 'Eólio', 'is_correct' => false]);
        Alternative::create(['question_id' => $q12->id, 'text' => 'Frígio', 'is_correct' => false]);

        // Questão 3.3 (Harmonia avançada)
        $q13 = Question::create([
            'lesson_id' => $lesson->id,
            'question' => 'O que caracteriza uma cadência plagal?',
        ]);
        Alternative::create(['question_id' => $q13->id, 'text' => 'IV-I (subdominante para tônica)', 'is_correct' => true]);
        Alternative::create(['question_id' => $q13->id, 'text' => 'V-I (dominante para tônica)', 'is_correct' => false]);
        Alternative::create(['question_id' => $q13->id, 'text' => 'II-V (superdominante para dominante)', 'is_correct' => false]);
        Alternative::create(['question_id' => $q13->id, 'text' => 'VI-IV (relativa menor para subdominante)', 'is_correct' => false]);

        // Questão 3.4 (Progressões complexas)
        $q14 = Question::create([
            'lesson_id' => $lesson->id,
            'question' => 'O que é um empréstimo modal em harmonia?',
        ]);
        Alternative::create(['question_id' => $q14->id, 'text' => 'Usar acordes de modos paralelos da mesma tonalidade', 'is_correct' => true]);
        Alternative::create(['question_id' => $q14->id, 'text' => 'Modular para uma tonalidade distante', 'is_correct' => false]);
        Alternative::create(['question_id' => $q14->id, 'text' => 'Usar apenas acordes da escala maior', 'is_correct' => false]);
        Alternative::create(['question_id' => $q14->id, 'text' => 'Repetir a mesma progressão em oitavas diferentes', 'is_correct' => false]);
    }
}
