@props([
    'type' => 'text',
    'label' => null,
    'error' => null,
    'required' => false
])

@php
$baseClasses = 'block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50';
if ($error) {
    $baseClasses .= ' border-red-500';
}
@endphp

<div class="form-group">
    @if($label)
        <label class="block text-sm font-medium text-gray-700 mb-1">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <input
        type="{{ $type }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge(['class' => $baseClasses]) }}
    >

    @if($error)
        <p class="mt-1 text-sm text-red-500">{{ $error }}</p>
    @endif
</div>
