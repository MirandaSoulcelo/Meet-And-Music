@extends('master')

@section('content')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <!-- Cabeçalho -->
    <div class="md:flex md:items-center md:justify-between mb-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                Lições Disponíveis
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                Escolha uma lição para começar seu aprendizado musical
            </p>
        </div>
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <select class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                <option>Todos os Instrumentos</option>
                <option>Guitarra</option>
                <option>Baixo</option>
                <option>Bateria</option>
                <option>Piano</option>
                <option>Vocal</option>
            </select>
        </div>
    </div>

    <!-- Grid de Lições -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($lessons as $lesson)
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="relative">
                <img class="h-48 w-full object-cover" src="{{ $lesson['image'] }}" alt="{{ $lesson['title'] }}">
                <div class="absolute top-0 right-0 m-4">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                        @if($lesson['level'] === 'Iniciante')
                            bg-green-100 text-green-800
                        @elseif($lesson['level'] === 'Intermediário')
                            bg-yellow-100 text-yellow-800
                        @else
                            bg-red-100 text-red-800
                        @endif">
                        {{ $lesson['level'] }}
                    </span>
                </div>
            </div>
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900">{{ $lesson['title'] }}</h3>
                <p class="mt-1 text-sm text-gray-500">{{ $lesson['description'] }}</p>
                <div class="mt-4">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-clock text-gray-400"></i>
                        </div>
                        <div class="ml-2 text-sm text-gray-500">
                            {{ $lesson['duration'] }} de conteúdo
                        </div>
                    </div>
                    <div class="mt-2 flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-book text-gray-400"></i>
                        </div>
                        <div class="ml-2 text-sm text-gray-500">
                            {{ $lesson['lessons_count'] }} lições
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    @if($lesson['is_locked'])
                        <button disabled class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-gray-400 cursor-not-allowed">
                            Bloqueado
                        </button>
                    @else
                        <a href="{{ route('lessons.show', $lesson['id']) }}" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Começar Lição
                        </a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Paginação -->
    <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 mt-6">
        <div class="flex-1 flex justify-between sm:hidden">
            <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Anterior
            </a>
            <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                Próxima
            </a>
        </div>
        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-gray-700">
                    Mostrando <span class="font-medium">1</span> até <span class="font-medium">{{ count($lessons) }}</span> de <span class="font-medium">{{ $total_lessons }}</span> resultados
                </p>
            </div>
            <div>
                <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Anterior</span>
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <a href="#" aria-current="page" class="z-10 bg-blue-50 border-blue-500 text-blue-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                        1
                    </a>
                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                        2
                    </a>
                    <a href="#" class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                        3
                    </a>
                    <a href="#" class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                        <span class="sr-only">Próxima</span>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection 