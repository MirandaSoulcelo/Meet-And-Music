@props([
    'title',
    'value' => null,
    'label' => null,
    'icon' => null,
    'iconColor' => 'primary'
])

@php
$iconColors = [
    'primary' => 'bg-primary/20 text-primary',
    'secondary' => 'bg-secondary/20 text-secondary',
    'success' => 'bg-green-900/20 text-green-400',
    'warning' => 'bg-yellow-900/20 text-yellow-400',
    'danger' => 'bg-red-900/20 text-red-400'
];

$iconClass = $iconColors[$iconColor] ?? $iconColors['primary'];
@endphp

<x-card class="stat-card">
    <div class="flex items-center justify-between mb-4">
        <h2 class="stat-title">{{ $title }}</h2>
        @if($icon)
            <div class="stat-icon {{ $iconClass }}">
                <i class="{{ $icon }}"></i>
            </div>
        @endif
    </div>
    @if($value)
        <div class="stat-value">{{ $value }}</div>
    @endif
    @if($label)
        <p class="stat-label">{{ $label }}</p>
    @endif
    {{ $slot }}
</x-card>
