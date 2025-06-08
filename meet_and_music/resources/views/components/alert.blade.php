@props([
    'type' => 'info',
    'message'
])

@php
$typeClasses = [
    'success' => 'bg-green-900/20 border-green-500/30 text-green-400',
    'error' => 'bg-red-900/20 border-red-500/30 text-red-400',
    'warning' => 'bg-yellow-900/20 border-yellow-500/30 text-yellow-400',
    'info' => 'bg-blue-900/20 border-blue-500/30 text-blue-400'
];

$classes = $typeClasses[$type] ?? $typeClasses['info'];
@endphp

<div class="{{ $classes }} px-4 py-3 rounded relative mb-4" role="alert">
    <span class="block sm:inline">{{ $message }}</span>
</div>
