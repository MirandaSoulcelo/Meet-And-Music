@extends('master')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Cabeçalho do Perfil -->
    <div class="bg-white shadow-sm rounded-lg p-6 mb-6">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <div class="h-24 w-24 rounded-full bg-blue-100 flex items-center justify-center">
                    <i class="fas fa-user text-4xl text-blue-600"></i>
                </div>
            </div>
            <div class="ml-6">
                <h1 class="text-2xl font-bold text-gray-900">{{ auth()->user()->name }}</h1>
                <p class="text-sm text-gray-500">Membro desde {{ auth()->user()->created_at->format('M Y') }}</p>
                <div class="mt-2 flex items-center">
                    <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">Nível Iniciante</span>
                    <span class="ml-2 text-sm text-gray-500">Instrumento: Guitarra</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Grid de Estatísticas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Card de Progresso -->
        <div class="bg-white shadow-sm rounded-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-medium text-gray-900">Progresso</h2>
                <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-chart-line text-green-600"></i>
                </div>
            </div>
            <div class="relative pt-1">
                <div class="flex mb-2 items-center justify-between">
                    <div>
                        <span class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-green-600 bg-green-200">
                            Em andamento
                        </span>
                    </div>
                    <div class="text-right">
                        <span class="text-xs font-semibold inline-block text-green-600">
                            30%
                        </span>
                    </div>
                </div>
                <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-green-200">
                    <div style="width:30%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-green-500"></div>
                </div>
            </div>
        </div>

        <!-- Card de Horas Praticadas -->
        <div class="bg-white shadow-sm rounded-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-medium text-gray-900">Horas Praticadas</h2>
                <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-clock text-purple-600"></i>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-900">12h</div>
            <p class="text-sm text-gray-500">Nos últimos 30 dias</p>
        </div>

        <!-- Card de Conquistas -->
        <div class="bg-white shadow-sm rounded-lg p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-medium text-gray-900">Conquistas</h2>
                <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                    <i class="fas fa-trophy text-yellow-600"></i>
                </div>
            </div>
            <div class="text-3xl font-bold text-gray-900">3</div>
            <p class="text-sm text-gray-500">Medalhas conquistadas</p>
        </div>
    </div>

    <!-- Seção de Atividades Recentes -->
    <div class="bg-white shadow-sm rounded-lg p-6">
        <h2 class="text-lg font-medium text-gray-900 mb-4">Atividades Recentes</h2>
        <div class="space-y-4">
            <!-- Atividade 1 -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-music text-blue-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-900">Completou a lição "Acordes Básicos"</p>
                    <p class="text-xs text-gray-500">Há 2 dias</p>
                </div>
            </div>

            <!-- Atividade 2 -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-video text-green-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-900">Participou de uma jam session online</p>
                    <p class="text-xs text-gray-500">Há 4 dias</p>
                </div>
            </div>

            <!-- Atividade 3 -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-star text-yellow-600"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-900">Ganhou medalha "Primeiro Acorde"</p>
                    <p class="text-xs text-gray-500">Há 1 semana</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 