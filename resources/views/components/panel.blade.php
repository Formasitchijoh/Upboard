
@php

    $classes = 'p-4 bg-white/5 rounded-xl border border-transparent group hover:border-blue-800 transition-color duration-300'

@endphp


<div {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</div>