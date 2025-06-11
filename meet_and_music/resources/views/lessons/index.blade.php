@extends('layouts.app')

@section('content')
<div class="space-y-6">
    {{-- Card Principal para os Módulos de Aprendizagem --}}
    <div class="content-card">
        <h1 class="card-title">Módulos de Aprendizagem</h1>
        <div class="item-list-container">
            @foreach ($lessons as $lesson)
                <a href="{{ route('lessons.quiz', ['lesson' => $lesson->id]) }}" class="item-card">
                    <div class="item-card-content">
                        <h3 class="item-card-title">{{ $lesson->title }}</h3>
                        <p class="item-card-description">{{ $lesson->description }}</p>
                    </div>
                    <div class="btn btn-primary btn-sm">Começar Módulo</div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- Card para as seções de Prática e Desafios --}}
    <div class="content-card">
        <div class="grid md:grid-cols-2 gap-6">
            {{-- Item de Prática em Grupo --}}
            <div class="item-card">
                <div class="item-card-content">
                    <h3 class="item-card-title">Prática em Grupo</h3>
                    <p class="item-card-description">Participe de sessões para aprimorar suas habilidades em conjunto.</p>
                </div>
                <a href="#" class="btn btn-secondary btn-sm">Participar</a>
            </div>

            {{-- Item de Desafios Musicais --}}
            <div class="item-card">
                <div class="item-card-content">
                    <h3 class="item-card-title">Desafios Musicais</h3>
                    <p class="item-card-description">Enfrente desafios semanais para testar e evoluir suas habilidades.</p>
                </div>
                <a href="#" class="btn btn-secondary btn-sm">Ver Desafios</a>
            </div>
        </div>
    </div>
</div>
@endsection
