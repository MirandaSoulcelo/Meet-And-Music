@props([
    'type' => 'default',
    'class' => ''
])

@php
$typeClasses = [
    'default' => 'bg-surface/60 text-text-light',
    'primary' => 'bg-primary/20 text-primary',
    'secondary' => 'bg-secondary/20 text-secondary',
    'success' => 'bg-green-900/20 text-green-400',
    'warning' => 'bg-yellow-900/20 text-yellow-400',
    'danger' => 'bg-red-900/20 text-red-400'
];

$classes = $typeClasses[$type] ?? $typeClasses['default'];
@endphp

<span {{ $attributes->merge(['class' => 'inline-flex items-center px-3 py-1 rounded-full text-sm font-medium ' . $classes . ' ' . $class]) }}>
    {{ $slot }}
</span>
