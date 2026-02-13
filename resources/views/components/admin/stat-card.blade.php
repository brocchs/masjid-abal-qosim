@props([
    'label',
    'value',
    'icon' => 'fa-chart-line',
    'tone' => 'emerald',
    'hint' => null,
])

@php
    $tones = [
        'emerald' => 'from-emerald-500 to-emerald-600',
        'red' => 'from-rose-500 to-rose-600',
        'blue' => 'from-sky-500 to-sky-600',
        'amber' => 'from-amber-500 to-amber-600',
        'purple' => 'from-violet-500 to-violet-600',
        'slate' => 'from-slate-500 to-slate-600',
    ];
    $toneClass = $tones[$tone] ?? $tones['slate'];
@endphp

<article {{ $attributes->merge(['class' => "rounded-2xl bg-gradient-to-br {$toneClass} text-white shadow-lg p-4 md:p-5"]) }}>
    <div class="flex items-start justify-between gap-3">
        <div>
            <p class="text-xs uppercase tracking-wide text-white/85">{{ $label }}</p>
            <p class="mt-1 text-xl md:text-2xl font-extrabold leading-tight">{{ $value }}</p>
            @if($hint)
                <p class="mt-1 text-xs text-white/85">{{ $hint }}</p>
            @endif
        </div>
        <i class="fas {{ $icon }} text-2xl md:text-3xl text-white/85"></i>
    </div>
</article>

