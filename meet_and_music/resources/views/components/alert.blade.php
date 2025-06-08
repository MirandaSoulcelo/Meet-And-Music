@props([
    'type' => 'info',
    'dismissible' => false
])

@php
$baseClasses = 'p-4 rounded-lg';
$types = [
    'info' => 'bg-blue-100 text-blue-700',
    'success' => 'bg-green-100 text-green-700',
    'warning' => 'bg-yellow-100 text-yellow-700',
    'error' => 'bg-red-100 text-red-700'
];
$classes = $baseClasses . ' ' . $types[$type];
@endphp

<div
    x-data="{ show: true }"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform scale-95"
    x-transition:enter-end="opacity-100 transform scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform scale-100"
    x-transition:leave-end="opacity-0 transform scale-95"
    {{ $attributes->merge(['class' => $classes]) }}
    role="alert"
>
    <div class="flex items-center">
        <div class="flex-1">
            {{ $slot }}
        </div>
        @if($dismissible)
            <button
                @click="show = false"
                class="ml-4 text-current hover:opacity-75 focus:outline-none"
            >
                <span class="sr-only">Fechar</span>
                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/>
                </svg>
            </button>
        @endif
    </div>
</div>
