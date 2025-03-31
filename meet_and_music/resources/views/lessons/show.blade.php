@extends('master')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Navegação -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="flex items-center space-x-4">
            <li>
                <div>
                    <a href="{{ route('lessons.index') }}" class="text-gray-400 hover:text-gray-500">
                        <i class="fas fa-home"></i>
                        <span class="sr-only">Lições</span>
                    </a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <i class="fas fa-chevron-right text-gray-400 text-sm"></i>
                    <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Introdução à Guitarra</a>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Cabeçalho da Lição -->
    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
        <div class="relative">
            <img class="w-full h-64 object-cover" src="https://images.unsplash.com/photo-1525201548942-d8732f6617a0?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Guitarra">
            <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <button class="bg-white text-gray-900 rounded-full p-4 hover:bg-gray-100 transition">
                    <i class="fas fa-play text-4xl"></i>
                </button>
            </div>
        </div>
        <div class="p-6">
            <div class="flex items-center justify-between">
                <h1 class="text-2xl font-bold text-gray-900">Introdução à Guitarra</h1>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    Iniciante
                </span>
            </div>
            <p class="mt-2 text-gray-600">Aprenda os fundamentos da guitarra e comece a tocar suas primeiras músicas.</p>
            <div class="mt-4 flex items-center text-sm text-gray-500">
                <i class="fas fa-clock mr-2"></i>
                <span>4 horas de conteúdo</span>
                <span class="mx-2">•</span>
                <i class="fas fa-book mr-2"></i>
                <span>10 lições</span>
            </div>
        </div>
    </div>

    <!-- Conteúdo da Lição -->
    <div class="mt-6 grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Coluna Principal -->
        <div class="lg:col-span-2">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Conteúdo da Lição</h2>
                <div class="prose max-w-none">
                    <p>Nesta lição, você aprenderá:</p>
                    <ul>
                        <li>Como segurar corretamente a guitarra</li>
                        <li>Postura adequada para tocar</li>
                        <li>Nomes das cordas e afinação básica</li>
                        <li>Primeiros acordes (Lá menor, Mi maior, Ré maior)</li>
                        <li>Exercícios práticos para iniciantes</li>
                    </ul>
                    <p class="mt-4">
                        É importante praticar regularmente e seguir a sequência de exercícios apresentada.
                        Não se preocupe se no início parecer difícil, com o tempo e prática você vai melhorando.
                    </p>
                </div>
            </div>

            <!-- Seção de Vídeo -->
            <div class="mt-6 bg-white shadow-sm rounded-lg p-6">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Vídeo Tutorial</h2>
                <div class="aspect-w-16 aspect-h-9">
                    <div class="w-full h-96 bg-gray-200 rounded-lg flex items-center justify-center">
                        <span class="text-gray-500">Vídeo da lição</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Barra Lateral -->
        <div class="lg:col-span-1">
            <!-- Progresso -->
            <div class="bg-white shadow-sm rounded-lg p-6 mb-6">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Seu Progresso</h2>
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
                <button class="mt-4 w-full bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">
                    Marcar como Concluída
                </button>
            </div>

            <!-- Próximas Lições -->
            <div class="bg-white shadow-sm rounded-lg p-6">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Próximas Lições</h2>
                <div class="space-y-4">
                    <a href="#" class="block hover:bg-gray-50 rounded-lg p-3 transition">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-guitar text-blue-600"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-900">Acordes Básicos</p>
                                <p class="text-xs text-gray-500">Próxima lição</p>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="block hover:bg-gray-50 rounded-lg p-3 transition">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-10 h-10 bg-gray-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-music text-gray-400"></i>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-400">Ritmos Simples</p>
                                <p class="text-xs text-gray-500">Bloqueada</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 