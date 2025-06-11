@props([
    'title',
    'time',
    'icon',
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

<div class="flex items-center">
    <div class="activity-icon {{ $iconClass }}">
        <i class="{{ $icon }}"></i>
    </div>
    <div class="activity-content">
        <p class="activity-title">{{ $title }}</p>
        <p class="activity-time">{{ $time }}</p>
    </div>
</div>
