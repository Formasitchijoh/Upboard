@props(['size' => 'base'])
@php

    $classes = "bg-white/10 px-2 py-1 hover:bg-white/25 transition-color duration-300 font-bold px-3 rounded-xl text-2xs";

    if($size === 'base') {

        $classes .= " px-5 py-1 text-sm";

    }
    if($size === 'small') {

        $classes .= " px-5 py-1 text-2xs";

    }

@endphp

<a href="#" class="{{ $classes }}">{{ $slot }}</a>
