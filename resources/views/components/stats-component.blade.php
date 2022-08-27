@props(['name', 'stat'])

<div class="w-full md:w-1/3 text-center md:border-0 border-b py-8">
    <div class="md:border-r">
        <div class="text-gray-500 mb-2">
            <span class="text-5xl">{{ $stat }}</span>
        </div>
        <div class="text-sm uppercase text-grey tracking-wide">
            {{ $name }}
        </div>
    </div>
</div>
