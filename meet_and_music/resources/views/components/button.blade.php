@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'disabled' => false
])

@php
$baseClasses = 'inline-flex items-center justify-center font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-200';
$variants = [
    'primary' => 'bg-primary text-white hover:bg-primary/90 focus:ring-primary',
    'secondary' => 'bg-secondary text-white hover:bg-secondary/90 focus:ring-secondary',
    'outline' => 'border-2 border-primary text-primary hover:bg-primary/10 focus:ring-primary',
    'ghost' => 'text-primary hover:bg-primary/10 focus:ring-primary'
];
$sizes = [
    'sm' => 'px-3 py-1.5 text-sm',
    'md' => 'px-4 py-2 text-base',
    'lg' => 'px-6 py-3 text-lg'
];
$classes = $baseClasses . ' ' . $variants[$variant] . ' ' . $sizes[$size];
if ($disabled) {
    $classes .= ' opacity-50 cursor-not-allowed';
}
@endphp

<button
    type="{{ $type }}"
    {{ $disabled ? 'disabled' : '' }}
    {{ $attributes->merge(['class' => $classes]) }}
>
    {{ $slot }}
</button>
