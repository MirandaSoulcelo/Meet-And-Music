@extends('layouts.app')

@section('content')
<div class="content-card">
    <div class="module-header">
        <h1 class="card-title" style="margin-bottom: 0; border-bottom: none;">Música Completa</h1>
        <span class="module-level">Nível Iniciante</span>
    </div>

    {{-- Lista de módulos usando o novo padrão de item-card --}}
    <div class="item-list-container mt-6">
        {{-- Módulo 1: Exemplo de módulo ativo --}}
        <div class="item-card">
            <div class="item-card-content">
                <h3 class="item-card-title">Módulo 1: Introdução à Música</h3>
                <p class="item-card-description">Aprenda os conceitos básicos da teoria musical.</p>
            </div>
            <a href="#" class="btn btn-primary btn-sm">
                Ver Módulo
            </a>
        </div>

        {{-- Módulo 2: Exemplo de módulo bloqueado --}}
        <div class="item-card" style="opacity: 0.6;">
            <div class="item-card-content">
                <h3 class="item-card-title">Módulo 2: Ritmo e Tempo</h3>
                <p class="item-card-description">Desenvolva sua percepção rítmica.</p>
            </div>
            <button class="btn btn-secondary btn-sm" disabled>
                Bloqueado
            </button>
        </div>

        {{-- Módulo 3: Exemplo de módulo bloqueado --}}
        <div class="item-card" style="opacity: 0.6;">
            <div class="item-card-content">
                <h3 class="item-card-title">Módulo 3: Melodia e Harmonia</h3>
                <p class="item-card-description">Explore notas, escalas e acordes.</p>
            </div>
            <button class="btn btn-secondary btn-sm" disabled>
                Bloqueado
            </button>
        </div>
    </div>
</div>
@endsection
