<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use Illuminate\Support\Facades\Auth;

class LessonController extends Controller
{
    private $lessons = [
        1 => [
            'id' => 1,
            'title' => 'Introdução à Guitarra',
            'description' => 'Aprenda os fundamentos da guitarra e comece a tocar suas primeiras músicas.',
            'level' => 'Iniciante',
            'duration' => '4 horas',
            'lessons_count' => 10,
            'image' => 'https://images.unsplash.com/photo-1525201548942-d8732f6617a0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'is_locked' => false,
            'content' => [
                'topics' => [
                    'Como segurar corretamente a guitarra',
                    'Postura adequada para tocar',
                    'Nomes das cordas e afinação básica',
                    'Primeiros acordes (Lá menor, Mi maior, Ré maior)',
                    'Exercícios práticos para iniciantes'
                ],
                'next_lessons' => [
                    [
                        'title' => 'Acordes Básicos',
                        'status' => 'next',
                        'icon' => 'guitar'
                    ],
                    [
                        'title' => 'Ritmos Simples',
                        'status' => 'locked',
                        'icon' => 'music'
                    ]
                ]
            ]
        ],
        2 => [
            'id' => 2,
            'title' => 'Teoria Musical Básica',
            'description' => 'Entenda os conceitos fundamentais da teoria musical.',
            'level' => 'Intermediário',
            'duration' => '6 horas',
            'lessons_count' => 8,
            'image' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'is_locked' => false
        ],
        3 => [
            'id' => 3,
            'title' => 'Ritmos Avançados',
            'description' => 'Domine padrões rítmicos complexos e polirritmia.',
            'level' => 'Avançado',
            'duration' => '8 horas',
            'lessons_count' => 12,
            'image' => 'https://images.unsplash.com/photo-1519892300165-cb5542fb47c7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80',
            'is_locked' => true
        ]
    ];

    public function index()
    {
        $lessons = Lesson::all();

        return view('lessons.index', ['lessons' => $lessons]);
    }

    public function show($id)
    {
        if (!isset($this->lessons[$id])) {
            abort(404);
        }

        $lesson = $this->lessons[$id];

        // Simulando progresso do usuário
        $progress = [
            'percentage' => 30,
            'status' => 'Em andamento'
        ];

        return view('lessons.show', [
            'lesson' => $lesson,
            'progress' => $progress
        ]);
    }

    public function submitQuiz(Request $request, $id)
    {
        $lesson = Lesson::with('questions.alternatives')->findOrFail($id);
        $answers = $request->input('answers', []);
        $acertos = 0;

        foreach ($lesson->questions as $question) {
            $selected = $answers[$question->id] ?? null;
            $correct = $question->alternatives->where('is_correct', true)->first();

            if ($correct && $selected == $correct->id) {
                $acertos++;
            }
        }

        // XP baseado em acertos
        $xpGanho = match ($acertos) {
            7 => 70,
            6 => 60,
            5 => 50,
            4 => 40,
            3 => 30,
            2 => 20,
            1 => 10,
            default => 0
        };

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->adicionarXpParaUsuario($xpGanho);

        return view('lessons.quiz_result', [
            'acertos' => $acertos,
            'xpGanho' => $acertos * 10, // ou outro cálculo
            'lesson' => $lesson,
            'answers' => $answers
        ]);
    }

    public function ShowLessons()
    {
        $lessons = Lesson::all();
        return response()->json($lessons);
    }

    public function showQuiz(Lesson $lesson)
    {
        $questions = $lesson->questions()->with('alternatives')->get();
        return view('lessons.quiz', compact('lesson', 'questions'));
    }

    public function quiz(Lesson $lesson)
    {
        return view('lessons.quiz', ['lesson' => $lesson]);
    }

    public function submit(Request $request, Lesson $lesson)
    {
        $answers = $request->input('answers');
        $score = 0;

        foreach ($answers as $questionId => $answer) {
            $question = $lesson->questions()->find($questionId);
            if ($question && $question->correct_answer === $answer) {
                $score++;
            }
        }

        $totalQuestions = $lesson->questions()->count();
        $percentage = ($score / $totalQuestions) * 100;

        return view('lessons.result', [
            'lesson' => $lesson,
            'score' => $score,
            'total' => $totalQuestions,
            'percentage' => $percentage
        ]);
    }
}
