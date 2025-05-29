<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lesson;
use App\Models\Question;
use App\Models\Alternative;

class LessonFourSeeder extends Seeder
{
    public function run()
    {
        $lesson = Lesson::firstOrCreate([
            'title' => 'Gêneros Musicais'
        ], [
            'description' => 'Estudo sobre diferentes gêneros musicais, suas características e origens',
            'level' => 'Intermediário',
            'duration' => '45 minutos',
            'lessons_count' => 5
        ]);

        // Questão 4.1 (Jazz - História)
        $q1 = Question::create([
            'lesson_id' => $lesson->id,
            'question' => 'Qual cidade americana é considerada o berço do Jazz?',
        ]);
        Alternative::create(['question_id' => $q1->id, 'text' => 'Chicago', 'is_correct' => false]);
        Alternative::create(['question_id' => $q1->id, 'text' => 'Nova Orleans', 'is_correct' => true]);
        Alternative::create(['question_id' => $q1->id, 'text' => 'Nova York', 'is_correct' => false]);
        Alternative::create(['question_id' => $q1->id, 'text' => 'Detroit', 'is_correct' => false]);

        // Questão 4.2 (Blues - Progressão)
        $q2 = Question::create([
            'lesson_id' => $lesson->id,
            'question' => 'A progressão harmônica clássica do Blues de 12 compassos utiliza principalmente quais graus?',
        ]);
        Alternative::create(['question_id' => $q2->id, 'text' => 'I - II - V', 'is_correct' => false]);
        Alternative::create(['question_id' => $q2->id, 'text' => 'I - III - VI', 'is_correct' => false]);
        Alternative::create(['question_id' => $q2->id, 'text' => 'I - IV - V', 'is_correct' => true]);
        Alternative::create(['question_id' => $q2->id, 'text' => 'I - V - VI', 'is_correct' => false]);

        // Questão 4.3 (Reggae - Características)
        $q3 = Question::create([
            'lesson_id' => $lesson->id,
            'question' => 'Qual é a principal característica rítmica do Reggae?',
        ]);
        Alternative::create(['question_id' => $q3->id, 'text' => 'Ênfase no primeiro e terceiro tempos', 'is_correct' => false]);
        Alternative::create(['question_id' => $q3->id, 'text' => 'Sincopa constante em todos os tempos', 'is_correct' => false]);
        Alternative::create(['question_id' => $q3->id, 'text' => 'Ênfase no segundo e quarto tempos (off-beat)', 'is_correct' => true]);
        Alternative::create(['question_id' => $q3->id, 'text' => 'Ausência total de sincopa', 'is_correct' => false]);

        // Questão 4.4 (Bossa Nova - Origem)
        $q4 = Question::create([
            'lesson_id' => $lesson->id,
            'question' => 'A Bossa Nova surgiu da fusão de quais dois gêneros principais?',
        ]);
        Alternative::create(['question_id' => $q4->id, 'text' => 'Samba e Jazz', 'is_correct' => true]);
        Alternative::create(['question_id' => $q4->id, 'text' => 'MPB e Rock', 'is_correct' => false]);
        Alternative::create(['question_id' => $q4->id, 'text' => 'Choro e Blues', 'is_correct' => false]);
        Alternative::create(['question_id' => $q4->id, 'text' => 'Forró e Country', 'is_correct' => false]);

        // Questão 4.5 (Heavy Metal - Características)
        $q5 = Question::create([
            'lesson_id' => $lesson->id,
            'question' => 'Qual escala é frequentemente associada ao som "dark" do Heavy Metal?',
        ]);
        Alternative::create(['question_id' => $q5->id, 'text' => 'Escala Maior', 'is_correct' => false]);
        Alternative::create(['question_id' => $q5->id, 'text' => 'Escala Pentatônica Maior', 'is_correct' => false]);
        Alternative::create(['question_id' => $q5->id, 'text' => 'Escala Dórica', 'is_correct' => false]);
        Alternative::create(['question_id' => $q5->id, 'text' => 'Escala Natural Menor (Eólia)', 'is_correct' => true]);
    }
}