@props([
    'value' => 0,
    'max' => 100,
    'label' => null,
    'showPercentage' => true
])

<div class="relative pt-1">
    @if($label || $showPercentage)
        <div class="flex mb-2 items-center justify-between">
            @if($label)
                <div>
                    <span class="text-xs font-semibold inline-block text-text-light">
                        {{ $label }}
                    </span>
                </div>
            @endif
            @if($showPercentage)
                <div class="text-right">
                    <span class="text-xs font-semibold inline-block text-primary">
                        {{ $value }}%
                    </span>
                </div>
            @endif
        </div>
    @endif
    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-surface/40">
        <div style="width: {{ $value }}%" class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-primary"></div>
    </div>
</div>
