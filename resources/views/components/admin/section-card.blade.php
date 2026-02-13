@props([
    'title' => null,
    'icon' => null,
    'headerClass' => '',
    'bodyClass' => '',
])

<section {{ $attributes->merge(['class' => 'bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden']) }}>
    @if($title)
        <div class="px-5 md:px-6 py-4 border-b border-slate-200 bg-slate-50 {{ $headerClass }}">
            <h3 class="text-base md:text-lg font-semibold text-slate-800 flex items-center gap-2">
                @if($icon)
                    <i class="fas {{ $icon }} text-masjid-green"></i>
                @endif
                <span>{{ $title }}</span>
            </h3>
        </div>
    @endif
    <div class="p-5 md:p-6 {{ $bodyClass }}">
        {{ $slot }}
    </div>
</section>

