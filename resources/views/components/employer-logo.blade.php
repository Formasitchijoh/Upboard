@props(['employer', 'width'=>90])

<img src="{{ asset($employer->logo) }}" alt="" width={{ $width }} class="rounded-xl">
