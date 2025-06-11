@extends('layouts.app')

@section('content')
<div class="space-y-6">
    {{-- Card Principal para os Módulos de Aprendizagem --}}
    <div class="content-card">
        <h1 class="card-title">Módulos de Aprendizagem</h1>
        <div class="module-list">
            {{-- Cada módulo é um link clicável com layout flex --}}
            <a href="#" class="module-item">
                <div class="module-item-content">
                    <h3 class="module-item-title">Módulo 1: Introdução à Música</h3>
                    <p class="module-item-description">Descubra os fundamentos da música, incluindo ritmo, melodia e harmonia.</p>
                </div>
                <div class="btn btn-primary btn-sm">Começar Módulo</div>
            </a>

            <a href="#" class="module-item">
                <div class="module-item-content">
                    <h3 class="module-item-title">Módulo 2: Ritmo e Tempo</h3>
                    <p class="module-item-description">Aprenda a identificar e praticar diferentes ritmos e padrões de tempo.</p>
                </div>
                <div class="btn btn-primary btn-sm">Começar Módulo</div>
            </a>

            <a href="#" class="module-item">
                <div class="module-item-content">
                    <h3 class="module-item-title">Módulo 3: Melodia e Harmonia</h3>
                    <p class="module-item-description">Explore como as melodias são criadas e como harmonizá-las com acordes.</p>
                </div>
                <div class="btn btn-primary btn-sm">Começar Módulo</div>
            </a>
        </div>
    </div>

    {{-- Card para as seções de Prática e Desafios --}}
    <div class="content-card">
        <div class="grid md:grid-cols-2 gap-6">
            {{-- Item de Prática em Grupo --}}
            <div class="module-item">
                <div class="module-item-content">
                    <h3 class="module-item-title">Prática em Grupo</h3>
                    <p class="module-item-description">Participe de sessões para aprimorar suas habilidades em conjunto.</p>
                </div>
                <a href="#" class="btn btn-secondary btn-sm">Participar</a>
            </div>

            {{-- Item de Desafios Musicais --}}
            <div class="module-item">
                <div class="module-item-content">
                    <h3 class="module-item-title">Desafios Musicais</h3>
                    <p class="module-item-description">Enfrente desafios semanais para testar e evoluir suas habilidades.</p>
                </div>
                <a href="#" class="btn btn-secondary btn-sm">Ver Desafios</a>
            </div>
        </div>
    </div>
</div>
@endsection
