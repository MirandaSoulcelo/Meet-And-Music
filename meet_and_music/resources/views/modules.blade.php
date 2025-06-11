@extends('layouts.app')

@section('content')
<div class="module-header">
    <div class="flex items-center justify-between mb-8">
        <h1 class="module-title">Música completa</h1>
        <div class="flex items-center">
            <span class="module-level">Nível Iniciante</span>
        </div>
    </div>

    <!-- Módulos de Aprendizado -->
    <div class="module-list">
        <!-- Módulo 1: Introdução -->
        <div class="module-item">
            <div class="flex items-center">
                <div class="module-icon">
                    <i class="fas fa-music"></i>
                </div>
                <div class="module-content">
                    <h2 class="module-name">Módulo 1: Introdução à Música</h2>
                    <p class="module-description">Aprenda os conceitos básicos da teoria musical</p>
                </div>
                <div class="ml-auto">
                    <span class="module-status complete">
                        0% Completo
                    </span>
                </div>
            </div>
        </div>

        <!-- Módulo 2: Ritmo -->
        <div class="module-item">
            <div class="flex items-center">
                <div class="module-icon">
                    <i class="fas fa-drum"></i>
                </div>
                <div class="module-content">
                    <h2 class="module-name">Módulo 2: Ritmo e Tempo</h2>
                    <p class="module-description">Desenvolva sua percepção rítmica</p>
                </div>
                <div class="ml-auto">
                    <span class="module-status locked">
                        Bloqueado
                    </span>
                </div>
            </div>
        </div>

        <!-- Módulo 3: Melodia -->
        <div class="module-item">
            <div class="flex items-center">
                <div class="module-icon">
                    <i class="fas fa-microphone-alt"></i>
                </div>
                <div class="module-content">
                    <h2 class="module-name">Módulo 3: Melodia e Harmonia</h2>
                    <p class="module-description">Explore notas, escalas e acordes</p>
                </div>
                <div class="ml-auto">
                    <span class="module-status locked">
                        Bloqueado
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Seção de Prática -->
<div class="practice-section">
    <h2 class="practice-title">Prática em Grupo</h2>
    <div class="practice-grid">
        <!-- Card de Videochamada -->
        <div class="practice-card">
            <div class="flex items-center mb-4">
                <div class="practice-icon primary">
                    <i class="fas fa-video"></i>
                </div>
                <div class="practice-content">
                    <h3 class="practice-name">Jam Session Online</h3>
                    <p class="practice-description">Pratique com outros músicos em tempo real</p>
                </div>
            </div>
            <button class="practice-button primary">
                Participar Agora
            </button>
        </div>

        <!-- Card de Desafios -->
        <div class="practice-card">
            <div class="flex items-center mb-4">
                <div class="practice-icon secondary">
                    <i class="fas fa-trophy"></i>
                </div>
                <div class="practice-content">
                    <h3 class="practice-name">Desafios Musicais</h3>
                    <p class="practice-description">Complete desafios diários e ganhe pontos</p>
                </div>
            </div>
            <button class="practice-button secondary">
                Ver Desafios
            </button>
        </div>
    </div>
</div>
@endsection
