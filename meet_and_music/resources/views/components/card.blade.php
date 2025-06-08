@props(['class' => ''])

<div {{ $attributes->merge(['class' => 'bg-surface/60 backdrop-blur-md border border-white/10 rounded-[32px] p-10 shadow-xl ' . $class]) }}>
    {{ $slot }}
</div>
