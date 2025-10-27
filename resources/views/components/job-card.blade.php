@props(['job'])

<x-panel class="flex flex-col text-center">
    <div class="self-start text-sm transition-color duration-300">{{ $job->employer->name}}</div>
    <div class="py-8">
        <a href="{{ $job->url }}" target="_blank" class="group-hover:text-blue-800 font-bold text-xl">{{ $job->title}}</a>
        <p class="text-sm mt-4">{{ $job->schedule}}-{{ $job->salary}}</p>
    </div>
    <div class="flex justify-between items-center mt-auto">
        <div class="">
            @foreach($job->tags as $tag)
               <x-tag size="small" :$tag />
            @endforeach
        </div>
        <x-employer-logo :employer="$job->employer" :width="24"/>

    </div>
</x-panel>