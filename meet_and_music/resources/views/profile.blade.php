@extends('master')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8 profile-content">
    <x-profile.header :user="auth()->user()" />

    <!-- Grid de Estatísticas -->
    <div class="stats-grid">
        <!-- Card de Progresso -->
        <x-profile.stat-card
            title="Progresso"
            icon="fas fa-chart-line"
            iconColor="success">
            <x-progress-bar
                value="30"
                label="Em andamento" />
        </x-profile.stat-card>

        <!-- Card de Horas Praticadas -->
        <x-profile.stat-card
            title="Horas Praticadas"
            value="12h"
            label="Nos últimos 30 dias"
            icon="fas fa-clock"
            iconColor="secondary" />

        <!-- Card de Conquistas -->
        <x-profile.stat-card
            title="Conquistas"
            value="3"
            label="Medalhas conquistadas"
            icon="fas fa-trophy"
            iconColor="warning" />
    </div>

    <!-- Seção de Atividades Recentes -->
    <x-card class="activity-card">
        <h2 class="stat-title mb-4">Atividades Recentes</h2>
        <div class="activity-list">
            <x-profile.activity-item
                title="Completou a lição 'Acordes Básicos'"
                time="Há 2 dias"
                icon="fas fa-music"
                iconColor="primary" />

            <x-profile.activity-item
                title="Participou de uma jam session online"
                time="Há 4 dias"
                icon="fas fa-video"
                iconColor="success" />

            <x-profile.activity-item
                title="Ganhou medalha 'Primeiro Acorde'"
                time="Há 1 semana"
                icon="fas fa-star"
                iconColor="warning" />
        </div>
    </x-card>
</div>
@endsection
