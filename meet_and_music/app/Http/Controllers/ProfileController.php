<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        
        // Aqui você pode adicionar mais dados que deseja passar para a view
        // como estatísticas, progresso, etc.
        
        return view('profile', [
            'user' => $user,
            'stats' => [
                'progress' => 30, // Exemplo: porcentagem de progresso
                'practice_hours' => 12, // Exemplo: horas praticadas
                'achievements' => 3, // Exemplo: número de conquistas
            ],
            'activities' => [
                [
                    'type' => 'lesson',
                    'description' => 'Completou a lição "Acordes Básicos"',
                    'time' => '2 dias atrás',
                    'icon' => 'music'
                ],
                [
                    'type' => 'jam',
                    'description' => 'Participou de uma jam session online',
                    'time' => '4 dias atrás',
                    'icon' => 'video'
                ],
                [
                    'type' => 'achievement',
                    'description' => 'Ganhou medalha "Primeiro Acorde"',
                    'time' => '1 semana atrás',
                    'icon' => 'star'
                ]
            ]
        ]);
    }
} 