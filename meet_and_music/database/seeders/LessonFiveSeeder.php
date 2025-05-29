<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Alternative;

class LessonFiveSeeder extends Seeder
{
    public function run()
    {
        $lesson = Lesson::firstOrCreate([
            'title' => 'Instrumentos Musicais'
        ], [
            'description' => 'Conhecimento sobre instrumentos musicais, suas características e técnicas',
            'level' => 'Básico',
            'duration' => '40 minutos',
            'lessons_count' => 5
        ]);

        // Questão 5.1 (Piano - Características técnicas)
        $q1 = Question::create([
            'lesson_id' => $lesson->id,
            'question' => 'Quantas teclas possui um piano acústico padrão completo?',
        ]);
        Alternative::create(['question_id' => $q1->id, 'text' => '76 teclas', 'is_correct' => false]);
        Alternative::create(['question_id' => $q1->id, 'text' => '88 teclas', 'is_correct' => true]);
        Alternative::create(['question_id' => $q1->id, 'text' => '61 teclas', 'is_correct' => false]);
        Alternative::create(['question_id' => $q1->id, 'text' => '73 teclas', 'is_correct' => false]);

        // Questão 5.2 (Violão - Afinação)
        $q2 = Question::create([
            'lesson_id' => $lesson->id,
            'question' => 'Qual é a afinação padrão das cordas do violão, da mais grave para a mais aguda?',
        ]);
        Alternative::create(['question_id' => $q2->id, 'text' => 'E - A - D - G - C - E', 'is_correct' => false]);
        Alternative::create(['question_id' => $q2->id, 'text' => 'D - G - C - F - A - D', 'is_correct' => false]);
        Alternative::create(['question_id' => $q2->id, 'text' => 'E - A - D - G - B - E', 'is_correct' => true]);
        Alternative::create(['question_id' => $q2->id, 'text' => 'G - C - F - Bb - D - G', 'is_correct' => false]);

        // Questão 5.3 (Bateria - História)
        $q3 = Question::create([
            'lesson_id' => $lesson->id,
            'question' => 'Qual instrumento da bateria é tradicionalmente tocado com os pés?',
        ]);
        Alternative::create(['question_id' => $q3->id, 'text' => 'Snare (Caixa)', 'is_correct' => false]);
        Alternative::create(['question_id' => $q3->id, 'text' => 'Tom-tom', 'is_correct' => false]);
        Alternative::create(['question_id' => $q3->id, 'text' => 'Bumbo (Kick drum) e Chimbal (Hi-hat)', 'is_correct' => true]);
        Alternative::create(['question_id' => $q3->id, 'text' => 'Ride e Crash', 'is_correct' => false]);

        // Questão 5.4 (Saxofone - Família)
        $q4 = Question::create([
            'lesson_id' => $lesson->id,
            'question' => 'Qual saxofone é mais grave na família dos saxofones comuns?',
        ]);
        Alternative::create(['question_id' => $q4->id, 'text' => 'Saxofone Alto', 'is_correct' => false]);
        Alternative::create(['question_id' => $q4->id, 'text' => 'Saxofone Tenor', 'is_correct' => false]);
        Alternative::create(['question_id' => $q4->id, 'text' => 'Saxofone Soprano', 'is_correct' => false]);
        Alternative::create(['question_id' => $q4->id, 'text' => 'Saxofone Barítono', 'is_correct' => true]);

        // Questão 5.5 (Contrabaixo - Técnica)
        $q5 = Question::create([
            'lesson_id' => $lesson->id,
            'question' => 'Qual técnica do contrabaixo elétrico consiste em "bater" as cordas contra o braço do instrumento?',
        ]);
        Alternative::create(['question_id' => $q5->id, 'text' => 'Slap', 'is_correct' => true]);
        Alternative::create(['question_id' => $q5->id, 'text' => 'Tapping', 'is_correct' => false]);
        Alternative::create(['question_id' => $q5->id, 'text' => 'Hammer-on', 'is_correct' => false]);
        Alternative::create(['question_id' => $q5->id, 'text' => 'Bending', 'is_correct' => false]);
    }
}