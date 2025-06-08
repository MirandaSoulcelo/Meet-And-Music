@props([
    'title',
    'description',
    'difficulty',
    'xp',
    'completed' => false
])

@php
$difficultyColors = [
    'beginner' => 'bg-green-100 text-green-800',
    'intermediate' => 'bg-yellow-100 text-yellow-800',
    'advanced' => 'bg-red-100 text-red-800'
];
$difficultyLabels = [
    'beginner' => 'Iniciante',
    'intermediate' => 'Intermediário',
    'advanced' => 'Avançado'
];
@endphp

<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
    <div class="p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-xl font-semibold text-gray-900">{{ $title }}</h3>
            @if($completed)
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                    </svg>
                    Concluído
                </span>
            @endif
        </div>

        <p class="text-gray-600 mb-4">{{ $description }}</p>

        <div class="flex items-center justify-between">
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $difficultyColors[$difficulty] }}">
                {{ $difficultyLabels[$difficulty] }}
            </span>
            <div class="flex items-center text-yellow-500">
                <svg class="w-5 h-5 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                </svg>
                <span class="font-medium">{{ $xp }} XP</span>
            </div>
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
        {{ $slot }}
    </div>
</div>
