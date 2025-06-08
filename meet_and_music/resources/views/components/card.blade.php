@props([
    'variant' => 'default',
    'padding' => true
])

@php
$baseClasses = 'rounded-lg shadow-md overflow-hidden';
$variants = [
    'default' => 'bg-white',
    'primary' => 'bg-primary text-white',
    'secondary' => 'bg-secondary text-white',
    'neutral-warm' => 'bg-neutral-warm',
    'neutral-cold' => 'bg-neutral-cold text-white'
];
$paddingClasses = $padding ? 'p-6' : '';
$classes = $baseClasses . ' ' . $variants[$variant] . ' ' . $paddingClasses;
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
