@extends('master')

@section('content')
<div class="bg-surface rounded-lg shadow-lg p-6 mb-6 border border-border">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-gradient">Música completa</h1>
        <div class="flex items-center">
            <span class="bg-primary/20 text-primary text-xs font-medium px-2.5 py-0.5 rounded">Nível Iniciante</span>
        </div>
    </div>

    <!-- Módulos de Aprendizado -->
    <div class="space-y-4">
        <!-- Módulo 1: Introdução -->
        <div class="bg-background rounded-lg p-4 hover:bg-surface-hover transition border border-border">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-music text-primary"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-medium text-text">Módulo 1: Introdução à Música</h2>
                    <p class="text-sm text-text-light">Aprenda os conceitos básicos da teoria musical</p>
                </div>
                <div class="ml-auto">
                    <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full bg-green-900/20 text-green-400">
                        0% Completo
                    </span>
                </div>
            </div>
        </div>

        <!-- Módulo 2: Ritmo -->
        <div class="bg-background rounded-lg p-4 hover:bg-surface-hover transition border border-border">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-drum text-primary"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-medium text-text">Módulo 2: Ritmo e Tempo</h2>
                    <p class="text-sm text-text-light">Desenvolva sua percepção rítmica</p>
                </div>
                <div class="ml-auto">
                    <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full bg-background text-text-light border border-border">
                        Bloqueado
                    </span>
                </div>
            </div>
        </div>

        <!-- Módulo 3: Melodia -->
        <div class="bg-background rounded-lg p-4 hover:bg-surface-hover transition border border-border">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-primary/20 rounded-full flex items-center justify-center">
                        <i class="fas fa-microphone-alt text-primary"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-medium text-text">Módulo 3: Melodia e Harmonia</h2>
                    <p class="text-sm text-text-light">Explore notas, escalas e acordes</p>
                </div>
                <div class="ml-auto">
                    <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full bg-background text-text-light border border-border">
                        Bloqueado
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Seção de Prática -->
<div class="bg-surface rounded-lg shadow-lg p-6 border border-border">
    <h2 class="text-xl font-bold text-gradient mb-4">Prática em Grupo</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Card de Videochamada -->
        <div class="border border-border rounded-lg p-4 bg-background">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-primary/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-video text-primary"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-text">Jam Session Online</h3>
                    <p class="text-sm text-text-light">Pratique com outros músicos em tempo real</p>
                </div>
            </div>
            <button class="w-full bg-gradient-primary text-white px-4 py-2 rounded-md hover:bg-gradient-primary-hover transition">
                Participar Agora
            </button>
        </div>

        <!-- Card de Desafios -->
        <div class="border border-border rounded-lg p-4 bg-background">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-secondary/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-trophy text-secondary"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-text">Desafios Musicais</h3>
                    <p class="text-sm text-text-light">Complete desafios diários e ganhe pontos</p>
                </div>
            </div>
            <button class="w-full bg-gradient-secondary text-white px-4 py-2 rounded-md hover:bg-gradient-secondary-hover transition">
                Ver Desafios
            </button>
        </div>
    </div>
</div>
@endsection 