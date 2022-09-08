@props(['name', 'stat'])


<div class="md:border-r">
    <div class="text-gray-500 mb-2">
        <span class="text-5xl">{{ $stat }}</span>
    </div>
    <div class="text-sm uppercase text-grey tracking-wide">
        {{ $name }}
    </div>
</div>
