@extends('master')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Cabeçalho do Perfil -->
    <div class="profile-header">
        <div class="flex items-center">
            <div class="profile-avatar">
                <i class="fas fa-user"></i>
            </div>
            <div class="profile-info">
                <h1 class="profile-name">{{ auth()->user()->name }}</h1>
                <p class="profile-meta">Membro desde {{ auth()->user()->created_at->format('M Y') }}</p>
                <div class="mt-2 flex items-center">
                    <span class="profile-badge">Nível Iniciante</span>
                    <span class="ml-2 profile-meta">Instrumento: Guitarra</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Grid de Estatísticas -->
    <div class="stats-grid">
        <!-- Card de Progresso -->
        <div class="stat-card">
            <div class="flex items-center justify-between mb-4">
                <h2 class="stat-title">Progresso</h2>
                <div class="stat-icon bg-green-100">
                    <i class="fas fa-chart-line text-green-600"></i>
                </div>
            </div>
            <div class="relative pt-1">
                <div class="flex mb-2 items-center justify-between">
                    <div>
                        <span class="progress-badge">
                            Em andamento
                        </span>
                    </div>
                    <div class="text-right">
                        <span class="text-xs font-semibold text-green-600">
                            30%
                        </span>
                    </div>
                </div>
                <div class="progress-bar">
                    <div class="progress-bar-fill" style="width:30%"></div>
                </div>
            </div>
        </div>

        <!-- Card de Horas Praticadas -->
        <div class="stat-card">
            <div class="flex items-center justify-between mb-4">
                <h2 class="stat-title">Horas Praticadas</h2>
                <div class="stat-icon bg-purple-100">
                    <i class="fas fa-clock text-purple-600"></i>
                </div>
            </div>
            <div class="stat-value">12h</div>
            <p class="stat-label">Nos últimos 30 dias</p>
        </div>

        <!-- Card de Conquistas -->
        <div class="stat-card">
            <div class="flex items-center justify-between mb-4">
                <h2 class="stat-title">Conquistas</h2>
                <div class="stat-icon bg-yellow-100">
                    <i class="fas fa-trophy text-yellow-600"></i>
                </div>
            </div>
            <div class="stat-value">3</div>
            <p class="stat-label">Medalhas conquistadas</p>
        </div>
    </div>

    <!-- Seção de Atividades Recentes -->
    <div class="activity-card">
        <h2 class="stat-title mb-4">Atividades Recentes</h2>
        <div class="space-y-4">
            <!-- Atividade 1 -->
            <div class="flex items-center">
                <div class="activity-icon bg-blue-100">
                    <i class="fas fa-music text-blue-600"></i>
                </div>
                <div class="activity-content">
                    <p class="activity-title">Completou a lição "Acordes Básicos"</p>
                    <p class="activity-time">Há 2 dias</p>
                </div>
            </div>

            <!-- Atividade 2 -->
            <div class="flex items-center">
                <div class="activity-icon bg-green-100">
                    <i class="fas fa-video text-green-600"></i>
                </div>
                <div class="activity-content">
                    <p class="activity-title">Participou de uma jam session online</p>
                    <p class="activity-time">Há 4 dias</p>
                </div>
            </div>

            <!-- Atividade 3 -->
            <div class="flex items-center">
                <div class="activity-icon bg-yellow-100">
                    <i class="fas fa-star text-yellow-600"></i>
                </div>
                <div class="activity-content">
                    <p class="activity-title">Ganhou medalha "Primeiro Acorde"</p>
                    <p class="activity-time">Há 1 semana</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
