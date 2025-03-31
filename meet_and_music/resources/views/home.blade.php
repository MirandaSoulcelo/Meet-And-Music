@extends('master')

@section('content')
<div class="bg-white rounded-lg shadow-sm p-6 mb-6">
    <div class="flex items-center justify-between mb-8">
        <h1 class="text-2xl font-bold text-gray-900">Música completa</h1>
        <div class="flex items-center">
            <span class="bg-purple-100 text-purple-800 text-xs font-medium px-2.5 py-0.5 rounded">Nível Iniciante</span>
        </div>
    </div>

    <!-- Módulos de Aprendizado -->
    <div class="space-y-4">
        <!-- Módulo 1: Introdução -->
        <div class="bg-gray-50 rounded-lg p-4 hover:bg-gray-100 transition">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-music text-blue-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-medium text-gray-900">Módulo 1: Introdução à Música</h2>
                    <p class="text-sm text-gray-500">Aprenda os conceitos básicos da teoria musical</p>
                </div>
                <div class="ml-auto">
                    <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full bg-green-100 text-green-800">
                        0% Completo
                    </span>
                </div>
            </div>
        </div>

        <!-- Módulo 2: Ritmo -->
        <div class="bg-gray-50 rounded-lg p-4 hover:bg-gray-100 transition">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-drum text-blue-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-medium text-gray-900">Módulo 2: Ritmo e Tempo</h2>
                    <p class="text-sm text-gray-500">Desenvolva sua percepção rítmica</p>
                </div>
                <div class="ml-auto">
                    <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">
                        Bloqueado
                    </span>
                </div>
            </div>
        </div>

        <!-- Módulo 3: Melodia -->
        <div class="bg-gray-50 rounded-lg p-4 hover:bg-gray-100 transition">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-microphone-alt text-blue-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-medium text-gray-900">Módulo 3: Melodia e Harmonia</h2>
                    <p class="text-sm text-gray-500">Explore notas, escalas e acordes</p>
                </div>
                <div class="ml-auto">
                    <span class="inline-flex items-center px-3 py-1 text-xs font-medium rounded-full bg-gray-100 text-gray-800">
                        Bloqueado
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Seção de Prática -->
<div class="bg-white rounded-lg shadow-sm p-6">
    <h2 class="text-xl font-bold text-gray-900 mb-4">Prática em Grupo</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Card de Videochamada -->
        <div class="border border-gray-200 rounded-lg p-4">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-video text-purple-600"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-gray-900">Jam Session Online</h3>
                    <p class="text-sm text-gray-500">Pratique com outros músicos em tempo real</p>
                </div>
            </div>
            <button class="w-full bg-purple-600 text-white px-4 py-2 rounded-md hover:bg-purple-700 transition">
                Participar Agora
            </button>
        </div>

        <!-- Card de Desafios -->
        <div class="border border-gray-200 rounded-lg p-4">
            <div class="flex items-center mb-4">
                <div class="w-10 h-10 bg-orange-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-trophy text-orange-600"></i>
                </div>
                <div class="ml-3">
                    <h3 class="text-lg font-medium text-gray-900">Desafios Musicais</h3>
                    <p class="text-sm text-gray-500">Complete desafios diários e ganhe pontos</p>
                </div>
            </div>
            <button class="w-full bg-orange-600 text-white px-4 py-2 rounded-md hover:bg-orange-700 transition">
                Ver Desafios
            </button>
        </div>
    </div>
</div>
@endsection
