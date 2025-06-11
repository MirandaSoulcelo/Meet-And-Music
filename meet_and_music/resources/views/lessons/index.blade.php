@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <x-card class="mb-4">
        <h2 class="text-2xl font-bold mb-2">Módulo 1: Introdução à Música</h2>
        <p class="mb-4 text-text-light">Descubra os fundamentos da música, incluindo ritmo, melodia e harmonia.</p>
        <a href="#" class="btn btn-primary">Começar Módulo</a>
    </x-card>
    <x-card class="mb-4">
        <h2 class="text-2xl font-bold mb-2">Módulo 2: Ritmo e Tempo</h2>
        <p class="mb-4 text-text-light">Aprenda a identificar e praticar diferentes ritmos e padrões de tempo.</p>
        <a href="#" class="btn btn-primary">Começar Módulo</a>
    </x-card>
    <x-card class="mb-4">
        <h2 class="text-2xl font-bold mb-2">Módulo 3: Melodia e Harmonia</h2>
        <p class="mb-4 text-text-light">Explore como as melodias são criadas e como harmonizá-las com acordes.</p>
        <a href="#" class="btn btn-primary">Começar Módulo</a>
    </x-card>
    <x-card class="mb-4">
        <h2 class="text-2xl font-bold mb-2">Prática em Grupo</h2>
        <p class="mb-4 text-text-light">Participe de sessões de prática em grupo para aprimorar suas habilidades musicais em conjunto.</p>
        <a href="#" class="btn btn-primary">Participar</a>
    </x-card>
    <x-card class="mb-4">
        <h2 class="text-2xl font-bold mb-2">Desafios Musicais</h2>
        <p class="mb-4 text-text-light">Enfrente desafios semanais para testar e evoluir suas habilidades musicais.</p>
        <a href="#" class="btn btn-primary">Ver Desafios</a>
    </x-card>
</div>
@endsection
