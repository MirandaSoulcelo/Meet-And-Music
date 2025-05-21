<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Question;
use App\Models\Alternative;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Lição 1: Básico (Fácil)
        $lesson1 = Lesson::create([
            'title' => 'Fundamentos da Teoria Musical',
            'description' => 'Domine notas, claves, ritmos e intervalos básicos.',
            'level' => 'Fácil',
            'duration' => '40 min',
            'lessons_count' => 5,
            'points' => 100,
            'is_locked' => false,
        ]);

        // Questão 1.1
        $q1 = Question::create([
            'lesson_id' => $lesson1->id,
            'question' => 'Qual é a ordem correta das notas naturais na escala diatônica de Dó maior?',
        ]);
        Alternative::create(['question_id' => $q1->id, 'text' => 'Dó, Ré, Mi, Fá, Sol, Lá, Si', 'is_correct' => true]);
        Alternative::create(['question_id' => $q1->id, 'text' => 'Dó, Ré, Mi, Sol, Lá, Si, Dó', 'is_correct' => false]);
        Alternative::create(['question_id' => $q1->id, 'text' => 'Dó, Mi, Fá, Sol, Lá, Si, Ré', 'is_correct' => false]);
        Alternative::create(['question_id' => $q1->id, 'text' => 'Si, Lá, Sol, Fá, Mi, Ré, Dó', 'is_correct' => false]);

        // Questão 1.2
        $q2 = Question::create([
            'lesson_id' => $lesson1->id,
            'question' => 'Qual clave é usada para instrumentos graves como o contrabaixo?',
        ]);
        Alternative::create(['question_id' => $q2->id, 'text' => 'Clave de Sol', 'is_correct' => false]);
        Alternative::create(['question_id' => $q2->id, 'text' => 'Clave de Fá', 'is_correct' => true]);
        Alternative::create(['question_id' => $q2->id, 'text' => 'Clave de Dó', 'is_correct' => false]);
        Alternative::create(['question_id' => $q2->id, 'text' => 'Clave de Ré', 'is_correct' => false]);

        // Questão 1.3 (Ritmo)
        $q3 = Question::create([
            'lesson_id' => $lesson1->id,
            'question' => 'Quantos tempos tem uma semínima em um compasso 4/4?',
        ]);
        Alternative::create(['question_id' => $q3->id, 'text' => '1 tempo', 'is_correct' => true]);
        Alternative::create(['question_id' => $q3->id, 'text' => '2 tempos', 'is_correct' => false]);
        Alternative::create(['question_id' => $q3->id, 'text' => '4 tempos', 'is_correct' => false]);
        Alternative::create(['question_id' => $q3->id, 'text' => '0.5 tempos', 'is_correct' => false]);

        // Questão 1.4 (Intervalos)
        $q4 = Question::create([
            'lesson_id' => $lesson1->id,
            'question' => 'Qual intervalo existe entre Dó e Mi na escala maior?',
        ]);
        Alternative::create(['question_id' => $q4->id, 'text' => 'Terça maior', 'is_correct' => true]);
        Alternative::create(['question_id' => $q4->id, 'text' => 'Quarta justa', 'is_correct' => false]);
        Alternative::create(['question_id' => $q4->id, 'text' => 'Segunda menor', 'is_correct' => false]);
        Alternative::create(['question_id' => $q4->id, 'text' => 'Quinta diminuta', 'is_correct' => false]);

        // Questão 1.5 (Símbolos)
        $q5 = Question::create([
            'lesson_id' => $lesson1->id,
            'question' => 'O que um "bemol" (♭) altera em uma nota?',
        ]);
        Alternative::create(['question_id' => $q5->id, 'text' => 'Abaixa a nota em um semitom', 'is_correct' => true]);
        Alternative::create(['question_id' => $q5->id, 'text' => 'Eleva a nota em um semitom', 'is_correct' => false]);
        Alternative::create(['question_id' => $q5->id, 'text' => 'Dobra a duração da nota', 'is_correct' => false]);
        Alternative::create(['question_id' => $q5->id, 'text' => 'Mantém a nota natural', 'is_correct' => false]);

        // --- Lição 2: Intermediário (Escalas e Acordes) ---
        $lesson2 = Lesson::create([
            'title' => 'Escalas e Harmonia Básica',
            'description' => 'Aprofunde-se em escalas maiores/menores, tríades e funções harmônicas.',
            'level' => 'Intermediária',
            'duration' => '50 min',
            'lessons_count' => 5,
            'points' => 200,
            'is_locked' => true,
        ]);

        // Questão 2.1 (Escalas)
        $q6 = Question::create([
            'lesson_id' => $lesson2->id,
            'question' => 'Quantos acidentes (sustenidos/bemóis) tem a escala de Sol maior?',
        ]);
        Alternative::create(['question_id' => $q6->id, 'text' => '1 sustenido (Fá#)', 'is_correct' => true]);
        Alternative::create(['question_id' => $q6->id, 'text' => '2 bemóis (Si♭, Mi♭)', 'is_correct' => false]);
        Alternative::create(['question_id' => $q6->id, 'text' => 'Nenhum', 'is_correct' => false]);
        Alternative::create(['question_id' => $q6->id, 'text' => '3 sustenidos (Fá#, Dó#, Sol#)', 'is_correct' => false]);

        // Questão 2.2 (Acordes)
        $q7 = Question::create([
            'lesson_id' => $lesson2->id,
            'question' => 'Quais notas formam um acorde de Dó maior (tríade)?',
        ]);
        Alternative::create(['question_id' => $q7->id, 'text' => 'Dó, Mi, Sol', 'is_correct' => true]);
        Alternative::create(['question_id' => $q7->id, 'text' => 'Dó, Ré, Sol', 'is_correct' => false]);
        Alternative::create(['question_id' => $q7->id, 'text' => 'Dó, Fá, Lá', 'is_correct' => false]);
        Alternative::create(['question_id' => $q7->id, 'text' => 'Dó, Mi, Lá', 'is_correct' => false]);

        // Adicione mais 3 questões para a Lição 2 seguindo o padrão...

        // --- Lição 3: Avançado (Modos e Harmonia) ---
        $lesson3 = Lesson::create([
            'title' => 'Harmonia Avançada e Modos Gregos',
            'description' => 'Explore modos, cadências, empréstimos modais e progressões complexas.',
            'level' => 'Difícil',
            'duration' => '60 min',
            'lessons_count' => 5,
            'points' => 300,
            'is_locked' => true,
        ]);

        // Questão 3.1 (Modos)
        $q11 = Question::create([
            'lesson_id' => $lesson3->id,
            'question' => 'Qual modo grego é derivado da escala maior começando no II grau?',
        ]);
        Alternative::create(['question_id' => $q11->id, 'text' => 'Dórico', 'is_correct' => true]);
        Alternative::create(['question_id' => $q11->id, 'text' => 'Frígio', 'is_correct' => false]);
        Alternative::create(['question_id' => $q11->id, 'text' => 'Lídio', 'is_correct' => false]);
        Alternative::create(['question_id' => $q11->id, 'text' => 'Mixolídio', 'is_correct' => false]);

        // Adicione mais 4 questões para a Lição 3...
    }
}